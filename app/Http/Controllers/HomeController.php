<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PDE;
use App\Models\Asignaturas;
use App\Models\Asignacion;
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
        /*if (\Auth::getUser()->user_type=="Admin") {
            //buscar los pde no cargados
        $buscar=PDE::where('nota_cargada','No')->get();
        //verificando fechas actuales
            $hoy=date('Y-m-d');
            foreach ($buscar as $key) {
                if ($key->fecha==$hoy) {
                    $asignacion=Asignacion::find($key->id_asignacion);
                    $asignatura=$asignacion->asignatura->asignatura;
                    $codigo="FGIN01";
                    $programa="Ingeniería en Maquinaria Pesada y Vehículos Automotrices";
                    $nombres="cesar";
                } else {
                    
                }
            }
            
        }*/
        return view('home');
    }
}
