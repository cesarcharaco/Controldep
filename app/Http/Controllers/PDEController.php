<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PDE;
use App\Models\Asignacion;
use App\Models\Asignatura;
use App\Models\Periodo;
use App\Models\Profesores;
use App\Models\Programa;

use Alert;
use Datatables;
class PDEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesor=Profesores::where('id_usuario',\Auth::getUser()->id)->first();

            //dd($asignacion);
        if(request()->ajax()) {
            $asignacion=\DB::table('asignacion')
            ->join('profesores','profesores.id','=','asignacion.id_profesor')
            ->join('asignaturas','asignaturas.id','=','asignacion.id_asignatura')
            ->join('periodos','periodos.id','=','asignacion.id_periodo')
            ->where('profesores.id',$profesor->id)
            ->select('asignacion.*','periodos.periodo','asignaturas.asignatura','asignaturas.codigo')->get();
            return datatables()->of($asignacion)
                ->addColumn('action', function ($row) {
                    $buscar=PDE::where('id_asignacion',$row->id)->count();
                    $add = '<a href="pde/'.$row->id.'/crear_pde" data-id="'.$row->id.'" class="btn btn-success btn-xs" id="addPde"><i class="fa fa-plus"></i></a>';
                    $watch = '<a href="javascript:void(0);" data-id="'.$row->id.'" class="btn btn-info btn-xs" id="watchPde"><i class="fa fa-eye"></i></a>';
                    if ($buscar > 0) {
                       return  $watch;
                    } else {
                       return $add;
                    }
                    
                })->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        $programas=Programa::all();
        return view('pde.index',compact('programas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pde.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function crear_pde($id_asignacion)
    {
        $asignacion=Asignacion::find($id_asignacion);
        $asignatura=Asignatura::find($asignacion->id_asignatura);

        return view('pde.create',compact('id_asignacion','asignacion','asignatura'));
    }
}
