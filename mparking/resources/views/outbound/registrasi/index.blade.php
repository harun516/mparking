@extends('dashboard.master')
@section('content')
    <html>

    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <style>
        /* CSS */
        .form-group fieldset p {
            margin-bottom: 0;
            /* Mengurangi margin bawah pada elemen <p> */
        }

        .form-check {
            margin-top: 0;
            /* Mengurangi margin atas pada elemen .form-check */
        }
    </style>

    <body>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <form id="registrasimobilform">
                        <input type="hidden" id="user_id" name="user_id" value="" readonly>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="brcd" class="col-sm-2 col-form-label">Barcode</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="brcd"
                                            placeholder="Masukkan barcode kendaraan" required>
                                        <div class="input-group-append">
                                            <button type="button" id="getbarcode"
                                                class="btn btn-info btn-flat">Go!</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mblid" class="col-sm-2 col-form-label">Jenis Mobil</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="mblid"
                                        placeholder="Masukkan jenis mobil" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tprid" class="col-sm-2 col-form-label">Nama Perusahaan Jasa
                                    Pengiriman</label>
                                <div class="col-sm-10">
                                    <input type="test" class="form-control" id="tprid"
                                        placeholder="Masukkan nama perusahaan jasa pengiriman" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sprnm" class="col-sm-2 col-form-label">Nama Sopir</label>
                                <div class="col-sm-10">
                                    <input type="test" class="form-control" id="sprnm"
                                        placeholder="Masukkan nama sopir" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nktp" class="col-sm-2 col-form-label">Nomor KTP Supir</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="nktp"
                                        placeholder="Masukkan nomor KTP supir" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nvks" class="col-sm-2 col-form-label">Nomor Sertifikat Vaksin Supir</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="nvks"
                                        placeholder="Masukkan nomor sertifikat vaksin supir" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nrfsi" class="col-sm-2 col-form-label">Nomor Referensi Surat Jalan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nrfsi"
                                        placeholder="Masukkan nomor refrensi surat jalan" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dk" class="col-sm-2 col-form-label">Dokumen Kendaraan</label>
                                <div class="col-sm-10">
                                    <fieldset>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="simCheckbox"
                                                name="simChecked" value="ya">
                                            <label class="form-check-label" for="simCheckbox">
                                                SIM
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="stnkCheckbox"
                                                name="stnkChecked" value="ya">
                                            <label class="form-check-label" for="stnkCheckbox">
                                                STNK
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="kirCheckbox"
                                                name="kirChecked" value="ya">
                                            <label class="form-check-label" for="kirCheckbox">
                                                KIR
                                            </label>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kk" class="col-sm-2 col-form-label">Kondisi Kendaraan</label>
                                <div class="col-sm-10">
                                    <fieldset>
                                        <div class="form-group">
                                            <p>Tidak Bersih</p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="ya"
                                                    id="ya_tdkbrsh" name="tdkbrsh">
                                                <label class="form-check-label" for="ya_tdkbrsh">
                                                    Ya
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="tidak"
                                                    id="tdk_tdkbrsh" name="tdkbrsh" checked>
                                                <label class="form-check-label" for="tdk_tdkbrsh">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <p>Bocor</p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="ya"
                                                    id="bcr" name="bcr">
                                                <label class="form-check-label" for="bcr">
                                                    Ya
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="tidak"
                                                    id="tdkbcr"name="bcr" checked>
                                                <label class="form-check-label" for="tdkbcr">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <p>Bau</p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="ya"
                                                    id="bau" name="bau">
                                                <label class="form-check-label" for="ya_bau">
                                                    Ya
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="tidak"
                                                    id="tdkbau" name="bau" checked>
                                                <label class="form-check-label" for="tidak_bau">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="note" class="col-sm-2 col-form-label">Catatan</label>
                                <div class="col-sm-10">
                                    <input type="textarea" class="form-control" id="note"
                                        placeholder="Masukkan catatan" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="rgsby" class="col-sm-2 col-form-label">Registrasi Oleh</label>
                                <div class="col-sm-10">
                                    <input type="textarea" class="form-control" id="rgsby"
                                        placeholder="Masukkan registrasi oleh" required>
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
            $("#brcd").keydown(function(event) {
                // Periksa jika tombol Enter (kode tombol 13) ditekan
                if (event.keyCode === 13) {
                    event.preventDefault(); // Mencegah tindakan bawaan form
                    getbarcode(); // Panggil fungsi simpanData() untuk menyimpan data
                }
            });

            // Event handler untuk tombol "Simpan"
            $("#getbarcode").click(function() {
                getbarcode();
            });

            function getbarcode() {
                var brcd = $('#brcd').val(); // Mengambil nilai dari input dengan id "brcd"

                $.ajax({
                    url: "{{ route('mobilbarcodeout.show', ':brcd') }}".replace(':brcd', brcd),
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Isi nilai-nilai form dengan data pengguna yang diterima
                        $('#mblid').val(response
                            .mobilName
                        ); // Isi dengan nama mobil yang sudah Anda dapatkan dari respons pertama
                        $('#tprid').val(response
                            .transporterName
                        ); // Isi dengan nama transportasi yang sudah Anda dapatkan dari respons pertama
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
            $("#sprnm, #nktp, #nvks, #pgnid, #nrfs, #note, #rgsby").keydown(function(event) {
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
                var brcd = $('#brcd').val(); // ID pengguna
                var sprnm = $('#sprnm').val();
                var nktp = $('#nktp').val();
                var nvks = $('#nvks').val();
                var nrfsi = $('#nrfsi').val();
                var note = $('#note').val();
                var rgsby = $('#rgsby').val();

                // Mendapatkan nilai dari checkbox
                var simChecked = document.getElementById("simCheckbox").checked ? 'ya' : 'tidak';
                var stnkChecked = document.getElementById("stnkCheckbox").checked ? 'ya' : 'tidak';
                var kirChecked = document.getElementById("kirCheckbox").checked ? 'ya' : 'tidak';

                // Mendapatkan nilai dari radio button
                var tdkbrshValue = $("input[name='tdkbrsh']:checked").val();
                var bcrValue = $("input[name='bcr']:checked").val();
                var bauValue = $("input[name='bau']:checked").val();

                // Kirim permintaan AJAX untuk menyimpan atau mengupdate data pengguna
                $.ajax({
                    url: "{{ route('registrasimobilout.simpan') }}", // Rute untuk menyimpan atau mengupdate data
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "brcd": brcd,
                        "sprnm": sprnm,
                        "nktp": nktp,
                        "nvks": nvks,
                        "nrfsi": nrfsi,
                        "note": note,
                        "rgsby": rgsby,
                        "simChecked": simChecked,
                        "stnkChecked": stnkChecked,
                        "kirChecked": kirChecked,
                        "tdkbrshValue": tdkbrshValue,
                        "bcrValue": bcrValue,
                        "bauValue": bauValue
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
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: "Terjadi kesalahan: " + error,
                        });
                    }
                });
            }

            // Event listener untuk tombol "Batal"
            $('#resetForm').click(function() {
                // Kosongkan semua field dalam formulir
                $('#registrasimobilform')[0].reset();
                // Kosongkan nilai yang dipilih dalam combo box dengan Select2
                $('#mblid').val(null).trigger('change');
                $('#tprid').val(null).trigger('change');
                // Reset nilai input user_id menjadi kosong
                $('#user_id').val('');
            });
        });
        // Finish simpan-Button
    </script>
@endsection
