@extends('layouts.app')

@section('content')


    <div class="container mx-auto" >
        <div class="flex flex-wrap justify-center" >
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words border border-2 shadow-md mt-20" >
                    <div class="bg-gray-300 text-gray-700 uppercase text-center py-3 px-6">
                        {{__('Login')}}
                    </div>
                    <form method="POST" novalidate class="p-4" action="{{ route('login') }}">
                        @csrf

                        <div class=" flex flex-wrap mb-6">
                            <label for="email" class="block text-gray-700 text-sm mb-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>


                                <input id="email" type="email" class="p-3 bg-gray-400 rounded form-input w-full  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')

                                    <span class=" bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class=" flex flex-wrap mb-6">
                            <label for="password" class="block text-gray-700 text-sm mb-2 col-form-label text-md-right">{{ __('Password') }}</label>

                                <input id="password" type="password" class="p-3 bg-gray-700 rounded form-input w-full @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                @error('password')
                                <span class=" bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>


                            <div class="flex flex-wrap mb-6">

                                    <input class="mr-2 text-gray-700 text-sm mb-2 col-form-label text-md-right" class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>

                            </div>


                        <div class="flex flex-wrap">

                                <button
                                class="bg-green-400 hover:bg-green-600  p-3 w-full l-700 text-gray-100 focus:outline-none focus:shadow-outline uppercase" type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class=" text-sm text-gray-500 mt-5 text-center displ w-full " href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection
