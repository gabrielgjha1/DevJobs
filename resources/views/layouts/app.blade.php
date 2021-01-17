<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    @yield('styles')

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200 min-h-screen leading-none">

    @if(session('estado'))

        <div class="bg-green-500 p-8 text-center text-white font-bold uppercase " > {{session('estado')}} </div>

    @endif

    <div id="app">
        <nav class="bg-gray-800 shadow-md  py-2 ">
            <div class="flex  items-center  justify-around container mx-auto md:px-0 ">
                <a class="text-2xl text-white    " href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <nav class="flex-1 text-right     ">



                        <!-- Right Side Of Navbar -->

                            <!-- Authentication Links -->
                            @guest

                                    <a class="text-white no-underline hover:underline hover:text-gray-300" href="{{ route('login') }}">{{ __('Login') }}</a>

                                @if (Route::has('register'))

                                        <a class="text-white no-underline hover:underline hover:text-gray-300" href="{{ route('register') }}">{{ __('Register') }}</a>

                                @endif
                            @else
                                       <span class="text-white text-sm pr-4" >{{ Auth::user()->name }}</span>
                                        <a href="{{route('notificacionses')}}"
                                            class="bg-green-500 rounded-full mr-3 px-3 py-1 font-bold text-sm text-white"
                                        >{{ Auth::user()->unreadNotifications->count() }} </a>

                                        <a class="no-underline hover:underline text-gray-300 text-sm p-3"  href="{{ route('vacante.index') }}" >
                                                Mis Vacantes
                                        </a>

                                        <a class="no-underline hover:underline text-gray-300 text-sm p-3" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>


                            @endguest



                </nav>

            </div>
        </nav>

        <div class="bg-gray-700">
            <nav class="container mx-auto flex flex-col text-center  md:flex-row space-x-1" >

                @yield('navegacion')

            </nav>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('script')
</body>
</html>
