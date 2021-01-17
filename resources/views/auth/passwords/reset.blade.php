@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex flex-wrap justify-center" >
        <div class="w-full max-w-sm">
            <div class="flex flex-col break-words border border-2 shadow-md mt-20" >
                <div class="text-center mt-3 uppercase">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" class="p-4" novalidate action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="flex flex-wrap mb-1 mt-5">

                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="p-3 bg-gray-200 mt-2 rounded form-input w-full @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}"  autocomplete="email" autofocus>

                                @error('email')
                                    <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="flex flex-wrap mb-1 mt-5">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <input id="password" type="password" class="p-3 bg-gray-200 mt-2 rounded form-input w-full @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="flex flex-wrap mb-1 mt-5">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>


                                <input id="password-confirm" type="password" class="p-3 bg-gray-200 mt-2 rounded form-input w-full" name="password_confirmation"  autocomplete="new-password">

                        </div>

                        <div class="flex flex-wrap mb-1 mt-5 ">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="bg-green-400 hover:bg-green-600  p-3 w-full l-700 text-gray-100 focus:outline-none focus:shadow-outline uppercase">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
