<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title id="document-title"></title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('mparking\adminlte\admin-lte\plugins\fontawesome-free\css\all.min.css') }}">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet"
        href="{{ asset('mparking\adminlte\admin-lte\plugins\tempusdominus-bootstrap-4\css\tempusdominus-bootstrap-4.min.css') }}">

    <link rel="stylesheet"
        href="{{ asset('mparking\adminlte\admin-lte\plugins\icheck-bootstrap\icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('mparking\adminlte\admin-lte\plugins\jqvmap\jqvmap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('mparking\adminlte\admin-lte\dist\css\adminlte.min.css') }}">

    <link rel="stylesheet"
        href="{{ asset('mparking\adminlte\admin-lte\plugins\overlayScrollbars\css\OverlayScrollbars.min.css') }}">

    <link rel="stylesheet"
        href="{{ asset('mparking\adminlte\admin-lte\plugins\daterangepicker\daterangepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('mparking\adminlte\admin-lte\plugins\summernote\summernote-bs4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('mparking\adminlte\admin-lte\plugins\sweetalert2\sweetalert2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('mparking\adminlte\admin-lte\plugins\select2\css\select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('mparking\adminlte\admin-lte\plugins\select2-bootstrap4-theme\select2-bootstrap4.min.css') }}">

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
    </style>
    <script nonce="7d0581b1-6407-4186-a0f2-f444dea1e57e">
        (function(w, d) {
            ! function(j, k, l, m) {
                j[l] = j[l] || {};
                j[l].executed = [];
                j.zaraz = {
                    deferred: [],
                    listeners: []
                };
                j.zaraz.q = [];
                j.zaraz._f = function(n) {
                    return async function() {
                        var o = Array.prototype.slice.call(arguments);
                        j.zaraz.q.push({
                            m: n,
                            a: o
                        })
                    }
                };
                for (const p of ["track", "set", "debug"]) j.zaraz[p] = j.zaraz._f(p);
                j.zaraz.init = () => {
                    var q = k.getElementsByTagName(m)[0],
                        r = k.createElement(m),
                        s = k.getElementsByTagName("title")[0];
                    s && (j[l].t = k.getElementsByTagName("title")[0].text);
                    j[l].x = Math.random();
                    j[l].w = j.screen.width;
                    j[l].h = j.screen.height;
                    j[l].j = j.innerHeight;
                    j[l].e = j.innerWidth;
                    j[l].l = j.location.href;
                    j[l].r = k.referrer;
                    j[l].k = j.screen.colorDepth;
                    j[l].n = k.characterSet;
                    j[l].o = (new Date).getTimezoneOffset();
                    if (j.dataLayer)
                        for (const w of Object.entries(Object.entries(dataLayer).reduce(((x, y) => ({
                                ...x[1],
                                ...y[1]
                            })), {}))) zaraz.set(w[0], w[1], {
                            scope: "page"
                        });
                    j[l].q = [];
                    for (; j.zaraz.q.length;) {
                        const z = j.zaraz.q.shift();
                        j[l].q.push(z)
                    }
                    r.defer = !0;
                    for (const A of [localStorage, sessionStorage]) Object.keys(A || {}).filter((C => C.startsWith(
                        "_zaraz_"))).forEach((B => {
                        try {
                            j[l]["z_" + B.slice(7)] = JSON.parse(A.getItem(B))
                        } catch {
                            j[l]["z_" + B.slice(7)] = A.getItem(B)
                        }
                    }));
                    r.referrerPolicy = "origin";
                    r.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(j[l])));
                    q.parentNode.insertBefore(r, q)
                };
                ["complete", "interactive"].includes(k.readyState) ? zaraz.init() : j.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>

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


    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\jquery\jquery.min.js') }}"></script>

    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\jquery-ui\jquery-ui.min.js') }}"></script>

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\sweetalert2\sweetalert2.all.min.js') }}"></script>

    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\bootstrap\js\bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\chart.js\Chart.min.js') }}"></script>

    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\sparklines\sparkline.js') }}"></script>

    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\jqvmap\jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\jqvmap\maps\jquery.vmap.usa.js') }}"></script>

    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\jquery-knob\jquery.knob.min.js') }}"></script>

    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\moment\moment.min.js') }}"></script>
    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\daterangepicker\daterangepicker.js') }}"></script>

    <script
        src="{{ asset('mparking\adminlte\admin-lte\plugins\tempusdominus-bootstrap-4\js\tempusdominus-bootstrap-4.min.js') }}">
    </script>

    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\summernote\summernote-bs4.min.js') }}"></script>

    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\overlayScrollbars\js\jquery.overlayScrollbars.min.js') }}">
    </script>

    <script src="{{ asset('mparking\adminlte\admin-lte\dist\js\adminlte.js?v=3.2.0') }}"></script>

    <script src="{{ asset('mparking\adminlte\admin-lte\dist\js\pages\dashboard.js') }}"></script>
    <script src="{{ asset('mparking\adminlte\admin-lte\plugins\select2\js\select2.full.min.js') }}"></script>

    <script>
        // Mendapatkan URL saat ini
        var currentUrl = window.location.href;

        // Mendapatkan semua elemen menu
        var menuItems = document.querySelectorAll('.nav-link');

        // Loop melalui setiap elemen menu
        menuItems.forEach(function(menuItem) {
            // Mendapatkan href dari elemen menu
            var menuUrl = menuItem.getAttribute('href');

            // Memeriksa apakah URL saat ini cocok dengan href elemen menu
            if (currentUrl.indexOf(menuUrl) !== -1) {
                // Jika cocok, tambahkan kelas 'active' pada elemen menu
                menuItem.classList.add('active');

                // Jika menu ini dalam submenu, buka menu induk (jika ada)
                var parentMenu = menuItem.closest('.nav-item.menu-close');
                if (parentMenu) {
                    parentMenu.classList.add('menu-open');
                }
            }
        });
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
