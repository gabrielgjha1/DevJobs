<?php

namespace App\Http\Controllers;

use App\Candidato;
use App\Vacante;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //obtener un valor por parametros del index.blade se importa request
        // dd($request->route('id'));

        $id_vacante = $request->route('id');

        //Obtener los candidatos y la vacante
        $vacante = Vacante::findOrFail($id_vacante);
        $this->authorize('view',$vacante);

        // dd($vacante);


        return view('candidatos.index',compact('vacante'));
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

        $data = $request->validate([
            'nombre'=>'required',
            'email'=>'required|email',
            'cv'=>'required',
            'vacante_id'=>'required'
        ]);


        //forma 0 con relacion
        //vacante_id viene del form pero tambien se puede sacar del request
        // $vacante = Vacante::find($data['vacante_id']);

        // $vacante->candidatos()->create([

        //     'nombre'=>$data['nombre'],
        //     'email'=>$data['email'],
        //     'cv'=>$data['cv'],


        // ]);

        //forma 1

        // $candidato = new Candidato();
        // $candidato->nombre = $data['nombre'];
        // $candidato->email = $data['email'];
        // $candidato->vacante_id = $data['vacante_id'];
        // $candidato->cv = 'asd.pdf';
        // $candidato->save();

        //forma 2 aqui se debe llena el filleble en el modelo
        // $candidato = new Candidato($data);
        //$candidato->cv = 'asd.pdf';
        // $candidato->save();

        //forma 3 aqui tambien se debe llenar el filleblade


        if($request->file('cv')){
            $archivo = $request->file('cv');
            $nombreArchivo = time() . ".".$request->file('cv')->extension();
            $ubicacion = public_path('/storage/cv');
            $archivo->move($ubicacion,$nombreArchivo);
        }



        $candidato = new Candidato();
        $candidato->fill($data);
        $candidato->cv = $nombreArchivo;
        $candidato->save();

        //obtenemos el id de la vacante
        $vacante = Vacante::find($data['vacante_id']);
        //obtenemos el dueño de la vacante
        $reclutador = $vacante->reclutador;
        //le enviamos el email a su correo
        $reclutador->notify(new \App\Notifications\NuevoCandidato($vacante->titulo,$vacante->id));

        return back()->with('estado','Tus datos se enviaron correctamente! Suerte');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidato $candidato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidato $candidato)
    {
        //
    }
}
