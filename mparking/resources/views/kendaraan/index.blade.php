@extends('dashboard.master')
@section('content')
    <html>

    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.5/JsBarcode.all.min.js"
            integrity="sha512-QEAheCz+x/VkKtxeGoDq6nsGyzTx/0LMINTgQjqZ0h3+NjP+bCsPYz3hn0HnBkGmkIFSr7QcEZT+KyEM7lbLPQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <style>
        /* CSS untuk mengatur gambar barcode agar berada di tengah */
        #barcodeImage {
            max-width: 100%;
            /* Lebar maksimum sesuai dengan lebar parent element */
            height: auto;
            /* Tinggi menyesuaikan agar aspek ratio tetap terjaga */
        }
    </style>

    <body>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" id="collapseButton">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <h5 class="float-right">Tambah Kendaraan</h5>
                    </div>
                    <form id="kendaraanform" style="display: none;">
                        <input type="hidden" id="user_id" name="user_id" value="" readonly>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kndrid">Kendaraan ID</label>
                                        <input type="text" class="form-control" id="kndrid"
                                            placeholder="Masukkan kendaraan">
                                    </div>
                                    <div class="form-group">
                                        <label for="npl">No Polisi</label>
                                        <input type="text" class="form-control" id="npl"
                                            placeholder="Masukkan no polisi">
                                    </div>
                                    <div class="form-group">
                                        <label for="nstnk">No STNK</label>
                                        <input type="text" class="form-control" id="nstnk"
                                            placeholder="Masukkan no stnk">
                                    </div>
                                    <div class="form-group">
                                        <label for="nkir">No KIR</label>
                                        <input type="text" class="form-control" id="nkir"
                                            placeholder="Masukkan no stnk">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Transporter ID</label>
                                        <select class="form-control select2bs4" id="tprid" style="width: 100%;"
                                            data-placeholder="Pilih Transporter">
                                            <option> </option>
                                            @foreach ($transporters as $tpr)
                                                <option value="{{ $tpr->transporter_id }}">{{ $tpr->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Mobil ID</label>
                                        <select class="form-control select2bs4" id="mblid" style="width: 100%;"
                                            data-placeholder="Pilih Mobil">
                                            <option> </option>
                                            @foreach ($mobils as $mbl)
                                                <option value="{{ $mbl->mobil_id }}">{{ $mbl->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="thnpr">Tahun Produksi</label>
                                        <input type="number" class="form-control" id="thnpr" min="1900"
                                            max="2099" step="1" placeholder="Masukkan tahun Produksi">
                                    </div>
                                    <div class="form-group">
                                        <label for="brcd">Barcode</label>
                                        <input type="text" class="form-control" id="brcd"
                                            placeholder="Pindai atau masukkan barcode" readonly>
                                        <img id="barcodeImage" src="" alt="Barcode">
                                    </div>
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
                            <button id="cetakBarcodeButton" class="btn btn-dark">
                                <i class="fas fa-print"></i> Cetak Barcode
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>Data Kendaraan</h3>
            </div>

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        {{-- <tr>
                            <th>Role ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Dibuat Tanggal</th>
                        </tr> --}}
                    </thead>
                </table>
            </div>
        </div>
    </body>

    </html>
    <script>
        // Start DataTable
        $(document).ready(function() {
            var table = $('#example1').DataTable({
                "ajax": "{{ route('kendaraan.get') }}",
                "columns": [{
                        "data": "barcode",
                        "title": "<div style='text-align:center;'>Barcode</div>",
                    },
                    {
                        "data": "kendaraan_id",
                        "title": "<div style='text-align:center;'>Kendaraan ID</div>",
                    },
                    {
                        "data": "nama_transporter",
                        "title": "<div style='text-align:center;'>Transporter</div>",
                    },
                    {
                        "data": "nama_mobil",
                        "title": "<div style='text-align:center;'>Mobil</div>",
                    },
                    {
                        "data": "no_pol",
                        "title": "<div style='text-align:center;'>Nomor Polisi</div>",
                    },
                    {
                        "data": "nomor_stnk",
                        "title": "<div style='text-align:center;'>Nomor STNK</div>",
                    },
                    {
                        "data": "nomor_kir",
                        "title": "<div style='text-align:center;'>Nomor KIR</div>",
                    },
                    {
                        "data": "tahun_produksi",
                        "title": "<div style='text-align:center;'>Tahun Produksi</div>",
                    },
                    {
                        "data": null,
                        "title": "<div style='text-align:center;'>Aksi</div>",
                        "render": function(data, type, full, meta) {
                            var kendaraanId = full.id;
                            return '<div style="text-align:center;">' +
                                '<button class="btn btn-primary btn-circle ubah-button" data-user-id="' +
                                kendaraanId + '"><i class="fas fa-edit"></i> Ubah</button> ' +
                                '<button class="btn btn-danger btn-circle hapus-button" data-user-id="' +
                                kendaraanId + '"><i class="fas fa-trash"></i> Hapus</button>';
                        }
                    },
                    // Tambahkan kolom lain sesuai kebutuhan
                ],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "fixedHeader": true,
                "scrollCollapse": true,
                "dom": 'Bfrtip',
                buttons: [{
                        extend: 'copy',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'colvis',
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        // Finisih DataTable

        // Start Auto Barcode
        $(document).ready(function() {
            // Fungsi untuk menghasilkan kode unik
            function generateUniqueCode() {
                // Di sini Anda dapat menghasilkan kode unik sesuai dengan kebutuhan Anda.
                // Contoh: Menggunakan timestamp dan random number sebagai kode unik.
                var timestamp = new Date().getTime();
                var randomNumber = Math.floor(Math.random() * 1000); // Ubah sesuai kebutuhan

                return timestamp + '-' + randomNumber;
            }

            // Isi input dengan kode unik saat dokumen siap
            var barcodeValue = generateUniqueCode();
            $('#brcd').val(barcodeValue);

            // Generate barcode dan tampilkan dalam elemen gambar
            JsBarcode("#barcodeImage", barcodeValue, {
                format: "CODE128", // Ganti format sesuai kebutuhan Anda
                displayValue: true // Menampilkan teks kode di sekitar barcode
            });

            // Dapatkan data URL dari elemen gambar
            const barcodeDataURL = document.getElementById("barcodeImage").toDataURL("image/png");

            // Set nilai atribut "src" pada elemen gambar dengan data URL
            document.getElementById("barcodeImage").src = barcodeDataURL;
        });
        // Finish Auto Barcode

        // Start Hapus-Button
        $(document).ready(function() {
            $('#example1').on('click', '.hapus-button', function() {
                var kendaraanId = $(this).data('user-id');
                console.log('Tombol "Hapus" diklik. kendaraanId:', kendaraanId);
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menghapus kendaraan ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('kendaraan.destroy', ['id' => ':kendaraanId']) }}"
                                .replace(
                                    ':kendaraanId', kendaraanId),
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(response) {
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
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: "Terjadi kesalahan: " + error,
                                });
                            }
                        });
                    }
                });
            });
        });
        // Finish Hapus-Button

        // Start Ubah-Button dengan fungsi simpan dan update
        $(document).ready(function() {
            // Event listener untuk tombol "Ubah"
            $('#example1').on('click', '.ubah-button', function() {
                var kendaraanId = $(this).data('user-id');

                // Lakukan permintaan AJAX untuk mendapatkan data pengguna berdasarkan kendaraanId
                $.ajax({
                    url: "{{ route('kendaraan.show', ':kendaraanId') }}".replace(':kendaraanId',
                        kendaraanId),
                    type: 'GET',
                    success: function(response) {
                        // Isi nilai-nilai form dengan data pengguna yang diterima
                        $('#user_id').val(response.id); // Set user_id untuk pembaruan data
                        $('#kndrid').val(response.kendaraan_id);
                        $('#npl').val(response.no_pol);
                        $('#nstnk').val(response.nomor_stnk);
                        $('#nkir').val(response.nomor_kir);
                        $('#tprid').val(response.transporter_id).trigger('change.select2');
                        $('#mblid').val(response.mobil_id).trigger('change.select2');
                        $('#thnpr').val(response.tahun_produksi);
                        $('#brcd').val(response.barcode);

                        // Generate barcode dan tampilkan dalam elemen gambar
                        JsBarcode("#barcodeImage", response.barcode, {
                            format: "CODE128", // Ganti format sesuai kebutuhan Anda
                            displayValue: true // Menampilkan teks kode di sekitar barcode
                        });

                        // Ganti ikon tombol collapseButton menjadi fas fa-minus
                        $('#collapseButton').find('i').removeClass('fas fa-plus').addClass(
                            'fas fa-minus');
                        // Tampilkan form
                        $('#kendaraanform').show();
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
            });

            // Tambahkan event listener untuk form dengan id "userform"
            $("#kndrid, #npl, #nstnk, #nkir, #tprid, #mblid, #thnpr, #brcd").keydown(function(event) {
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
                var user_id = $('#user_id').val(); // ID pengguna
                var kndrid = $('#kndrid').val();
                var npl = $('#npl').val();
                var nstnk = $('#nstnk').val();
                var nkir = $('#nkir').val();
                var tprid = $('#tprid').val();
                var mblid = $('#mblid').val();
                var thnpr = $('#thnpr').val();
                var brcd = $('#brcd').val();

                // Kirim permintaan AJAX untuk menyimpan atau mengupdate data pengguna
                $.ajax({
                    url: "{{ route('kendaraan.simpan') }}", // Rute untuk menyimpan atau mengupdate data
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "user_id": user_id,
                        "kndrid": kndrid,
                        "npl": npl,
                        "nstnk": nstnk,
                        "nkir": nkir,
                        "tprid": tprid,
                        "mblid": mblid,
                        "thnpr": thnpr,
                        "brcd": brcd,
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
                $('#kendaraanform')[0].reset();
                // Kosongkan nilai yang dipilih dalam combo box dengan Select2
                $('#tprid').val(null).trigger('change');
                $('#mblid').val(null).trigger('change');
                // Reset nilai input user_id menjadi kosong
                $('#user_id').val('');

                function generateUniqueCode() {
                    // Di sini Anda dapat menghasilkan kode unik sesuai dengan kebutuhan Anda.
                    // Contoh: Menggunakan timestamp dan random number sebagai kode unik.
                    var timestamp = new Date().getTime();
                    var randomNumber = Math.floor(Math.random() * 1000); // Ubah sesuai kebutuhan

                    return timestamp + '-' + randomNumber;
                }

                // Isi input dengan kode unik saat dokumen siap
                var barcodeValue = generateUniqueCode();
                $('#brcd').val(barcodeValue);

                // Generate barcode dan tampilkan dalam elemen gambar
                JsBarcode("#barcodeImage", barcodeValue, {
                    format: "CODE128", // Ganti format sesuai kebutuhan Anda
                    displayValue: true // Menampilkan teks kode di sekitar barcode
                });

                // Dapatkan data URL dari elemen gambar
                const barcodeDataURL = document.getElementById("barcodeImage").toDataURL("image/png");

                // Set nilai atribut "src" pada elemen gambar dengan data URL
                document.getElementById("barcodeImage").src = barcodeDataURL;
            });
        });
        // Start Ubah-Button dengan fungsi simpan dan update

        // Start Cetak Barcode
        document.getElementById("cetakBarcodeButton").addEventListener("click", function() {
            // Dapatkan user_id dari input hidden
            var userId = document.getElementById("user_id").value;

            // Periksa apakah user_id tidak kosong
            if (userId.trim() === '') {
                Swal.fire({
                    icon: 'error',
                    title: 'ID tidak ditemukan',
                    text: 'Silahkan klik ikon ubah.'
                });
                return; // Hentikan eksekusi jika user_id kosong
            }

            // Buat URL cetak barcode dengan user_id
            var url = "{{ route('kendaraan.cetak', ':userId') }}".replace(':userId', userId);

            // Buka halaman cetak barcode di tab baru
            window.open(url, '_blank');
        });

        // Start fitur Tambah
        document.addEventListener("DOMContentLoaded", function() {
            const collapseButton = document.getElementById("collapseButton");
            const formContainer = document.getElementById("kendaraanform");

            let isCollapsed = false;

            collapseButton.addEventListener("click", function() {
                isCollapsed = !isCollapsed;

                if (isCollapsed) {
                    // Ubah ikon menjadi minus
                    this.innerHTML = '<i class="fas fa-minus"></i>';
                    // Tampilkan form
                    formContainer.style.display = "block";
                } else {
                    // Ubah ikon menjadi plus
                    this.innerHTML = '<i class="fas fa-plus"></i>';
                    // Sembunyikan form
                    formContainer.style.display = "none";
                }
            });
        });
        // Finish Fitur Tambah
    </script>
@endsection
