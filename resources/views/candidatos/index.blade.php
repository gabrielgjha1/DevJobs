@extends('layouts.app')

@section('navegacion')

    @include('ui.adminav')

@endsection

@section('content')

    <h1 class="text-2xl text-center mt-10" > Candidatos: {{$vacante->titulo}} </h1>

    @if (count($vacante->candidatos)>0)
        <ul class="max-w-md mx-auto mt-10" >

            @foreach ($vacante->candidatos as $item)

                <li class="p-4 m-4 bordes ">

                    <p class="mb-4" > Nombre:
                        <span class="font-bold" >{{$item->nombre}}</span>
                    </p>
                    <p class="mb-4" >Email:
                        <span class="font-bold" >{{$item->email}}</span>
                    </p>

                    <a class=" w-full text-center bg-green-500 p-3 inline-block text-xs font-bold uppercase text-white " href="/storage/cv/{{$item->cv}}">Ver CV</a>



                </li>

            @endforeach

        </ul>


    @else

        <p class="text-center mt-5 " > No hay candidatos </p>


    @endif

@endsection
