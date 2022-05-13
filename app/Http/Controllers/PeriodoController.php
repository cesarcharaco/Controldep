<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;
use Alert;
use Datatables;
class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            $periodos=Periodo::all();
            return datatables()->of($periodos)
                ->addColumn('action', function ($row) {
                    $edit = '<a href="javascript:void(0);" data-id="'.$row->id.'" class="btn btn-warning btn-xs" id="editPeriodo"><i class="fa fa-pencil-alt"></i></a>';
                    $delete = ' <a href="javascript:void(0);" id="delete-periodo" onClick="deletePeriodo('.$row->id.')" class="delete btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>';
                    return $edit . $delete;
                })->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('periodos.index');
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
            'periodo.required' => 'El campo periodo es obligatorio',
        ];
        $validator = \Validator::make($request->all(), [
            'periodo' => 'required',
        ],$message);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $buscar=Periodo::where('periodo',$request->periodo)->count();
        if($buscar > 0){
            return response()->json(['message'=>"El periodo ya ha sido registrado.",'icono'=>'warning','titulo'=>'Alerta']);
        }else{
            
                $periodo= new Periodo();
                $periodo->periodo=$request->periodo;
                $periodo->status=$request->status;
                $periodo->save();
                $periodos=Periodo::all();
               return response()->json(['message' => "Periodo ".$request->periodo." registrado con éxito",'icono' => 'success', 'titulo' => 'Éxito','periodos' => $periodos]);
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function show(Periodo $periodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $periodo=Periodo::where('id',$id)->first();

        return Response()->json($periodo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_periodo)
    {
        $message =[
            'periodo.required' => 'El campo periodo es obligatorio',
        ];
        $validator = \Validator::make($request->all(), [
            'periodo' => 'required',
        ],$message);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $buscar=Periodo::where('periodo',$request->periodo)->where('id','<>',$request->id_periodo)->count();
        if($buscar > 0){
            return response()->json(['message' => 'El periodo ya ha sido registrado','icono' => 'warning','titulo' => 'Alerta']);
        }else{
            
                $periodo= Periodo::find($request->id_periodo);
                $periodo->periodo=$request->periodo;
                $periodo->status=$request->status;
                $periodo->save();

                return response()->json(['message' => 'La periodo actualizado con éxito', 'icono' => 'success', 'titulo' => 'Éxito']);
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periodo $periodo)
    {
        $buscar=\DB::table('profesores_has_asignaturas')->where('id_periodo',$id)->count();
        if($buscar > 0){
            return response()->json(['message' => 'La periodo se encuentra registrado a alguna asignación de asignaturas','icono' => 'warning', 'titulo' => 'Alerta']);
        }else{
            $periodo=Periodo::find($id);
            if($periodo->delete()){
              return response()->json(['message' => 'La periodo fue eliminado con éxito','icono' => 'success', 'titulo' => 'Éxito']);
            }else{
                return response()->json(['message' => 'La periodo no pudo ser eliminado','icono' => 'warning', 'titulo' => 'Alerta']);
            }
        }
    }
}
