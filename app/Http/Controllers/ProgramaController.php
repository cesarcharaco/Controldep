<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use App\Models\Asignatura;
use Illuminate\Http\Request;
use Alert;
use Datatables;
class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            $programas=Programa::all();
            return datatables()->of($programas)
                ->addColumn('action', function ($row) {
                    $edit = '<a href="javascript:void(0);" data-id="'.$row->id.'" class="btn btn-warning btn-xs" id="editPrograma"><i class="fa fa-pencil-alt"></i></a>';
                    $delete = ' <a href="javascript:void(0);" id="delete-programa" onClick="deletePrograma('.$row->id.')" class="delete btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>';
                    return $edit . $delete;
                })->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('programas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message =[
            'programa.required' => 'El campo programa es obligatorio',
            'cod.required' => 'El campo COD es obligatorio'
        ];
        $validator = \Validator::make($request->all(), [
            'programa' => 'required',
            'cod' => 'required'
        ],$message);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $buscar=Programa::where('programa',$request->programa)->count();
        if($buscar > 0){
            return response()->json(['message'=>"El programa ya ha sido registrado.",'icono'=>'warning','titulo'=>'Alerta']);
        }else{
            $buscar=Programa::where('cod',$request->cod)->count();
            if($buscar > 0){
                return response()->json(['message'=>"El COD ya ha sido registrado.",'icono'=>'warning','titulo'=>'Alerta']);
            }else{
                
                $programa= new Programa();
                $programa->programa=$request->programa;
                $programa->cod=$request->cod;
                $programa->save();
                $programas=Programa::all();
               return response()->json(['message' => "Programa ".$request->programa." registrado con éxito",'icono' => 'success', 'titulo' => 'Éxito','programas' => $programas]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function show(Programa $programa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $programa=Programa::where('id',$id)->first();

        return Response()->json($programa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_programa)
    {
        $message =[
            'programa.required' => 'El campo programa es obligatorio',
        ];
        $validator = \Validator::make($request->all(), [
            'programa' => 'required',
        ],$message);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $buscar=Programa::where('programa',$request->programa)->where('id','<>',$request->id_programa)->count();
        if($buscar > 0){
            return response()->json(['message' => 'El programa ya ha sido registrado','icono' => 'warning','titulo' => 'Alerta']);
        }else{
            $buscar=Programa::where('cod',$request->cod)->where('id','<>',$request->id_programa)->count();
            if($buscar > 0){
                return response()->json(['message' => 'El COD ya ha sido registrado','icono' => 'warning','titulo' => 'Alerta']);
            }else{
                $programa= Programa::find($request->id_programa);
                $programa->programa=$request->programa;
                $programa->cod=$request->cod;
                $programa->save();

                return response()->json(['message' => 'El programa actualizado con éxito', 'icono' => 'success', 'titulo' => 'Éxito']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programa $programa)
    {
        $buscar=\DB::table('asignaturas')->where('id_programa',$id)->count();
        if($buscar > 0){
            return response()->json(['message' => 'La programa se encuentra registrado a alguna asignaturas','icono' => 'warning', 'titulo' => 'Alerta']);
        }else{
            $programa=Programa::find($id);
            if($programa->delete()){
              return response()->json(['message' => 'El programa fue eliminado con éxito','icono' => 'success', 'titulo' => 'Éxito']);
            }else{
                return response()->json(['message' => 'El programa no pudo ser eliminado','icono' => 'warning', 'titulo' => 'Alerta']);
            }
        }
    }

    public function buscar_asignaturas($id_programa)
    {
        return $asignaturas=Asignatura::where('id_programa',$id_programa)->get();
    }
}
