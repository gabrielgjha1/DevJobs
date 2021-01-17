@extends('layouts.app')


@section('navegacion')

    @include('ui.adminav')

@endsection

@section('content')

    <h1 class="text-2xl text-center mt-10" >Notificaciones</h1>

    @if (count($notificaciones)>0)
        <ul class="max-w-md mx-auto mt-10" >

            @foreach ($notificaciones as $item)

                @php
                    $data = $item->data;
                @endphp

                <li  class="p-4 bordes border-gray-400 mb-5" >
                    <p class="mb-4" >

                        Tienens un nuevo candidato en
                        <span class="font-bold">{{$data['vacante']}}</span>
                    </p>

                    <p class="mb-4" >

                        Te envio la solicitud hace
                        <span class="font-bold">{{$item->created_at->diffForHumans()}}</span>
                    </p>
                    <a class="text-center w-full bg-green-500 inline-block text-xs p-4 font-bold uppercase text-white mb-4" href="{{route('candidatos.index',['id'=>$data['vacante_id']])}}">Ver solicitud</a>

                </li>

            @endforeach

        </ul>

    @else

    <p class="text-center mt-5" > No hay notificaciones</p>

    @endif

@endsection
