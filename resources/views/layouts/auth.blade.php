<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        @vite('resources/css/login-custom.css')

        <link href="{{ asset('vendor/bootstrap-5.2.3-dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/bootstrap-icons-1.13.1/bootstrap-icons.css') }}" rel="stylesheet">

        <style>
            @font-face {
                font-family: "bootstrap-icons";
                src: url('{{ asset('vendor/bootstrap-icons-1.13.1/fonts/bootstrap-icons.woff2') }}') format("woff2"),
                     url('{{ asset('vendor/bootstrap-icons-1.13.1/fonts/bootstrap-icons.woff') }}') format("woff");

                font-family: "kanit";
                src: url('{{ asset('vendor/fonts-kanit/Kanit-Light.ttf') }}') format("truetype"),
            }
            body {
                font-family: 'kanit', Arial, sans-serif;
                background-color: var(--bg-background);
            }
        </style>
    </head>
    <body>
        <main class="login-form d-flex justify-content-center align-items-center vh-100">
            <div class="shadow bg-white rounded">
                <div class="container row p-5 align-items-center">
                    <div class="col-md-6">
                        <div class="text-center">
                            <img src="{{ asset('images/login-img.jpg') }}" class="w-75" alt="Login Image">
                        </div>
                    </div>
                    @yield('main-content')
                </div>
                <div class="footer-wrapper p-4">
                    <div class="d-flex justify-content-between">
                        <small class="text-white">Copyright © <script>document.write(new Date().getFullYear())</script> Your Company, All rights reserved.</small>
                        <div class="d-flex">
                            <a href="" target="_blank"><i class="icon bi bi-facebook mx-3"></i></a>
                            <a href="" target="_blank"><i class="icon bi bi-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>