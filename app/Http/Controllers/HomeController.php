<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PDE;
use App\Models\Asignaturas;
use App\Models\Programa;
use App\Models\Profesores;
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
        
        $asignatura="Inglés I";
        $codigo="FGIN01";
        $programa="Ingeniería en Maquinaria Pesada y Vehículos Automotrices";
        $nombres="cesar";
        $mensaje="La asignatura: <b>".$asignatura."</b> de código: <b>".$codigo."</b>, del Programa: <b>".$programa."</b>. La cual tenia fecha de presentación para el día de hoy y tiene 10 días a partir de la llega de este correo para cargar las calificaciones. Recuerde que la puntualidad y responsabilidad son una de las mayores virtudes de un profesional.";
        $email="jcesarchg9@gmail.com";

        $send_admin=Mail::send('notificaciones.email',
            ['nombres'=>$nombres, 'mensaje' => $mensaje], function ($m) use ($nombres,$email,$mensaje) {

            /*$pdf = PDF::loadView(('pdf/ventas_repartidor'),array('nombres'=>$nombres,'email'=>$email));*/
            $m->from('enzol.inacap@gmail.com', 'SIME!');
            $m->to('jcesarchg9@gmail.com')->subject('Notificación de Carga de Calificaciones');
            //$m->attachData($pdf->output(), "ventas_repartidor.pdf");
        });
        return view('home');
    }
}
