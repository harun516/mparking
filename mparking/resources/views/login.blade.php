<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('mparking/adminlte/admin-lte/plugins/login/login.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login</title>
</head>

<body>
    <div class="parent clearfix">
        <div class="bg-illustration">
            <img src="{{ asset('mparking/adminlte/admin-lte/dist/img/zyro-image.png') }}" alt="Logo">
            <div class="burger-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="login">
            <div class="container">
                <h1>Login to access your account</h1>
                <div class="login-form">
                    <form id="login-form" action="#">
                        <input type="text" id="nama" class="form-control" placeholder="Nama">
                        <input type="password" id="password" class="form-control" placeholder="Password">
                        <button type="submit" class="btn btn-login btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $("#login-form").submit(function(e) {
                e.preventDefault();

                var nama = $("#nama").val();
                var password = $("#password").val();
                var token = $("meta[name='csrf-token']").attr("content");

                if (nama.length == 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'Nama Wajib Diisi!'
                    });
                } else if (password.length == 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'Password Wajib Diisi!'
                    });
                } else {
                    $.ajax({
                        url: "{{ route('login.proses') }}",
                        type: "POST",
                        dataType: "JSON",
                        cache: false,
                        data: {
                            "nama": nama,
                            "password": password,
                            "_token": token
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Login Berhasil!',
                                    text: 'Anda akan diarahkan dalam 3 Detik',
                                    timer: 3000,
                                    showCancelButton: false,
                                    showConfirmButton: false
                                }).then(function() {
                                    window.location.href =
                                        "{{ route('dashboard.index') }}";
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Login Gagal!',
                                    text: 'Silahkan coba lagi!'
                                });
                            }
                        },
                        error: function(response) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops!',
                                text: 'Server error!'
                            });
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
