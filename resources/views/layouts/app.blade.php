<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- This Font awesome Kit belongs to Dean Denaki. Please change when there's problem occurs -->
    <script src="https://kit.fontawesome.com/2b9cba7764.js" crossorigin="anonymous">
    </script>
    <!-- adminLTE (Dashboard) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css"
        integrity="sha384-qrt37eUXKQgF1p6OlpdB29OTyKryxbxdJHkvfVN4suujWnn6PibIvbnygcK4uJfA" crossorigin="anonymous">
    <!-- Calendar from -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('head')
</head>



{{-- a snippet to make a mini sidebar --}}
{{-- <body class="layout-fixed layout-navbar-fixed sidebar-mini sidebar-collapse"> --}}

<body class="layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        @include('components.navbar')

        @include('components.sidebar')

        <div class="content-wrapper p-3" style="min-height: 100vh">
            @yield('main')
        </div>

    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-vtXRMe3mGCbOeY7l30aIg8H9p3GdeSe4IFlP6G8JMa7o7lXvnz3GFKzPxzJdPfGK" crossorigin="anonymous">
    </script>
    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <!-- AdminLTE App -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"
        integrity="sha384-GzAyPc+9MeNdsDGfpe/gNkeDXXSbdZdY0yKEFBGFxqmq/97NJ92k5oyF1YPOOhm5" crossorigin="anonymous">
    </script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    {{-- @stack('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    @include('sweetalert::alert') --}}


    @extends('components.notifications')
    
    @if(session()->has('success'))
    <div class="alert-data text-primary" data-type="success" data-message="{{ session('success') }}"></div>
    @endif

</body>

</html>
