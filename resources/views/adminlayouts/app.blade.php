<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('adminlayouts.head')
<body class="sticky-header left-side-collapsed">
<section>
@component('components.sidebar')
@endcomponent
    <div class="main-content">
        @component('components.header')
        @endcomponent
        <div class="wrapper">
        @yield('content')
        </div>
    </div>
</section>
@include('adminlayouts.footer')
</body>
</html>