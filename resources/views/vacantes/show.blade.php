@extends('layouts.app')



@section('content')
    <h1 class="text-3xl text-center mt-10 "> {{$vacante->titulo}}</h1>

    <div class=" container mt-10 mb-20 md:flex items-start">

        <div class="md:w-3/5">

            <p class="block text-gray-700 font-bold my-2">
                Publicado: <span class="font-normal" >  {{$vacante->created_at->diffForHumans()}} </span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Categoría: <span class="font-normal" >  {{$vacante->categoria->nombre}} </span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Salario: <span class="font-normal" >  {{$vacante->salario->nombre}} </span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Ubicación: <span class="font-normal" >  {{$vacante->ubicacion->nombre}} </span>
            </p>

            <p class="block text-gray-700 font-bold my-2">
                Experiencia: <span class="font-normal" >  {{$vacante->experiencia->nombre}} </span>
            </p>

            <h2 class="text-2xl text-center mt-10 text-gray-700" > Conocimientos y tecnologías  </h2>
            <hr>
                @php
                    $arraySkills = explode(",",$vacante->habilidades_id);
                @endphp
                @foreach ($arraySkills as $item)

                <p class="bordes2 inline-block bg-green-500  py-2 px-8 mr-3 text-gray-700 font-bold my-2">

                    <span class="font-normal" >{{$item}}</span>
                </p>
                @endforeach

            <img src="/storage/vacantes/{{$vacante->imagen}}" class=" w-120 h-120 mt-3 " alt="">
            <h2 class="mt-5" >Descripcion del empleo</h2>
            <div class="descripcion mt-10 mb-5" >
                {!!  $vacante->descripcion  !!}
            </div>

        </div>

        <aside class="md:w-2/5 bg-green-500 p-4 w-full rounded m-3 ">
            <h2 class="text-2xl my-5 text-white uppercase font-bold text-center">Contacta con reclutador</h2>
            <form enctype="multipart/form-data" action="{{route('candidatos.store')}}" method="POST">
                @csrf
                <div class="mb-4" >
                    <label for="nombre" class="block text-white text-sm font-bold mb-4">Ingresa tu nombre</label>

                    <input name="nombre"  id="nombre" value="{{old('nombre')}}" placeholder="Tu nombre"  type="text" class="p-3 bg-gray-100 form-input  w-full @error('nombre')  border border-red-500     @enderror">
                    @error('nombre')
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700  p-4  w-full  mt-5" role="alert">
                            <p>{{$message}}</p>
                        </div>
                    @enderror
                </div>

                <div class="mb-4" >
                    <label for="email" class="block text-white text-sm font-bold mb-4">Ingresa tu email</label>

                    <input name="email" type="text" id="email" value="{{old('email')}}" placeholder="Tu email"  type="text" class="p-3 bg-gray-100 form-input  w-full @error('email')  border border-red-500     @enderror">
                    @error('email')
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700  p-4  w-full  mt-5" role="alert">
                            <p>{{$message}}</p>
                        </div>
                    @enderror
                </div>


                <div class="mb-4" >
                    <label for="cv" class="block text-white text-sm font-bold mb-4">Ingresa tu Curriculum(PDF)</label>

                    <input name="cv" id="cv" value="{{old('cv')}}" placeholder="Tu CV"  type="file" class="p-3 bg-gray-100 form-input  w-full @error('cv')  border border-red-500     @enderror">
                    @error('cv')
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700  p-4  w-full  mt-5" role="alert">
                            <p>{{$message}}</p>
                        </div>
                    @enderror
                </div>

                <input type="hidden" name="vacante_id" id="vacante_id" value="{{$vacante->id}}" >

                <input type="submit"  value="contactar" class="bg-green-700 hover:bg-green-600  w-full text-white p-3 focus:outline-none focus:shadow-outline uppercase  "  >
            </form>
        </aside>
    </div>

@endsection
