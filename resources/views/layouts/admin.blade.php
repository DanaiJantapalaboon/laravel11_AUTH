<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/admin.css')
        @vite('resources/css/admin-custom.css')
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link href="{{ asset('vendor/Linearicons-Free-v1.0.0/linearicons.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/Linearicons-Free-v1.0.0/linearicons_custom.css') }}" rel="stylesheet">

        <style>
            @font-face {
                font-family: "kanit";
                src: url('{{ asset('vendor/fonts-kanit/Kanit-Light.ttf') }}') format("truetype"),
            }
            body {
                font-family: 'kanit', Arial, sans-serif;
            }
        </style>
    </head>
<body>
    <main class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        @include('layouts.admin_header')
        <div class="app-main">
            @include('layouts.admin_sidebar') 
            <div class="app-main__outer">
                @yield('account-content')
                @yield('company-content')
                @yield('user_management-content')
                @yield('user_management_edit-content')
                <div class="app-wrapper-footer">
                    @include('layouts.admin_footer')
                </div>
            </div>
        </div>
    </main>
    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    <script type="text/javascript" src="{{ asset('js/admin-displayDateTime.js') }}"></script>
    @vite('resources/js/admin.js')
</body>

</html>