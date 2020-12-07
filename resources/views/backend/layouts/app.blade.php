<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') {{ config('app.name') }}</title>
    @include('backend.includes.styles')
    @stack('styles')
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');

    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            {{-- include header --}}
            @include('backend.includes.header')
            {{-- include sidebar --}}
            @include('backend.includes.sidebar')

            <!-- Main Content -->

            @yield('content')
            @include('backend.includes.footer')
        </div>
    </div>

    @stack('before-scripts')

    @include('backend.includes.scripts')

    @stack('after-scripts')
</body>

</html>
