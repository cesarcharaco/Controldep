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
                    $watch = '<a href="pde/'.$row->id.'/ver_pde" data-id="'.$row->id.'" class="btn btn-info btn-xs" id="watchPde"><i class="fa fa-eye"></i></a>';
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
        //dd($request->all());
        $suma=0;
        for ($j=0; $j < count($request->ponderacion_eval); $j++) { 
            $suma+=$request->ponderacion_eval[$j];
        }
        if ($suma==100) {
            for ($i=0; $i < count($request->ponderacion_eval); $i++) {
            $pde=new PDE();
            $pde->id_asignacion=$request->id_asignacion;
            $pde->fecha=$request->fecha[$i];
            $pde->ponderacion_eval=$request->ponderacion_eval[$i];
            $pde->nota_eval=$request->nota_eval[$i];
            $pde->instrumento_eval=$request->instrumento_eval[$i];
            $pde->save();
            }
            Alert::success('??xito', 'Plan de Evaluaci??n registrado')->persistent(true);
            return redirect()->to('pde');
            //dd('mmm');
        } else {
            # debe completar 100 en total
            Alert::error('Alerta', 'Las ponderaciones deben sumar un total de 100 para poder ser registrado')->persistent(true);
            return redirect()->back();
        }
        
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

    public function listar_pde()
    {
        $profesor=Profesores::where('id_usuario',\Auth::getUser()->id)->first();
        if(request()->ajax()) {
            $pde=\DB::table('pde')
            ->join('asignacion','asignacion.id','=','pde.id_asignacion')
            ->join('profesores','profesores.id','=','asignacion.id_profesor')
            ->join('asignaturas','asignaturas.id','=','asignacion.id_asignatura')
            ->join('periodos','periodos.id','=','asignacion.id_periodo')
            ->where('profesores.id',$profesor->id)
            ->select('pde.*','asignacion.subseccion_tecnica','periodos.periodo','asignaturas.asignatura','asignaturas.codigo')->get();
            return datatables()->of($pde)
                ->addColumn('action', function ($row) {
                    $buscar=PDE::where('id_asignacion',$row->id)->count();
                    $edit = '<a href="../pde/'.$row->id.'/editar_estrategia" data-id="'.$row->id.'" class="btn btn-warning btn-xs" id="addPde"><i class="fa fa-pencil-alt"></i></a>';
                    
                    
                       return $edit;
                    
                    
                })->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        
        return view('pde.listar');
    }

    public function editar_estrategia($id_pde)
    {
        //dd($id_pde);
        $pde=PDE::find($id_pde);
        $asignacion=Asignacion::find($pde->id_asignacion);
        $asignatura=Asignatura::find($asignacion->id_asignatura);
        return view('pde.editar_estrategia',compact('pde','asignacion','asignatura'));
    }

    public function editar_pde(Request $request)
    {
        //dd($request->all());
        $pde=PDE::find($request->id_pde);
        $pde->fecha=$request->fecha;
        $pde->nota_eval=$request->nota_eval;
        $pde->instrumento_eval=$request->instrumento_eval;
        $pde->save();

        Alert::success('??xito', 'Estrategia Actualizada')->persistent(true);
            return redirect()->to('pde');
    }

    public function ver_pde($id_asignacion)
    {
        $profesor=Profesores::where('id_usuario',\Auth::getUser()->id)->first();
        if(request()->ajax()) {
            $pde=\DB::table('pde')
            ->join('asignacion','asignacion.id','=','pde.id_asignacion')
            ->join('profesores','profesores.id','=','asignacion.id_profesor')
            ->join('asignaturas','asignaturas.id','=','asignacion.id_asignatura')
            ->join('periodos','periodos.id','=','asignacion.id_periodo')
            ->where('profesores.id',$profesor->id)
            ->where('asignacion.id',$id_asignacion)
            ->select('pde.*','asignacion.subseccion_tecnica','periodos.periodo','asignaturas.asignatura','asignaturas.codigo')->get();
            return datatables()->of($pde)
                ->addColumn('action', function ($row) {
                    $buscar=PDE::where('id_asignacion',$row->id)->count();
                    /*$edit = '<a href="../pde/'.$row->id.'/editar_estrategia" data-id="'.$row->id.'" class="btn btn-warning btn-xs" id="addPde"><i class="fa fa-pencil-alt"></i></a>';
                    
                    
                       return $edit;*/
                    
                    
                })->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        
        return view('pde.ver_pde',compact('id_asignacion'));
    }

    public function listar_pde_admin()
    {
        if(request()->ajax()) {
            $pde=\DB::table('pde')
            ->join('asignacion','asignacion.id','=','pde.id_asignacion')
            ->join('profesores','profesores.id','=','asignacion.id_profesor')
            ->join('asignaturas','asignaturas.id','=','asignacion.id_asignatura')
            ->join('periodos','periodos.id','=','asignacion.id_periodo')
            ->select('pde.*','asignacion.subseccion_tecnica','periodos.periodo','asignaturas.asignatura','asignaturas.codigo','profesores.profesor','profesores.rut','profesores.dv')->get();
            return datatables()->of($pde)
                ->addColumn('action', function ($row) {
                    $buscar=PDE::where('id_asignacion',$row->id)->count();
                    /*$edit = '<a href="../pde/'.$row->id.'/editar_estrategia" data-id="'.$row->id.'" class="btn btn-warning btn-xs" id="addPde"><i class="fa fa-pencil-alt"></i></a>';
                    
                    
                       return $edit;*/
                    
                    
                })->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        
        $programas=Programa::all();
        return view('pde.listar_pde_admin',compact('programas'));
    }
}
