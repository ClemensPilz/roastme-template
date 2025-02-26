<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
        @yield('scripts')

        <title>Roast Me</title>
    </head>

    <body class="min-vh-100 d-flex flex-column">
        @include('partials.nav')

        <main class="text-light my-4 pb-5 flex-grow-1">
            @yield('content')
        </main>

        @include('partials.footer')
    </body>
</html>
