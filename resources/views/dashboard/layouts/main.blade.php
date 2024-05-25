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
    <link rel="stylesheet"
        href="{{ asset('assets-admin/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/compiled/css/table-datatable-jquery.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/extensions/quill/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/extensions/quill/quill.bubble.css') }}">
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

    <script src="{{ asset('assets-admin/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets-admin/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('assets-admin/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets-admin/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets-admin/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets-admin/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets-admin/extensions/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets-admin/static/js/pages/quill.js') }}"></script>
    <script src="{{ asset('assets-admin/compiled/js/app.js') }}"></script>

    <script>
        (function($) {
            window.onbeforeunload = function(e) {
                window.name += ' [' + location.pathname + '[' + $(window).scrollTop().toString() + '[' + $(window)
                    .scrollLeft().toString();
            };
            $.maintainscroll = function() {
                if (window.name.indexOf('[') > 0) {
                    var parts = window.name.split('[');
                    window.name = $.trim(parts[0]);
                    if (parts[parts.length - 3] == location.pathname) {
                        window.scrollTo(parseInt(parts[parts.length - 1]), parseInt(parts[parts.length - 2]));
                    }
                }
            };
            $.maintainscroll();
        })(jQuery);
    </script>

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

    <script>
        let jquery_datatable = $(".dataTables-basic").DataTable({
            responsive: true
        })
        let customized_datatable = $(".dataTables").DataTable({
            responsive: true,
            stateSave: true,
            pagingType: 'simple',
            dom: "<'row'<'col-3'l><'col-9'f>>" +
                "<'row dt-row'<'col-sm-12'tr>>" +
                "<'row'<'col-4'i><'col-8'p>>",
            "language": {
                "info": "Page _PAGE_ of _PAGES_",
                "lengthMenu": "_MENU_ ",
                "search": "",
                "searchPlaceholder": "Search.."
            }
        })

        const setTableColor = () => {
            document.querySelectorAll('.dataTables_paginate .pagination').forEach(dt => {
                dt.classList.add('pagination-primary')
            })
        }
        setTableColor()
        jquery_datatable.on('draw', setTableColor)
    </script>

    @stack('scripts')
</body>

</html>
