<!DOCTYPE html>
<html lang="id" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="shortcut icon" href="{{ asset('assets-admin/static/images/logo/favicon.ico') }}" type="icon">

    <link rel="stylesheet" href="{{ asset('assets-admin/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/compiled/css/iconly.css') }}">

    <link rel="stylesheet" href="{{ asset('assets-admin/extensions/sweetalert2/sweetalert2.min.css') }}">
    @stack('styles')
</head>

<body>
    <script src="{{ asset('assets-admin/static/js/initTheme.js') }}"></script>
    <div id="app">
        @include('dashboard.includes.sidebar')
        <div id="main">
            @yield('content')
            @include('dashboard.includes.footer')
        </div>
    </div>

    <script src="{{asset('assets-admin/static/js/components/dark.js') }}"></script>
    <script src="{{asset('assets-admin/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <script src="{{asset('assets-admin/compiled/js/app.js') }}"></script>

    <script src="{{ asset('assets-admin/extensions/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        @if (session('errors'))
            Toast.fire({
                icon: 'error',
                title: '{{ session('errors')->first() }}'
            });
        @endif
        @if (session('error'))
            Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}'
            });
        @endif
        @if (session('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            });
        @endif
    </script>

    @stack('scripts')
</body>

</html>
