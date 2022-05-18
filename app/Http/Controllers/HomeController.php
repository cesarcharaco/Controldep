<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PDE;
use App\Models\Asignaturas;
use App\Models\Asignacion;
use App\Models\Programa;
use App\Models\Profesores;
use App\Models\Notificaciones;

use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (\Auth::getUser()->user_type=="Admin") {
            //buscar los pde no cargados
        $buscar=PDE::where('nota_cargada','No')->get();
        //verificando fechas actuales
            //$hoy=date('Y-m-d');
            foreach ($buscar as $key) {
                $hoy="2022-05-29";
                $diez_dias= date("Y-m-d",strtotime($key->fecha."+ 10 days"));
                $catorce_dias= date("Y-m-d",strtotime($key->fecha."+ 14 days"));
                dd($diez_dias);


                $notificacion_md=Notificaciones::where('id_pde',$key->id)->where('mismo_dia','No')->count();
                $notificacion_dd=Notificaciones::where('id_pde',$key->id)->where('diez_dias','No')->count();
                $notificacion_cd=Notificaciones::where('id_pde',$key->id)->where('catorce_dias','No')->count();

                //verificando el mismo dia que seria hoy para enviar notificacion
                if ($hoy==$diez_dias and $notificacion_md == 0) {
                    $asignacion=Asignacion::find($key->id_asignacion);
                    
                    $asignatura=$asignacion->asignatura->asignatura;
                    $codigo=$asignacion->asignatura->codigo;
                    $programa=$asignacion->programa->programa;
                    $nombres=$asignacion->profesor->profesor;
                    $email=$asignacion->profesor->correo;
                    $periodo=$asignacion->periodo->periodo;
                    $mensaje="La asignatura: <b>".$asignatura."</b> de código: <b>".$codigo."</b>, del Programa: <b>".$programa."</b> para el periodo: <b>".$periodo."</b>. La cual tenia fecha de presentación para el día de hoy y tiene 10 días a partir de la llega de este correo para cargar las calificaciones. Recuerde que la puntualidad y responsabilidad son una de las mayores virtudes de un profesional.";
                    //correo para el mismo dia de la evaluacion
                    $send_admin=Mail::send('notificaciones.email_dd',
                    ['nombres'=>$nombres, 'mensaje' => $mensaje], function ($m) use ($nombres,$email,$mensaje) {
                    
                    $m->from('enzol.inacap@gmail.com', 'SIME!');
                    $m->to($email)->subject('Notificación de Carga de Calificaciones');
                    
                    });
                    $notificacion_dd= new Notificaciones();
                    $notificacion_dd->id_pde=$key->id;
                    $notificacion_dd->mismo_dia="Si";
                    $notificacion_dd->save();

                }//fin de la notificacion del mismo dia

                //verificando a los catorce dias de la fecha de la evaluacion
                if ($hoy==$catorce_dias and $notificacion_dd == 0) {
                    $asignacion=Asignacion::find($key->id_asignacion);
                    
                    $asignatura=$asignacion->asignatura->asignatura;
                    $codigo=$asignacion->asignatura->codigo;
                    $programa=$asignacion->programa->programa;
                    $nombres=$asignacion->profesor->profesor;
                    $email=$asignacion->profesor->correo;
                    $periodo=$asignacion->periodo->periodo;
                    $mensaje="La asignatura: <b>".$asignatura."</b> de código: <b>".$codigo."</b>, del Programa: <b>".$programa."</b> para el periodo: <b>".$periodo."</b>. ";
                    //correo para el mismo dia de la evaluacion
                    $send_admin=Mail::send('notificaciones.email_cd',
                    ['nombres'=>$nombres, 'mensaje' => $mensaje], function ($m) use ($nombres,$email,$mensaje) {
                    
                    $m->from('enzol.inacap@gmail.com', 'SIME!');
                    $m->to($email)->subject('Notificación de Carga de Calificaciones');
                    
                    });
                    $notificacion_cd= Notificaciones::where('id_pde',$key->id)->first();
                    $notificacion_cd->catorce_dias="Si";
                    $notificacion_cd->save();

                }

                //verificando a los diez dias de la fecha de la evaluacion
                if ($hoy==$diez_dias and $notificacion_dd == 0) {
                    $asignacion=Asignacion::find($key->id_asignacion);
                    
                    $asignatura=$asignacion->asignatura->asignatura;
                    $codigo=$asignacion->asignatura->codigo;
                    $programa=$asignacion->programa->programa;
                    $nombres=$asignacion->profesor->profesor;
                    $email=$asignacion->profesor->correo;
                    $periodo=$asignacion->periodo->periodo;
                    $mensaje="La asignatura: <b>".$asignatura."</b> de código: <b>".$codigo."</b>, del Programa: <b>".$programa."</b> para el periodo: <b>".$periodo."</b>. ";
                    //correo para el mismo dia de la evaluacion
                    $send_admin=Mail::send('notificaciones.email',
                    ['nombres'=>$nombres, 'mensaje' => $mensaje], function ($m) use ($nombres,$email,$mensaje) {
                    
                    $m->from('enzol.inacap@gmail.com', 'SIME!');
                    $m->to($email)->subject('Notificación de Carga de Calificaciones');
                    
                    });
                    $notificacion_md= Notificaciones::where('id_pde',$key->id)->first();
                    $notificacion_md->diez_dias="Si";
                    $notificacion_md->save();

                }
            }
            
        }
        return view('home');
    }
}
