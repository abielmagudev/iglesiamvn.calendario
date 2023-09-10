<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .has-shadow-animated {
                transition: box-shadow .5s;
            }
            .has-shadow-animated:hover {
                box-shadow: 0 0 1.2rem rgba(99,99,99,.2); 
            }
        </style>
    </head>
    <body class="has-background-light" style="min-height:100vh">
        @include('aplicacion.error')
        <div class="container">
            <section class="section">
                @yield('contenido')
            </section>
        </div>

        @yield('afterContainer')      

        @include('aplicacion.scripts.bulma')

        @stack('scripts')
    </body>
</html>
