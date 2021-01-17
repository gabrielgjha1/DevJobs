@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex flex-wrap justify-center" >
        <div class="w-full max-w-sm">
            <div class="flex flex-col break-words border border-2 shadow-md mt-20" >
                <div class="card-header text-center uppercase mt-2">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" class="p-4" novalidate action="{{ route('password.email') }}">
                        @csrf

                        <div class="flex flex-wrap mb-1 mt-5">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>


                                <input id="email" type="email" class="p-3 bg-gray-300 mt-2 rounded form-input w-full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>

                                @error('email')

                                    <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                @enderror

                        </div>

                        <div   class="flex flex-wrap ">

                            <button  class="mt-5 max-w-md bg-green-400 hover:bg-green-600  p-3 w-full l-700 text-gray-100 focus:outline-none focus:shadow-outline uppercase" type="submit" class="btn btn-primary">
                                {{ __('Send Password Reset Link') }}
                                </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
