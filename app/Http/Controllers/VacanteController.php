<?php

namespace App\Http\Controllers;

use App\Salario;
use App\Vacante;
use App\Categoria;
use App\Ubicacion;
use App\Experiencia;
use App\Habilidades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VacanteController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth','verified']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$vacantes =auth->user()->vacantes;
        $vacantes = Vacante::where('user_id',auth()->user()->id)->simplePaginate(4);

        return view('vacantes.index')
                ->with('vacantes',$vacantes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();
        $habilidades = Habilidades::all();
        // dd($ubicaciones);
        return view('vacantes.create')
              ->with('categorias',$categorias)
              ->with('experiencias',$experiencias)
              ->with('ubicaciones',$ubicaciones)
              ->with('salarios',$salarios)
              ->with('habilidades',$habilidades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([

            'titulo'=>'required|min:4',
            'categoria'=>'required',
            'ubicacion'=>'required',
            'experiencia'=>'required',
            'salarios'=>'required',
            'descripcion'=>'required',
            'habilidades'=>'required'

        ]);
        // dd($request);
        auth()->user()->vacantes()->create([
            'titulo'=>$data['titulo'],
            'descripcion'=>$data['descripcion'],
            'imagen'=>"No Hay",
            'ubicacion_id'=>$data['ubicacion'],
            'categoria_id'=>$data['categoria'],
            'experiencia_id'=>$data['experiencia'],
            'salario_id'=>$data['salarios'],
            'habilidades_id'=>$data['habilidades'],


        ]);

        return redirect()->action('VacanteController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {

        if ($vacante->activa==0){

            return abort(404
        );

        }

        // dd($vacante);
        return view('vacantes.show')->with('vacante',$vacante);

    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     * @param  \App\Vacante  $vacante
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function edit(Vacante $vacante)
    {

        $this->authorize('view',$vacante);
        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();
        $habilidades = Habilidades::all();
        // dd($ubicaciones);
        return view('vacantes.edit')
              ->with('categorias',$categorias)
              ->with('experiencias',$experiencias)
              ->with('ubicaciones',$ubicaciones)
              ->with('salarios',$salarios)
              ->with('habilidades',$habilidades)
              ->with('vacante',$vacante);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacante $vacante)
    {
        $this->authorize('view',$vacante);

        $data = $request->validate([

            'titulo'=>'required|min:4',
            'categoria'=>'required',
            'ubicacion'=>'required',
            'experiencia'=>'required',
            'salarios'=>'required',
            'descripcion'=>'required',
            'habilidades'=>'required'

        ]);


        $vacante->titulo = $data['titulo'];
        $vacante->habilidades_id = $data['habilidades'];
        $vacante->imagen = "No Hay";
        $vacante->descripcion = $data['descripcion'];
        $vacante->categoria_id = $data['categoria'];
        $vacante->experiencia_id = $data['experiencia'];
        $vacante->ubicacion_id = $data['ubicacion'];
        $vacante->salario_id = $data['salarios'];

        $vacante->save();

        return redirect()->action('VacanteController@index');
        //Muestra toda la informacion
        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacante $vacante)
    {

        $vacante->delete();

        return response()->json(["respuesta"=>"ELiminado"]);

    }

    //guardar la imagen
    public function imagen(Request $request){
        //trae la imagen de la  ubicacion temporal
        $imagen = $request->file('file');
        // le asegnamos otro nombre a la imagen
        $nombreImagen = time().'.'.$imagen->extension();
        //la movemos y le asignamos el nombre
        $imagen->move(public_path('storage/vacantes'),$nombreImagen);
        //devolvemos una respuesta que salio correcto e nun formato json
        return response()->json(['correcto'=>$nombreImagen]);

    }

    public function borrarimagen(Request $request){

        //verificamos que se hizo una peticion
        if ($request->ajax()){

            //el valor del parametro que asifnamos en el params lo traemos con get aqui esta el nombre de la imagen
           $imagen = $request->get('imagen');

           //si la imagen existe la borramos
            if (File::exists('storage/vacantes/'.$imagen)){
                File::delete('storage/vacantes/'.$imagen);
            }

        }

        // devolvemos una respuesta
        return response('Imgen emilinada',200);


    }

    //cambia el estado de una vacante
    public function estado (Request $request,Vacante $vacante){

        //leer nuevo estado y asignarlo
        $vacante->activa=$request->estado;

        //guardar en la db
        $vacante->save();

        //asi se traen los datos desde javascrip a php con un json o xml
        // return response()->json($request);

        return response()->json($request->estado);

    }

    public function buscar(Request $request){

        $data = $request->validate([

            'categoria'=>'required',
            'ubicacion'=>'required',


        ]);

        $categoria = $data['categoria'];
        $ubicacion = $data['ubicacion'];

        $vacante = Vacante::latest()->where('categoria_id',$categoria)->where('ubicacion_id',$ubicacion)->get();
        // dd($vacante);
        return view('buscar.buscar',compact('vacante'));
    }
    public function resultado(){

    }

}
