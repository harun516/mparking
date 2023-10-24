document.addEventListener("DOMContentLoaded", function () {
    // Dapatkan referensi ke tombol submit
    var submitBtn = document.getElementById("submit-btn");

    // Dapatkan referensi ke form
    var loginForm = document.getElementById("login-form");

    // Tambahkan event listener untuk menangani submit form
    loginForm.addEventListener("submit", function (e) {
        e.preventDefault(); // Ini akan mencegah form mengirimkan permintaan HTTP

        // Ambil data yang dimasukkan oleh pengguna
        var nama = document.getElementById("nama").value;
        var password = document.getElementById("password").value;

        // Validasi input
        if (nama === "" || password === "") {
            Swal.fire({
                icon: "error",
                title: "Oops!",
                text: "Nama dan password harus diisi!"
            });
        } else {
            // Kirim data ke server
            $.ajax({
                url: loginProsesURL,
                type: "POST",
                dataType: "JSON",
                data: {
                    "nama": nama,
                    "password": password,
                    "_token": "{{ csrf_token() }}" // Menambahkan token CSRF
                },
                success: function (response) {
                    if (response.success) {
                        // Login berhasil
                        Swal.fire({
                            icon: "success",
                            title: "Login Berhasil!",
                            text: "Anda akan diarahkan dalam 3 Detik"
                        });
                        setTimeout(function () {
                            window.location.href = dashboardIndexURL; // Menggunakan URL yang telah Anda sediakan
                        }, 3000);
                    } else {
                        // Login gagal
                        Swal.fire({
                            icon: "error",
                            title: "Login Gagal!",
                            text: response.message
                        });
                    }
                },
                error: function (response) {
                    // Kesalahan server
                    Swal.fire({
                        icon: "error",
                        title: "Oops!",
                        text: "Terjadi kesalahan!"
                    });
                }
            });
        }
    });
});
