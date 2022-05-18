<?php

namespace App\Http\Controllers;

use App\Models\Profesores;
use App\Models\User;
use App\Models\Programa;
use App\Models\Periodo;
use App\Models\Asignatura;
use Illuminate\Http\Request;
use Alert;
use Datatables;

class ProfesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(request()->ajax()) {
            $profesores=\DB::table('profesores')
            ->join('users','users.id','=','profesores.id_usuario')
            ->select('profesores.*','users.name AS username')->get();
            return datatables()->of($profesores)
                ->addColumn('action', function ($row) {

                    $edit = '<a href="javascript:void(0);" data-id="'.$row->id.'" class="btn btn-warning btn-xs" id="editProfesor" title="Presione para editar información del profesor"><i class="fa fa-pencil-alt"></i></a>';
                    
                    $delete = ' <a href="javascript:void(0);" id="delete-profesor" onClick="deleteProfesor('.$row->id.')" class="delete btn btn-danger btn-xs" title="Presione para eliminar al profesor"><i class="fa fa-trash"></i></a>';

                    $asignar = '<a href="javascript:void(0);" data-id="'.$row->id.'" class="btn btn-success btn-xs" id="asignarProfesor" title="Presione para asignar asignaturas al profesor"><i class="fa fa-check"></i></a>';

                    return $edit . $delete . $asignar;
                })->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        $programas=Programa::all();
        $periodos=Periodo::all();
        $asignaturas=Asignatura::where('id_programa',1)->get();
        return view('profesores.index', compact('programas','periodos','asignaturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('profesores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*$message =[
            'profesor.required' => 'El campo profesor es obligatorio',
            'telefono.required' => 'El campo telefono es obligatorio',
            'correo.required' => 'El campo correo es obligatorio',
        ];
        $validator = \Validator::make($request->all(), [
            'profesor' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email|unique:profesores',
        ],$message);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }*/
        //echo $request->profesor."-".$request->rut."---".$request->correo."--".$request->telefono."--".$request->username;
        $buscar=Profesores::where('profesor',$request->profesor)->where('correo',$request->correo)->count();
        if($buscar > 0){
            return response()->json(['message'=>"El profesor ya ha sido registrado con ese correo",'icono'=>'warning','titulo'=>'Alerta']);
        }else{
            $buscar2=User::where('name',$request->username)->count();
            if ($buscar2 > 0) {
              return response()->json(['message'=>"El Nombre de Usuario ya ha sido registrado",'icono'=>'warning','titulo'=>'Alerta']);  
            } else {
                
                $user = new User();
                $user->name=$request->username;
                $user->email=$request->correo;
                
                $a=date('Y');
                $n=ucfirst(trim($request->username));
                $clave=$n.''.$a.'.';
                $user->password=bcrypt($clave);
                $user->user_type='Profesor';
                $user->save();

                $profesor= new Profesores();
                $profesor->profesor=$request->profesor;
                $profesor->rut=$request->rut;
                $profesor->dv=$request->dv;
                $profesor->telefono=$request->telefono;
                $profesor->correo=$request->correo;
                $profesor->id_usuario=$user->id;
                $profesor->save();


               return response()->json(['message' => "Profesor ".$request->profesor." registrado con éxito: Nombre de Usuario:".$request->username.' y CLAVE: '.$clave."",'icono' => 'success', 'titulo' => 'Éxito']);
            }
            
            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesores  $profesores
     * @return \Illuminate\Http\Response
     */
    public function show(Profesores $profesores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profesores  $profesores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$profesor=Profesores::where('id',$id)->first();
         $profesor=\DB::table('profesores')
            ->join('users','users.id','=','profesores.id_usuario')
            ->where('profesores.id',$id)
            ->select('profesores.*','users.name')->first();

        /*$profesor=\DB::table('profesores')
        ->join('users','users.id','=','profesores.id_usuario')
        ->where('profesores.id',$id)
        ->select('profesores.*','user.name')->first();*/

        return Response()->json($profesor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profesores  $profesores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_profesor)
    {
        /*$message =[
            'profesor.required' => 'El campo profesor es obligatorio',
            'telefono.required' => 'El campo telefono es obligatorio',
            'correo.required' => 'El campo correo es obligatorio',
        ];
        $validator = \Validator::make($request->all(), [
            'profesor' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',
        ],$message);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }*/

        $buscar=Profesores::where('profesor',$request->profesor)->where('correo',$request->correo_edit)->where('id','<>',$request->id_profesor)->count();
        if($buscar > 0){
            return response()->json(['message' => 'El profesor ya ha sido registrado con el correo ingresado','icono' => 'warning','titulo' => 'Alerta']);
        }else{
            $cot= Profesores::find($request->id_profesor);
            $buscar=User::where('name',$request->username)->where('id','<>',$cot->id_usuario)->count();
            if ($buscar > 0) {
              return response()->json(['message'=>"El Nombre de Usuario ya ha sido registrado",'icono'=>'warning','titulo'=>'Alerta']);  
            } else {
                
                $profesor= Profesores::find($request->id_profesor);
                $profesor->profesor=$request->profesor;
                $profesor->rut=$request->rut;
                $profesor->dv=$request->dv;
                $profesor->telefono=$request->telefono;
                $profesor->correo=$request->correo;
                $profesor->status=$request->status;
                $profesor->save();

                $user = User::where('id',$profesor->id_usuario)->first();
                $user->name=$request->username;
                $user->email=$request->correo;
                $mensaje="";
                if(!is_null($request->reset_clave)){
                    /*$a=date('Y');
                    $n=ucfirst(trim($request->username));
                    $clave=$n.''.$a.'.';
                    $user->password=bcrypt($clave);
                    $mensaje=" CLAVE MODIFICADA: ".$clave;*/
                    if ($request->clave_nueva==$request->clave_nueva2) {
                        $user->password=bcrypt($request->clave_nueva);
                        $mensaje=" CLAVE MODIFICADA";
                    } else {
                        $mensaje="LA CLAVE NO SE MODIFICÓ YA QUE NO COINCIDEN";
                    }
                    
                }
                $user->save();
                
                return response()->json(['message' => 'El profesor actualizado con éxito.'.$mensaje, 'icono' => 'success', 'titulo' => 'Éxito']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesores  $profesores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
            $profesor=Profesores::find($id);
            $user=User::where('id',$profesor->id_usuario)->first();
           // $buscar=Cotizaciones::where('id_profesor',$id)->count();
            $buscar=true;
            if ($buscar==0) {
              if($profesor->delete()){
                  $user->delete();
                return response()->json(['message' => 'El profesor fue eliminado con éxito','icono' => 'success', 'titulo' => 'Éxito']);
              }else{
                  return response()->json(['message' => 'El profesor no pudo ser eliminado','icono' => 'warning', 'titulo' => 'Alerta']);
              }
            } else {
              $profesor->status="Suspendido";
              $profesor->save();
              return response()->json(['message' => 'El profesor no pudo ser eliminado, debido a que tiene asignaturas registradas, Se ha cambiado el status a SUSPENDIDO','icono' => 'warning', 'titulo' => 'Alerta']);
            }
            
        
    }

    public function asignar(Request $request)
    {
      $asignatura=Asignatura::find($request->id_asignatura);
      $profesor=Profesores::find($request->id_profesor);
      $programa=Programa::find($request->id_programa);
      $periodo=Periodo::find($request->id_periodo);
      $subseccion_tecnica=$request->jornada."-".$programa->cod."-".$request->semestre."-".$request->pensum."-".$request->seccion;

       $buscar=\DB::table('asignacion')->where('id_periodo',$request->id_periodo)->where('subseccion_tecnica',$subseccion_tecnica)->count();

       if ($buscar==0) {
         #la subseccion tecnica no ha sido asignada
         \DB::table('asignacion')->insert([
          'id_profesor' => $request->id_profesor,
          'id_asignatura' => $request->id_asignatura,
          'id_periodo' => $request->id_periodo,
          'horas' => $request->horas,
          'subseccion_tecnica' => $subseccion_tecnica,
          'subseccion_practica' => $request->subseccion_practica,
          'semestre' => $request->semestre,
          'pensum' => $request->pensum,
          'seccion' => $request->seccion,
          'subseccion_campo_clinico' => $request->subseccion_campo_clinico,
          'jornada' => $request->jornada
         ]);
         echo "aqui";
         /*return response()->json(['message' => 'Al profesor '.$profesor->profesor.' le fue asignada con éxito la asignatura '.$asignatura->asignatura.' para el periodo: '.$periodo->periodo,'icono' => 'success', 'titulo' => 'Éxito']);*/
       } else {
          # la subseccion tecnica ya ha sido asignada
        return response()->json(['message' => 'No se pudo realizar la asignación debido a que la subsección técnica ya ha sido asignada','icono' => 'warning', 'titulo' => 'Alerta']);
       }
       
    }
}
