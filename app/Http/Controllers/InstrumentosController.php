<?php

namespace App\Http\Controllers;

use App\Models\Instrumentos;
use App\Models\PDE;
use Illuminate\Http\Request;
use Alert;
use Datatables;

class InstrumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(request()->ajax()) {
            $instrumentos=Instrumentos::all();
            return datatables()->of($instrumentos)
                ->addColumn('action', function ($row) {
                    $edit = '<a href="javascript:void(0);" data-id="'.$row->id.'" class="btn btn-warning btn-xs" id="editInstrumento"><i class="fa fa-pencil-alt"></i></a>';
                    $delete = ' <a href="javascript:void(0);" id="delete-instrumento" onClick="deleteInstrumento('.$row->id.')" class="delete btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>';
                    return $edit . $delete;
                })->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('instrumentos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //return Response()->json($agencias);
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
            'instrumento.required' => 'El campo instrumento es obligatorio',
        ];
        $validator = \Validator::make($request->all(), [
            'instrumento' => 'required',
        ],$message);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $buscar=Instrumentos::where('instrumento',$request->instrumento)->count();
        if($buscar > 0){
            return response()->json(['message'=>"La instrumento ya ha sido registrado.",'icono'=>'warning','titulo'=>'Alerta']);
        }else{
            
                $instrumento= new Instrumentos();
                $instrumento->instrumento=$request->instrumento;
                $instrumento->save();
                $instrumentos=Instrumentos::all();
               return response()->json(['message' => "Instrumento ".$request->instrumento." registrado con éxito",'icono' => 'success', 'titulo' => 'Éxito','instrumentos' => $instrumentos]);
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instrumentos  $instrumentos
     * @return \Illuminate\Http\Response
     */
    public function show(Instrumentos $instrumentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instrumentos  $instrumentos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instrumentos=Instrumentos::where('id',$id)->first();

        return Response()->json($instrumentos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instrumentos  $instrumentos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instrumentos $instrumentos)
    {
        $message =[
            'instrumento.required' => 'El campo instrumento es obligatorio',
        ];
        $validator = \Validator::make($request->all(), [
            'instrumento' => 'required',
        ],$message);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $buscar=Instrumentos::where('instrumento',$request->instrumento)->where('id','<>',$request->id_instrumento)->count();
        if($buscar > 0){
            return response()->json(['message' => 'La instrumento ya ha sido registrado','icono' => 'warning','titulo' => 'Alerta']);
        }else{
            
                $instrumento= Instrumentos::find($request->id_instrumento);
                $instrumento->instrumento=$request->instrumento;
                $instrumento->save();

                return response()->json(['message' => 'La instrumento actualizada con éxito', 'icono' => 'success', 'titulo' => 'Éxito']);
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instrumentos  $instrumentos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buscar=PDE::where('id_instrumento',$id)->count();
        if($buscar > 0){
            return response()->json(['message' => 'La instrumento se encuentra registrado a algún producto','icono' => 'warning', 'titulo' => 'Alerta']);
        }else{
            $instrumento=Instrumentos::find($id);
            if($instrumento->delete()){
              return response()->json(['message' => 'La instrumento fue eliminado con éxito','icono' => 'success', 'titulo' => 'Éxito']);
            }else{
                return response()->json(['message' => 'La instrumento no pudo ser eliminado','icono' => 'warning', 'titulo' => 'Alerta']);
            }
        }
    }
}
