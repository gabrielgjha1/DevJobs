@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
@endsection

@section('navegacion')

    @include('ui.adminav')

@endsection
@section('content')

    <h1 class="text-2xl text-center mt-10 hola" >Editar vacantes</h1>

    <form
        action="{{route('vacante.update',['vacante'=>$vacante->id])}}" method="POST"
        class="max-w-lg mx-auto my-10" >
        @csrf
        @method('PUT')

        <div class="mb-5">

            <label for="titulo" class="block mr-2 text-gray-700 text-sm mb-0 col-form-label text-md-left">Titulo Vacante:</label>
            <input id="titulo"  type="text" class="p-3 bg-gray-100 border-solid bordes border rounded form-input w-full " value="{{$vacante->titulo}}" placeholder="Ingrese un titulo" name="titulo" >

            @error('titulo')

                <div class="bg-red-100  border border-red-400  text-red-400 px-4  py-3  rounded relative mt-3  mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>
                </div>

            @enderror

        </div>

        <div class="mb-5">
            <label class="block mr-2 text-gray-700 text-sm mb-0 col-form-label text-md-left" for="categoria">Categoría:</label>
            <select name="categoria" id="categoria"
            class="block bordes border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full"
            >

            <option selected disabled>- Selecciona -</option>

                @foreach ($categorias as $item)

                    <option {{$vacante->categoria_id==$item->id ? 'selected': ''   }} value="{{$item->id}}">
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

                    <option {{$vacante->ubicacion_id==$item->id ? 'selected': ''   }} value="{{$item->id}}">
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

        <div class="mb-5">
            <label class="block mr-2 text-gray-700 text-sm mb-0 col-form-label text-md-left"  for="experiencia">Experiencias:</label>
            <select name="experiencia" id="experiencia"
            class="block bordes border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full"
            >

            <option selected disabled>- Selecciona -</option>

                @foreach ($ubicaciones as $item)

                    <option {{$vacante->ubicacion_id==$item->id ? 'selected': ''   }} value="{{$item->id}}">
                        {{$item->nombre}}
                    </option>

                 @endforeach

            </select>

            @error('experiencia')

                <div class="bg-red-100  border border-red-400  text-red-400 px-4  py-3  rounded relative mt-3  mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>
                </div>

           @enderror

        </div>


        <div class="mb-5">
            <label class="block mr-2 text-gray-700 text-sm mb-0 col-form-label text-md-left" for="salarios">Salarios:</label>
            <select name="salarios" id="salarios"
            class="block bordes border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full"
            >

            <option selected disabled>- Selecciona -</option>

                @foreach ($salarios as $item)

                    <option {{$vacante->salario_id==$item->id ? 'selected': ''   }} value="{{$item->id}}">
                        {{$item->nombre}}
                    </option>

                 @endforeach

            </select>

            @error('salarios')

            <div class="bg-red-100  border border-red-400  text-red-400 px-4  py-3  rounded relative mt-3  mb-6" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block">{{$message}}</span>
            </div>

              @enderror


        </div>


        <div class="mb-5">
            <label class="block mr-2 text-gray-700 text-sm mb-0 col-form-label text-md-left" for="habilidades">Habilidades:</label>

            @php


                for ($i=0; $i <count($habilidades); $i++) {
                    $habilidades1[$i]=$habilidades[$i]->nombre;

                }


            @endphp


            <lista-habilidades

                :habilidades="{{json_encode($habilidades1)}}"

            ></lista-habilidades>

            @error('habilidades')

            <div class="bg-red-100  border border-red-400  text-red-400 px-4  py-3  rounded relative mt-3  mb-6" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block">{{$message}}</span>
            </div>

          @enderror

        </div>



        <div class="mb-5">
            <label class="block mr-2 text-gray-700 text-sm mb-0 col-form-label text-md-left" for="descripcion">Descripcion:</label>

            <div class=" bordes p-2 editable">

            </div>

            <input type="hidden" value="{{$vacante->descripcion}}" name="descripcion" id="descripcion" >

            @error('descripcion')

                <div class="bg-red-100  border border-red-400  text-red-400 px-4  py-3  rounded relative mt-3  mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>
                </div>

              @enderror

        </div>


        <div class="mb-5">
            <label class="block mr-2 text-gray-700 text-sm mb-0 col-form-label text-md-left"  for="descripcion">Imagen Vacante:</label>

            <div  id="dropzoneDevJobs"  class="dropzone rounded bg-gray-100" ></div>
            <input type="hidden" value="{{$vacante->imagen}}" name="imagen" id="imagen">
        </div>




        <button type="submit" class="bg-green-400 hover:bg-green-600  p-3 w-full l-700 text-gray-100 focus:outline-none focus:shadow-outline uppercase ">Enviar</button>

    </form>

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous"></script>
   <script>

        Dropzone.autoDiscover=false;

        document.addEventListener('DOMContentLoaded',()=>{

            const editor = new MediumEditor('.editable',{
                toolbar: {
                buttons: ['bold', 'italic', 'underline', 'anchor','justifyLeft','justifyCenter','justifyRight','justifyFull','h2','h1'],

            static:true,
            sticky:true
            },
            placeholder:{
                text:"Descripción de la vacante"
                }

            });

            editor.subscribe('editableInput',function(eventObj,editable){
                const contenido = editor.getContent();
                document.querySelector('#descripcion').value=contenido;
            });




            token = document.querySelector('meta[name=csrf-token]').content;
            // console.log(token)

            //llena el edito con el contenido del input hidden
            editor.setContent(document.querySelector('#descripcion').value);

            //dropzone
            const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs',{
                //COnfiguraciones basicas la url es donde enviaremos la peticion cuando salga con exito
                url:"/vacantes/imagen",
                dictDefaultMessage:'Sube aquí tu archivo',
                acceptedFiles:".png,.jpg,jpeg",
                addRemoveLinks:true,
                dictRemoveFile:'Borrar Archivo',
                maxFiles:1,
                headers:{
                    'X-CSRF-TOKEN':token
                },
                init:function(){
                    if(document.querySelector('#imagen').value.trim()){
                        let imagenPublicada = {};
                        imagenPublicada.size =1234;
                        imagenPublicada.name = document.querySelector('#imagen').value;
                        this.options.addedfile.call(this, imagenPublicada);
                        this.options.thumbnail.call(this, imagenPublicada,`/storage/vacantes/${imagenPublicada.name}`);
                        imagenPublicada.previewElement.classList.add('dz-sucess');
                        imagenPublicada.previewElement.classList.add('dz-complete');
                    }

                },
                //si sale bien la peticion cuando arrastramos un archivo
                success: function(file,response){
                    console.log(response);
                    //le asignamos la imagen al input oculto
                    document.querySelector('#imagen').value=response.correcto;
                    //agregamos el nombre del servidor a unestra imagen que venga en file
                    file.nombreServidor = response.correcto;
                },
                //funcion para eliminar mas de 1 archivo y añadir el nuevo
                maxfilesexceeded:function(file){
                    if(this.files[1]!=null){
                        this.removeFile(this.files[0]);
                        this.addFile(file);
                    }
                },
                //reniver los archivos de la base de datos
                removedfile:function(file,response){
                    file.previewElement.parentNode.removeChild(file.previewElement);

                    //creamos un params para mandar al axios
                    params = {
                        imagen:file.nombreServidor ?? document.querySelector('#imagen').value
                    }
                    //enviamos la peticion
                    axios.post('/vacantes/borrarimagen',params)
                        .then(respuesta=>console.log('sadasd'+respuesta))
                }

            });


        });


    </script>
@endsection
