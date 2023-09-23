@extends('dashboard.master')
@section('content')
    <html>

    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>

    <body>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form id="userform">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nm">Nama</label>
                                <input type="text" class="form-control" id="nm" placeholder="Masukkan nama">
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control select2bs4" id="rlid" style="width: 100%;" data-placeholder="Pilih Role">
                                    <option></option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->role_id }}">{{ $role->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="eml">Email address</label>
                                <input type="email" class="form-control" id="eml" placeholder="Masukkan email">
                            </div>
                            <div class="form-group">
                                <label for="ktsd">Kata Sandi</label>
                                <input type="password" class="form-control" id="ktsd"
                                    placeholder="Masukkan kata sandi">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
    </body>

    </html>
    <script>
        $(document).ready(function() {
            // Tangkap form yang dikirim
            $("#userrform").submit(function(event) {
                event.preventDefault(); // Mencegah pengiriman formulir standar
                simpanData();
            });

            // Tambahkan event listener untuk input "Nama"
            $("#ktsd").keydown(function(event) {
                // Periksa jika tombol Enter (kode tombol 13) ditekan
                if (event.keyCode === 13) {
                    event.preventDefault();
                    simpanData();
                }
            });

            // Fungsi untuk menyimpan data
            function simpanData() {
                // Ambil nilai dari input
                var nm = $("#nm").val();
                var rlid = $("#rlid").val();
                var eml = $("#eml").val();
                var ktsd = $("#ktsd").val();

                // Kirim permintaan AJAX
                $.ajax({
                    url: "{{ route('user.store') }}", // Gantilah dengan nama route yang sesuai
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "nm": nm,
                        "rlid": rlid,
                        "eml": eml,
                        "ktsd": ktsd,
                    },
                    success: function(response) {
                        // Tangani respons sukses
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: response.message,
                            timer: 2000, // Menampilkan notifikasi selama 2 detik
                            showConfirmButton: false // Tidak menampilkan tombol OK
                        }).then(function() {
                            // Arahkan pengguna ke halaman indeks setelah 2 detik
                            window.location.href = "{{ route('user.index') }}";
                        });
                    },
                    error: function(xhr, status, error) {
                        // Tangani kesalahan
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: "Terjadi kesalahan: " + error,
                        });
                    }
                });
            }
        });
    </script>
@endsection
