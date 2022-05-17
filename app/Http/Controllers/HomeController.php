<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Correlativos;
use App\Models\PreCotizaciones;
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
        $nombres="cesar";
        $mensaje="hola mundo";
        $email="jcesarchg9@gmail.com";

        $send_admin=Mail::send('notificaciones.email',
            ['nombres'=>$nombres, 'mensaje' => $mensaje], function ($m) use ($nombres,$email,$mensaje) {

            /*$pdf = PDF::loadView(('pdf/ventas_repartidor'),array('nombres'=>$nombres,'email'=>$email));*/
            $m->from('enzol.inacap@gmail.com', 'Naturandes!');
            $m->to('jcesarchg9@gmail.com')->subject('Probando envio de correo');
            //$m->attachData($pdf->output(), "ventas_repartidor.pdf");
        });
        return view('home');
    }
}
