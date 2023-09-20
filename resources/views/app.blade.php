<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('partials.header')

    <body>

        @include('partials.navbar')

        @yield('content')
    </body>
</html>
