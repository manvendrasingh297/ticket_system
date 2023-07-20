<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">

            <link href="{{ asset('front_theme/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" /> 
            <link href="{{ asset('front_theme/assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" /> 
            <link href="{{ asset('front_theme/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('front_theme/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" /> 
            <link href="{{ asset('front_theme/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />  
            <link href="{{ asset('front_theme/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" /> 
            <link href="{{ asset('front_theme/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

            <link href="{{ asset('assets/cdns/jquery.dataTables.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/cdns/buttons.dataTables.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />

            <div class="min-h-screen bg-blue-100">
                @include('front.layouts.navigation')

                <!-- Page Heading -->
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>

        @yield('content')
                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>

            
            <script src="{{ asset('front_theme/assets/libs/jquery/jquery.min.js') }}"></script>
            <script src="{{ asset('front_theme/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('front_theme/assets/libs/metismenu/metisMenu.min.js') }}"></script>
            <script src="{{ asset('front_theme/assets/libs/simplebar/simplebar.min.js') }}"></script>
            <script src="{{ asset('front_theme/assets/libs/node-waves/waves.min.js') }}"></script> 
            <script src="{{ asset('front_theme/assets/js/pages/dashboard.init.js') }}"></script> 
            <script src="{{ asset('front_theme/assets/libs/dropzone/min/dropzone.min.js') }}"></script> 
            <script src="{{ asset('front_theme/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('front_theme/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script> 
            <script src="{{ asset('front_theme/assets/js/pages/datatables.init.js') }}"></script>   
            <script src="{{ asset('front_theme/assets/js/app.js') }}"></script>


            <script src="{{ asset('assets/cdns/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('assets/cdns/dataTables.buttons.min.js') }}"></script>
            <script src="{{ asset('assets/cdns/jszip.min.js') }}"></script>
            <script src="{{ asset('assets/cdns/pdfmake.min.js') }}"></script>
            <script src="{{ asset('assets/cdns/vfs_fonts.js') }}"></script>
            <script src="{{ asset('assets/cdns/buttons.html5.min.js') }}"></script>
            
        @yield('script')
        <script> 
            setTimeout(function() { 
                $(".alert").hide();
            }, 4000);
        </script>
    </body>
</html>
