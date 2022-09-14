<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')

<body>
    <div class="page-wrapper">

        @include('partials.header')
        @yield('content')
        @include('partials.footer')
        @section('scripts')
        @show
    </div>
</body>

</html>