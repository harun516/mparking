@extends('dashboard.master')
@section('content')
    <html>

    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <style></style>

    <body>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <form id="startpickingprocessform">
                        <input type="hidden" id="user_id" name="user_id" value="" readonly>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="kdpkr" class="col-sm-2 col-form-label">Kode Parkir</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="kdpkr"
                                            placeholder="Masukkan barcode kendaraan" required>
                                        <div class="input-group-append">
                                            <button type="button" id="getkodeparkir"
                                                class="btn btn-info btn-flat">Go!</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nrfp" class="col-sm-2 col-form-label">Nomor Refrensi
                                    Pengiriman</label>
                                <div class="col-sm-10">
                                    <input type="test" class="form-control" id="nrfp"
                                        placeholder="Masukkan nomor refrensi pengiriman" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="npls" class="col-sm-2 col-form-label">Nomor Polisi</label>
                                <div class="col-sm-10">
                                    <input type="test" class="form-control" id="npls"
                                        placeholder="Masukkan nomor polisi" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nmspr" class="col-sm-2 col-form-label">Nama Supir</label>
                                <div class="col-sm-10">
                                    <input type="test" class="form-control" id="nmspr"
                                        placeholder="Masukkan nama supir" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="stts" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <input type="test" class="form-control" id="stts" placeholder="Masukkan status"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gtprs" class="col-sm-2 col-form-label">Gate Process</label>
                                <div class="col-sm-10">
                                    <input type="test" class="form-control" id="gtprs"
                                        placeholder="Masukkan gate process" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bdlid" class="col-sm-2 col-form-label">Bundle ID</label>
                                <div class="col-sm-10">
                                    <input type="test" class="form-control" id="bdlid"
                                        placeholder="Masukkan bundle id" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nodo" class="col-sm-2 col-form-label">Nomor DO</label>
                                <div class="col-sm-10">
                                    <input type="test" class="form-control" id="nodo"
                                        placeholder="Masukkan nomor do" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pcby" class="col-sm-2 col-form-label">Picking By</label>
                                <div class="col-sm-10">
                                    <input type="test" class="form-control" id="pcby"
                                        placeholder="Masukkan picking by" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" id="simpanData" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                            <button type="button" id="resetForm" class="btn btn-danger">
                                <i class="fas fa-times"></i> Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>

    <script>
        // Start Simpan-Button
        $(document).ready(function() {
            // Tambahkan event listener untuk form dengan id "userform"
            $("#kdpkr").keydown(function(event) {
                // Periksa jika tombol Enter (kode tombol 13) ditekan
                if (event.keyCode === 13) {
                    event.preventDefault(); // Mencegah tindakan bawaan form
                    getkodeparkir(); // Panggil fungsi simpanData() untuk menyimpan data
                }
            });

            // Event handler untuk tombol "Go"
            $("#getkodeparkir").click(function() {
                getkodeparkir();
            });

            function getkodeparkir() {
                var kdpkr = $('#kdpkr').val(); // Mengambil nilai dari input dengan id "kdpkr"

                $.ajax({
                    url: "{{ route('kodeparkirout.show', ':kdpkr') }}".replace(':kdpkr', kdpkr),
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Isi nilai-nilai form dengan data pengguna yang diterima
                        $('#nrfp').val(response
                            .nrfp
                        );
                        $('#npls').val(response
                            .npls
                        );
                        $('#nmspr').val(response
                            .nmspr
                        );
                        $('#stts').val(response
                            .stts
                        );
                        $('#bdlid').val(response
                            .bdlid
                        );
                        $('#nodo').val(response
                            .nodo
                        );
                    },
                    error: function(xhr, status, error) {
                        // Tangani kesalahan
                        var errorMessage = xhr.responseJSON.error;
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: errorMessage,
                        });
                    }
                });
            }

            // Tambahkan event listener untuk form dengan id "userform"
            $("#gtprs, #pcby").keydown(function(event) {
                // Periksa jika tombol Enter (kode tombol 13) ditekan
                if (event.keyCode === 13) {
                    event.preventDefault(); // Mencegah tindakan bawaan form
                    simpanData(); // Panggil fungsi simpanData() untuk menyimpan data
                }
            });

            // Event handler untuk tombol "Simpan"
            $("#simpanData").click(function() {
                simpanData();
            });

            // Event listener untuk tombol "Simpan"
            function simpanData() {
                // Ambil data dari input form
                var kdpkr = $('#kdpkr').val();
                var gtprs = $('#gtprs').val();
                var pcby = $('#pcby').val();

                // Kirim permintaan AJAX untuk menyimpan atau mengupdate data pengguna
                $.ajax({
                    url: "{{ route('startpickingprocess.simpan') }}", // Rute untuk menyimpan atau mengupdate data
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "kdpkr": kdpkr,
                        "gtprs": gtprs,
                        "pcby": pcby,
                    },
                    success: function(response) {
                        // Tangani respons sukses
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: response.message,
                            timer: 2000,
                            showConfirmButton: false
                        }).then(function() {
                            location.reload();
                        });
                    },
                    error: function(xhr, status, error) {
                        // Tangani kesalahan
                        var errorMessage = xhr.responseJSON.error;
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: errorMessage,
                        });
                    }
                });
            }

            // Event listener untuk tombol "Batal"
            $('#resetForm').click(function() {
                // Kosongkan semua field dalam formulir
                $('#startpickingprocessform')[0].reset();
                // Reset nilai input user_id menjadi kosong
                $('#user_id').val('');
            });
        });
        // Finish simpan-Button
    </script>
@endsection
