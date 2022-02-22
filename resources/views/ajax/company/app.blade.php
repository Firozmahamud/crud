<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Laravel ajax crud</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>


        <main class="py-4">
            @yield('content')
        </main>

    </div>
    <script>
        var root_url = <?php echo json_encode(route('data')) ?>;
        var store = <?php echo json_encode(route('company.store')) ?>;
    </script>
    @stack('ajax_crud')
</body>
</html>
