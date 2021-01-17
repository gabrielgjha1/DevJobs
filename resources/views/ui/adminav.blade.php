<a href="{{route('vacante.index')}}"  class="text-white text-sm uppercase font-bold p-3  {{Request::is('vacantes')?'bg-green-500' :''}} " >Ver vacantes</a>
<a href="{{route('vacante.create')}}" class="text-white text-sm uppercase font-bold p-3  {{Request::is('vacantes/create')?'bg-green-500' :''}} " >Nueva Vacante</a>
