<!DOCTYPE html>
<html>

    @include('partials.header')

    <body>
        @include('partials.navbar')

        @yield('content')
        {{-- Page content will sit here --}}
    </body>
</html>
