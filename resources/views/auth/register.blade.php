@extends('layouts.app')


@section('content')
<div class="container mx-auto max-w-screen-md" >
    <div class="flex flex-wrap justify-center" >
        <div  class="md:w-1/2 md:order-1 order-2"  >
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words border border-2 shadow-md mt-20" >
                    <div class="bg-gray-300 text-gray-700 uppercase text-center py-3 px-6">
                        {{__('Register')}}
                    </div>
                        <form class="p-4" method="POST" novalidate action="{{ route('register') }}">
                            @csrf

                            <div class=" flex flex-wrap mb-6">
                                <label for="name" class="block text-gray-700 text-sm mb-2 col-form-label text-md-right">{{ __('Name') }}</label>


                                    <input id="name" type="text" class="p-3 bg-gray-200 rounded form-input w-full @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                    @error('name')
                                    <span class=" bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            </div>

                            <div class="flex flex-wrap mb-6">
                                <label for="email" class="block text-gray-700 text-sm mb-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>


                                    <input id="email" type="email" class="p-3 bg-gray-200 rounded form-input w-full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                    @error('email')
                                    <span class=" bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            </div>

                            <div class="flex flex-wrap mb-6">
                                <label for="password" class="block text-gray-700 text-sm mb-2 col-form-label text-md-right">{{ __('Password') }}</label>


                                    <input id="password" type="password" class="p-3 bg-gray-200 rounded form-input w-full @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                    @error('password')
                                    <span class=" bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            </div>

                            <div class="flex flex-wrap mb-6">
                                <label for="password-confirm" class="block text-gray-700 text-sm mb-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>


                                    <input id="password-confirm" type="password" class="p-3 bg-gray-200 rounded form-input w-full" name="password_confirmation"  autocomplete="new-password">

                            </div>

                            <div class="flex flex-wrap mb-6">

                                    <button class="bg-green-400 hover:bg-green-600  p-3 w-full l-700 text-gray-100 focus:outline-none focus:shadow-outline uppercase" type="submit" class="btn btn-primary">

                                        {{ __('Register') }}
                                    </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div  class="md:w-1/2 text-center flex-col justify-center order-1 md:order-2"  >
                <h1 class="text-green-500 text-3xl">¿ Eres Reclutador ? </h1>
                <p class= " text-xl mt-5 leading-7 " >Crea una cuenta totalmente gratis  y crea hasta 10 vacantes </p>
            </div>
        </div>

    </div>
@endsection
