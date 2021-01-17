<h2 class="my-10 text-2xl text-gray-700" >
    Busca una vacante
</h2>

<form method="POST"  action="{{route('vacante.buscar')}}"  >
    @csrf
    <div class="mb-5">
        <label class="block mr-2 text-gray-700 text-sm mb-0 col-form-label text-md-left" for="categoria">Categoría:</label>
        <select name="categoria" id="categoria"
        class="block bordes border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full"
        >

        <option selected disabled>- Selecciona -</option>

            @foreach ($categorias as $item)

                <option {{old('categoria')==$item->id ? 'selected': ''   }} value="{{$item->id}}">
                    {{$item->nombre}}
                </option>

             @endforeach

        </select>

        @error('categoria')

        <div class="bg-red-100  border border-red-400  text-red-400 px-4  py-3  rounded relative mt-3  mb-6" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block">{{$message}}</span>
        </div>

      @enderror

    </div>


    <div class="mb-5">
        <label class="block mr-2 text-gray-700 text-sm mb-0 col-form-label text-md-left" for="ubicacion">Ubicacion:</label>
        <select name="ubicacion" id="ubicacion"
        class="block bordes border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full"
        >

        <option selected disabled>- Selecciona -</option>

            @foreach ($ubicaciones as $item)

                <option {{old('ubicacion')==$item->id ? 'selected': ''   }} value="{{$item->id}}">
                    {{$item->nombre}}
                </option>

             @endforeach

        </select>

        @error('ubicacion')

            <div class="bg-red-100  border border-red-400  text-red-400 px-4  py-3  rounded relative mt-3  mb-6" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block">{{$message}}</span>
            </div>

        @enderror

    </div>

    <button type="submit" class="bg-green-500 w-full hover:bg-green-600 text-gray-100 font-bold p-3 focus:outline-none focus:shadow-outline uppercase   mt-10" >Buscar Vacante</button>
</form>
