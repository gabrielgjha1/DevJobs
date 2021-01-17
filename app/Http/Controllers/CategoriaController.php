<?php

namespace App\Http\Controllers;

use App\Vacante;
use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function show(Categoria $categoria){


        $vacante = Vacante::where('categoria_id',$categoria->id)->where('activa',1)->paginate(10);
        // dd($vacantes);

        return view('categorias.show',compact('vacante','categoria'));
    }
}