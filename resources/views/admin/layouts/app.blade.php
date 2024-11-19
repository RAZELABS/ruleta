<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZYC Consultants - CMS</title>
    @include('admin.layouts.ico')
    @vite(['resources/js/backend.js'])
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link
        href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/cr-1.7.0/fh-3.4.0/r-2.5.0/rg-1.4.1/datatables.min.css"
        rel="stylesheet">
    @stack('styles')


</head>

<body data-theme="dark">
    <div class="wrapper">
        @include('admin.layouts.sidebar')
        <div class="main">
            @include('admin.layouts.navbar')
            <main class="content">
                @yield('content')
            </main>
            @include('admin.layouts.footer')
        </div>
    </div>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-validation/additional-methods.js') }}"></script>
    <script src="{{ asset('plugins/jquery-validation/localization/messages_es_PE.js') }}"></script>
    <script src="{{ asset('plugins/jquery-validation/init-validation.js') }}"></script>
    <!-- DataTables con Bootstrap 5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/cr-1.7.0/fh-3.4.0/r-2.5.0/rg-1.4.1/datatables.min.js">
    </script>
    <script src="{{ asset('plugins/custom.js') }}"></script>
    @stack('scripts')
</body>

</html>
