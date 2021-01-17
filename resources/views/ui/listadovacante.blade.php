<ul class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">

    @foreach ($vacante as $item)

        <li class="p-10 border border-gray-300 bg-white shadow ">
          <h2 class="text-2xl text-green-500 font-bold text-center" > {{$item->titulo}}</h2>
          <p class="block text-gray-700 font-normal my-2 " >
              {{$item->categoria->nombre}}
          </p>
          <p class="block text-gray-700 font-normal my-2 " >
            Ubicación:
            <span class="font-bold" >{{$item->ubicacion->nombre}}</span>
        </p>

        <p class="block text-gray-700 font-normal my-2 " >
            Experiencia:
            <span class="font-bold" >{{$item->experiencia->nombre}}</span>
        </p>

        <a class="bg-green-500 text-center w-full text-gray-100 mt-2 px-4 py-2 inline-block rounded font-bold text-sm  " href="{{route('vacante.show',['vacante'=>$item->id])}}">Ver Vacante</a>

        </li>

    @endforeach

</ul>
