<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="website icon" type="png" href="{{ asset('mparking\adminlte\admin-lte\dist\img\logo.png') }}">
    {{-- otomatis sesuai button sidebar --}}
    <title id="document-title"></title>
    {{-- Font --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    {{-- adminlte --}}
    <link rel="stylesheet" href="{{ asset('mparking\adminlte\admin-lte\plugins\fontawesome-free\css\all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('mparking\adminlte\admin-lte\dist\css\adminlte.min.css') }}">
    {{-- iosmode --}}
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    {{-- bootstrap --}}
    <link rel="stylesheet"
        href="{{ asset('mparking\adminlte\admin-lte\plugins\tempusdominus-bootstrap-4\css\tempusdominus-bootstrap-4.min.css') }}">
    {{-- icheck --}}
    <link rel="stylesheet"
        href="{{ asset('mparking\adminlte\admin-lte\plugins\icheck-bootstrap\icheck-bootstrap.min.css') }}">
    {{-- scrollbars --}}
    <link rel="stylesheet"
        href="{{ asset('mparking\adminlte\admin-lte\plugins\overlayScrollbars\css\OverlayScrollbars.min.css') }}">
    {{-- daterangepicker --}}
    <link rel="stylesheet"
        href="{{ asset('mparking\adminlte\admin-lte\plugins\daterangepicker\daterangepicker.css') }}">
    {{-- summernote --}}
    <link rel="stylesheet" href="{{ asset('mparking\adminlte\admin-lte\plugins\summernote\summernote-bs4.min.css') }}">
    {{-- sweetalert2 --}}
    <link rel="stylesheet" href="{{ asset('mparking\adminlte\admin-lte\plugins\sweetalert2\sweetalert2.min.css') }}">
    {{-- select2 --}}
    <link rel="stylesheet" href="{{ asset('mparking\adminlte\admin-lte\plugins\select2\css\select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('mparking\adminlte\admin-lte\plugins\select2-bootstrap4-theme\select2-bootstrap4.min.css') }}">
    {{-- DataTable --}}
    <link
        href="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-1.13.6/af-2.6.0/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/cr-1.7.0/date-1.5.1/fc-4.3.0/fh-3.4.0/kt-2.10.0/r-2.5.0/rg-1.4.0/rr-1.4.1/sc-2.2.0/sb-1.5.0/sp-2.2.0/sl-1.7.0/sr-1.3.0/datatables.min.css"
        rel="stylesheet">

    <style>
        .navbar-light .navbar-nav .nav-link {
            color: white !important;
            /* Mengubah warna teks menjadi putih */
        }

        .navbar-light .navbar-nav .nav-link .fas {
            color: white !important;
            /* Mengubah warna ikon FontAwesome menjadi putih */
        }

        /* Mengubah warna latar belakang tombol hasil pencarian menjadi hitam */
        .list-group-item {
            background-color: #28a745;
            color: white;
        }

        .search-title {
            color: white;
        }

        [class*=sidebar-light] .list-group-item .search-path {
            color: white;
        }

        [class*=sidebar-light-] .nav-treeview>.nav-item>.nav-link.active,
        [class*=sidebar-light-] .nav-treeview>.nav-item>.nav-link.active:hover {
            background-color: #28a745;
            color: white;
        }

        .nav-icon:active {
            animation: shake 3s;
            /* Animasi shake dengan durasi 0.5 detik */
        }

        @keyframes shake {
            0% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            50% {
                transform: translateX(5px);
            }

            75% {
                transform: translateX(-5px);
            }

            100% {
                transform: translateX(0);
            }
        }
    </style>

</head>

<body class="hold-transition sidebar-mini sidebar-collapse layout-footer-fixed">

    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <i class="fas fa-solid fa-traffic-light animation__shake" style="font-size: 80px; color: #28a745;"></i>
        </div>

        {{-- start navbar --}}
        @include('dashboard.navbar')
        {{-- finish navbar --}}

        {{-- start Sidebar --}}
        @include('dashboard.sidebar')
        {{-- finish sidebar --}}

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 id="page-title" class="m-0"></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol id="breadcrumb" class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>

        </div>

        {{-- start footer --}}
        @include('dashboard.footer')
        {{-- finish footer --}}

    </div>
    {{-- jquery --}}
    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\jquery\jquery.min.js') }}"></script>
    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\jquery-ui\jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    {{-- sweetalert2 --}}
    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\sweetalert2\sweetalert2.all.min.js') }}"></script>
    {{-- Bootstrap --}}
    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\bootstrap\js\bootstrap.bundle.min.js') }}"></script>
    {{-- knob --}}
    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\jquery-knob\jquery.knob.min.js') }}"></script>
    {{-- moment --}}
    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\moment\moment.min.js') }}"></script>
    {{-- daterangepicker --}}
    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\daterangepicker\daterangepicker.js') }}"></script>
    {{-- tempusdominus-bootstrap-4 --}}
    <script
        src="{{ asset('mparking\adminlte\admin-lte\plugins\tempusdominus-bootstrap-4\js\tempusdominus-bootstrap-4.min.js') }}">
    </script>
    {{-- summernote-bs4 --}}
    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\summernote\summernote-bs4.min.js') }}"></script>
    {{-- overlayScrollbars --}}
    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\overlayScrollbars\js\jquery.overlayScrollbars.min.js') }}">
    </script>
    {{-- adminlte --}}
    <script src="{{ asset('mparking\adminlte\admin-lte\dist\js\adminlte.js?v=3.2.0') }}"></script>
    {{-- select2 --}}
    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\select2\js\select2.full.min.js') }}"></script>
    {{-- dataTables --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-1.13.6/af-2.6.0/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/cr-1.7.0/date-1.5.1/fc-4.3.0/fh-3.4.0/kt-2.10.0/r-2.5.0/rg-1.4.0/rr-1.4.1/sc-2.2.0/sb-1.5.0/sp-2.2.0/sl-1.7.0/sr-1.3.0/datatables.min.js">
    </script>
    
    <script>
        // Saat halaman dimuat
        window.addEventListener('load', function() {
            // Mengambil status tautan dari localStorage
            const currentPage = localStorage.getItem('currentPage');

            // Jika ada status tautan, atur judul halaman, judul dokumen HTML, dan breadcrumb
            if (currentPage) {
                document.getElementById('page-title').textContent = currentPage;
                document.title = `PM | ${currentPage}`;
                const breadcrumb = document.getElementById('breadcrumb');
                breadcrumb.innerHTML = `
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
            <li class="breadcrumb-item active">${currentPage}</li>
        `;
            }
        });

        // Menangkap semua elemen tautan sidebar dengan kelas 'nav-link'
        const sidebarLinks = document.querySelectorAll('.nav-link');

        // Membuat event click listener untuk setiap tautan sidebar
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                // Mengambil teks dari tautan yang diklik
                const linkText = link.querySelector('p').textContent;

                // Menyimpan teks tautan ke elemen judul halaman
                document.getElementById('page-title').textContent = linkText;

                // Menyimpan teks tautan ke elemen judul dokumen HTML
                document.title = `PM | ${linkText}`;

                // Menyimpan teks tautan ke localStorage
                localStorage.setItem('currentPage', linkText);

                // Anda juga dapat menambahkan logika lain yang sesuai dengan kebutuhan Anda di sini
            });
        });
    </script>

    <script>
        $(function() {
            // Initialize Select2 Elements
            $('.select2').select2();

            // Initialize Select2 Elements with Bootstrap 4 theme
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
        });
    </script>
</body>

</html>
