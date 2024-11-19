<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZyC Consultants - CMS</title>
    @include('admin.layouts.ico')
    @vite(['resources/js/backend.js'])
    @stack('styles')
</head>

<body>
    <div class="wrapper">
        <div class="main bg-dark">
            <main class="content">
                @yield('content')
            </main>
            @include('admin.layouts.footer')
        </div>
    </div>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/custom.js') }}"></script>
    @stack('scripts')
</body>

</html>
