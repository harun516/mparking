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
                    <form id="mobilform">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="mblid">Mobil ID</label>
                                <input type="text" class="form-control" id="mblid" placeholder="Masukkan mobil">
                            </div>
                            <div class="form-group">
                                <label for="nm">Nama</label>
                                <input type="text" class="form-control" id="nm" placeholder="Masukkan nama">
                            </div>
                            <div class="form-group">
                                <label for="tns">Tonase</label>
                                <input type="number" class="form-control" id="tns" placeholder="Masukkan tonase">
                            </div>
                            <div class="form-group">
                                <label for="kbk">Kubikasi</label>
                                <input type="number" class="form-control" id="kbk" placeholder="Masukkan kubikasi">
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
            $("#mobilform").submit(function(event) {
                event.preventDefault(); // Mencegah pengiriman formulir standar
                simpanData();
            });

            // Tambahkan event listener untuk input "Nama"
            $("#kbk").keydown(function(event) {
                // Periksa jika tombol Enter (kode tombol 13) ditekan
                if (event.keyCode === 13) {
                    event.preventDefault();
                    simpanData();
                }
            });

            // Fungsi untuk menyimpan data
            function simpanData() {
                // Ambil nilai dari input
                var mblid = $("#mblid").val();
                var nm = $("#nm").val();
                var tns = $("#tns").val();
                var kbk = $("#kbk").val();

                // Kirim permintaan AJAX
                $.ajax({
                    url: "{{ route('mobil.store') }}", // Gantilah dengan nama route yang sesuai
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "mblid": mblid,
                        "nm": nm,
                        "tns": tns,
                        "kbk": kbk,
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
                            window.location.href = "{{ route('mobil.index') }}";
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
