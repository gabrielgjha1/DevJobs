@extends('layouts.app')


@section('navegacion')

    @include('ui.categoriasnav')

@endsection
@section('content')

<div class="my-10 bg-gray-100 p-10  container" >
    <h1 class="text-3xl text-gray-700 m-0" >
        Resultados

    </h1>

    @include('ui.listadovacante')
</div>

@endsection
