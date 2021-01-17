<?php

namespace App\Http\Controllers;

use App\Ubicacion;
use App\Vacante;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        // Trae de vacantes cuando activa es 1
        // $vacante = Vacante::where('activa',1)->get();

        $vacante = Vacante::latest()->where('activa',1)->take(10)->get();

        $ubicaciones = Ubicacion::all();

        // dd($vacante);
        return view('inicio.index',compact('vacante','ubicaciones'));
    }
}
