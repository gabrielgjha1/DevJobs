@extends('layouts.app')

@section('content')

<div class="container mx-auto">
    <div class="flex flex-wrap justify-center" >

            <div class=" p-5 flex flex-col break-words border border-2 shadow-md mt-20" >
                <div class="text-center uppercase">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                  <p class=" mt-5 ">  {{ __('Before proceeding, please check your email for a verification link.') }}</p>
                  <p>  {{ __('If you did not receive the email') }}</p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="bg-green-400 hover:bg-green-600  mt-5 p-3 w-full l-700 text-gray-100 focus:outline-none focus:shadow-outline uppercase">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>

</div>
@endsection
