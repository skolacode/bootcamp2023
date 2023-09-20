<!DOCTYPE html>
<html>

    @include('partials.header')

    <body>
        @include('partials.navbar')

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
        {{-- Page content will sit here --}}
    </body>
</html>
