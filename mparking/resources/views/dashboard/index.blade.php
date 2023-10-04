@extends('dashboard.master')
@section('content')
    <html>

    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

        <style>
            .btn-center {
                display: block;
                margin: 0 auto;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $inbound1 }}</h3>
                        <p>Inbound</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-sign-in-alt"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $outbound1 }}</h3>
                        <p>Outbound</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $rgsibn }}</h3>
                        <p>Registrasi Mobil Inbound</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-car nav-icon"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $stribn }}</h3>
                        <p>Start Unloading</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-truck-loading nav-icon"></i>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $fnsibn }}</h3>
                        <p>Finish Unloading</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-truck nav-icon"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $dcibn }}</h3>
                        <p>Document Finish Inbound</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shipping-fast nav-icon"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $rgsobn }}</h3>
                        <p>Registrasi Mobil Outbound</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-car nav-icon"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $strdcobn }}</h3>
                        <p>Start Document</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-alt nav-icon"></i>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $strpcobn }}</h3>
                        <p>Start Picking Process</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-truck nav-icon"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $strldobn }}</h3>
                        <p>Start Loading</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-truck-loading nav-icon"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $fnsdobn }}</h3>
                        <p>Finish Loading</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-check-circle nav-icon"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $dcobn }}</h3>
                        <p>Document Finish Outbound</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clipboard-check nav-icon"></i>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $inbound2 }}</h3>
                        <p>Checkout Inbound</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $outbound2 }}</h3>
                        <p>Checkout Outbound</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Data Management Parking</h3>
            </div>

            {{-- <div class="card-body">
                <div class="row align-items-end">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="transporter1">Transporter 1:</label>
                            <select class="form-control" id="transporter1">
                                <option value="">Semua Transporter</option>
                                <option value="Transporter1">Transporter 1</option>
                                <option value="Transporter2">Transporter 2</option>
                                <!-- Tambahkan opsi transporter lainnya sesuai kebutuhan -->
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="transporter2">Transporter 2:</label>
                            <select class="form-control" id="transporter2">
                                <option value="">Semua Transporter</option>
                                <option value="Transporter1">Transporter 1</option>
                                <option value="Transporter2">Transporter 2</option>
                                <!-- Tambahkan opsi transporter lainnya sesuai kebutuhan -->
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tanggal">Tanggal:</label>
                            <input type="text" class="form-control" id="tanggal" placeholder="Pilih tanggal">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <a href="{{ route('registrasimobil.index') }}" class="btn btn-success btn-block">
                            <i class="fas fa-plus"></i>
                            <span>Registrasi Mobil Inbound</span>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="{{ route('registrasimobilout.index') }}" class="btn btn-warning btn-block">
                            <i class="fas fa-plus"></i>
                            <span>Registrasi Mobil Outbound</span>
                        </a>
                    </div>
                </div>
            </div> --}}

            <div class="card-body">
                <div class="float-right">
                    <a href="{{ route('registrasimobil.index') }}" class="btn btn-success mr-2">
                        <i class="fas fa-plus"></i>
                        <span>Registrasi Mobil Inbound</span>
                    </a>
                    <a href="{{ route('registrasimobilout.index') }}" class="btn btn-warning">
                        <i class="fas fa-plus"></i>
                        <span>Registrasi Mobil Outbound</span>
                    </a>
                </div><br>

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    </thead>
                </table>
            </div>
        </div>

        {{-- Start Modal --}}
        <!-- Modal -->
        <div class="modal fade" id="modalInbound" tabindex="-1" role="dialog" aria-labelledby="modalInboundLabel"
            aria-hidden="true">
            <div class="modal-dialog role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lihatModalLabel">Detail Informasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <b>
                                    <p>Kode Parkir
                                </b> <br> <span id="kdpkr"></span></p>
                                <b>
                                    <p>Nomor Polisi
                                </b> <br> <span id="npl"></span></p>
                                <b>
                                    <p>Tipe Kendaraan
                                </b> <br> <span id="kndrnm"></span></p>
                                <b>
                                    <p>Tanggal Masuk
                                </b> <br> <span id="dtin"></span></p>
                                <b>
                                    <p>Jam Masuk
                                </b> <br> <span id="tmin"></span></p>
                                <b>
                                    <p>Transporter
                                </b> <br> <span id="tprnm"></span></p>
                                <b>
                                    <p>Nama Supir
                                </b> <br> <span id="drnm"></span></p>
                                <b>
                                    <p>STNK
                                </b> <br> <span id="nstnk"></span></p>
                                <b>
                                    <p>SIM
                                </b> <br> <span id="NSIM"></span></p>
                                <b>
                                    <p>KIR
                                </b> <br> <span id="nkir"></span></p>
                                <b>
                                    <p>Gate
                                </b> <br> <span id="gt"></span></p>
                                <b>
                                    <p>Status
                                </b> <br> <span id="stts"></span></p>
                                <b>
                                    <p>Catatan
                                </b> <br> <span id="nt"></span></p>
                            </div>
                            <div class="col-md-6">
                                <b>
                                    <p>Register By
                                </b> <br> <span id="rgsby"></span></p>
                                <b>
                                    <p>Waktu Start Unloading
                                </b> <br> <span id="tsu"></span></p>
                                <b>
                                    <p>Waktu Finish Unloading
                                </b> <br> <span id="tfu"></span></p>
                                <b>
                                    <p>Waktu Finish Document
                                </b> <br> <span id="tfd"></span></p>
                                <b>
                                    <p>Waktu Keluar
                                </b> <br> <span id="tco"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-success btn-center" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalOutbound" tabindex="-1" role="dialog" aria-labelledby="modalOutboundLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lihatModalLabel">Detail Informasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <b>
                                    <p>Kode Parkir
                                </b> <br> <span id="kdpkrobn"></span></p>
                                <b>
                                    <p>Nomor Polisi
                                </b> <br> <span id="nplobn"></span></p>
                                <b>
                                    <p>Tipe Kendaraan
                                </b> <br> <span id="kndrnmobn"></span></p>
                                <b>
                                    <p>Tanggal Masuk
                                </b> <br> <span id="dtinobn"></span></p>
                                <b>
                                    <p>Jam Masuk
                                </b> <br> <span id="tminobn"></span></p>
                                <b>
                                    <p>Transporter
                                </b> <br> <span id="tprnmobn"></span></p>
                                <b>
                                    <p>Nama Supir
                                </b> <br> <span id="drnmobn"></span></p>
                                <b>
                                    <p>STNK
                                </b> <br> <span id="nstnkobn"></span></p>
                                <b>
                                    <p>SIM
                                </b> <br> <span id="nsimobn"></span></p>
                                <b>
                                    <p>KIR
                                </b> <br> <span id="nkirobn"></span></p>
                                <b>
                                    <p>Gate
                                </b> <br> <span id="gtobn"></span></p>
                                <b>
                                    <p>Status
                                </b> <br> <span id="sttsobn"></span></p>
                                <b>
                                    <p>Catatan
                                </b> <br> <span id="ntobn"></span></p>
                            </div>
                            <div class="col-md-6">
                                <b>
                                    <p>Register By
                                </b> <br> <span id="rgsbyobn"></span></p>
                                <b>
                                    <p>Waktu Start Document
                                </b> <br> <span id="tsdobn"></span></p>
                                <b>
                                    <p>Waktu Start Picking
                                </b> <br> <span id="tspobn"></span></p>
                                <b>
                                    <p>Picking By
                                </b> <br> <span id="pcbyobn"></span></p>
                                <b>
                                    <p>Waktu Start Loading
                                </b> <br> <span id="tslobn"></span></p>
                                <b>
                                    <p>Loading By
                                </b> <br> <span id="ldbyobn"></span></p>
                                <b>
                                    <p>Waktu Finish Loading
                                </b> <br> <span id="tflobn"></span></p>
                                <b>
                                    <p>Waktu Finish Document
                                </b> <br> <span id="tfdobn"></span></p>
                                <b>
                                    <p>Waktu Keluar
                                </b> <br> <span id="tco"obn></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-center" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Finish Modal --}}
    </body>

    </html>
    <script>
        // Start DataTable
        $(document).ready(function() {
            var table = $('#example1').DataTable({
                "ajax": "{{ route('dashboard.get') }}",
                "columns": [{
                        "data": "brcd",
                        "title": "<div style='text-align:center;'>Barcode</div>",
                    },
                    {
                        "data": "stts",
                        "title": "<div style='text-align:center;'>Status</div>",
                    },
                    {
                        "data": "kdpkr",
                        "title": "<div style='text-align:center;'>Kode Parkir</div>",
                    },
                    {
                        "data": "date",
                        "title": "<div style='text-align:center;'>Tanggal Masuk</div>",
                        "render": function(data, type, row) {
                            // Format data datetime menjadi tanggal (YYYY-MM-DD)
                            if (type === 'display' || type === 'filter') {
                                return new Date(data).toLocaleDateString();
                            }
                            return data;
                        }
                    },
                    {
                        "data": "time",
                        "title": "<div style='text-align:center;'>Jam Masuk</div>",
                        "render": function(data, type, row) {
                            // Format data datetime menjadi waktu (HH:MM:SS)
                            if (type === 'display' || type === 'filter') {
                                return new Date(data).toLocaleTimeString();
                            }
                            return data;
                        }
                    },
                    {
                        "data": "tprnm",
                        "title": "<div style='text-align:center;'>Nama Transporter</div>",
                    },
                    {
                        "data": "mblnm",
                        "title": "<div style='text-align:center;'>Tipe Kendaraan</div>",
                    },
                    {
                        "data": "drnm",
                        "title": "<div style='text-align:center;'>Nama Supir</div>",
                    },
                    {
                        "data": "npl",
                        "title": "<div style='text-align:center;'>No. Polisi Kendaraan</div>",
                    },
                    {
                        "data": "nstnk",
                        "title": "<div style='text-align:center;'>STNK</div>",
                    },
                    {
                        "data": "nsim",
                        "title": "<div style='text-align:center;'>SIM</div>",
                    },
                    {
                        "data": "nkir",
                        "title": "<div style='text-align:center;'>KIR</div>",
                    },
                    {
                        "data": "gt",
                        "title": "<div style='text-align:center;'>Gate Process</div>",
                    },
                    {
                        "data": "nt",
                        "title": "<div style='text-align:center;'>Note</div>",
                    },
                    {
                        "data": null,
                        "title": "<div style='text-align:center;'>Aksi</div>",
                        "render": function(data, type, full, meta) {
                            var kendaraanId = full.kdpkr;
                            return '<div style="text-align:center;">' +
                                '<button class="btn btn-primary btn-circle lihat-button" data-user-id="' +
                                kendaraanId + '"><i class="fas fa-eye"></i> Lihat</button> ' +
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
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]
                        }
                    },
                    {
                        extend: 'colvis',
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]
                    }
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        // Finisih DataTable

        // Start Hapus-Button
        $(document).ready(function() {
            $('#example1').on('click', '.hapus-button', function() {
                var kendaraanId = $(this).data('user-id');
                console.log('Tombol "Hapus" diklik. kendaraanId:', kendaraanId);
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menghapus transaksi ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('transaksi.destroy', ['kode_parkir' => ':kendaraanId']) }}"
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

        // Start Lihat-Button
        $(document).ready(function() {
            // Tangani klik tombol "Lihat" untuk menampilkan data modal
            $('#example1').on('click', '.lihat-button', function() {
                var kendaraanId = $(this).data('user-id');

                // Lakukan permintaan AJAX untuk mengambil data kendaraan berdasarkan kendaraanId
                $.ajax({
                    url: "{{ route('transaksi.lihat', ['kode_parkir' => ':kendaraanId']) }}"
                        .replace(':kendaraanId', kendaraanId),
                    method: 'GET',
                    success: function(response) {
                        if (response.table === 'inbound') {
                            // Tampilkan modal untuk tabel inbound
                            $('#modalInbound').modal('show');
                            // Isi data modal dengan hasil dari permintaan AJAX
                            $('#kdpkr').text(response.kdpkr);
                            $('#npl').text(response.npl);
                            $('#kndrnm').text(response.kndrnm);
                            $('#dtin').text(response.dtin);
                            $('#tmin').text(response.tmin);
                            $('#tprnm').text(response.tprnm);
                            $('#drnm').text(response.drnm);
                            $('#nstnk').text(response.nstnk);
                            $('#nsim').text(response.nsim);
                            $('#nkir').text(response.nkir);
                            $('#gt').text(response.gt);
                            $('#stts').text(response.stts);
                            $('#nt').text(response.nt);
                            $('#rgsby').text(response.rgsby);
                            $('#tsu').text(response.tsu);
                            $('#tfu').text(response.tfu);
                            $('#tfd').text(response.tfd);
                            $('#tco').text(response.tco);

                        } else if (response.table === 'outbound') {
                            // Tampilkan modal untuk tabel outbound
                            $('#modalOutbound').modal('show');
                            // Isi data modal dengan hasil dari permintaan AJAX
                            $('#kdpkrobn').text(response.kdpkrobn);
                            $('#nplobn').text(response.nplobn);
                            $('#kndrnmobn').text(response.kndrnmobn);
                            $('#dtinobn').text(response.dtinobn);
                            $('#tminobn').text(response.tminobn);
                            $('#tprnmobn').text(response.tprnmobn);
                            $('#drnmobn').text(response.drnmobn);
                            $('#nstnkobn').text(response.nstnkobn);
                            $('#nkirobn').text(response.nkirobn);
                            $('#gtobn').text(response.gtobn);
                            $('#sttsobn').text(response.sttsobn);
                            $('#ntobn').text(response.ntobn);
                            $('#rgsbyobn').text(response.rgsbyobn);
                            $('#tsdobn').text(response.tsdobn);
                            $('#tspobn').text(response.tspobn);
                            $('#pcbyobn').text(response.pcbyobn);
                            $('#tslobn').text(response.tslobn);
                            $('#ldbyobn').text(response.ldbyobn);
                            $('#tflobn').text(response.tflobn);
                            $('#tfdobn').text(response.tfdobn);
                            $('#tcoobn').text(response.tcoobn);
                        }
                    },
                    error: function() {
                        // Tampilkan Sweet Alert dengan pesan error
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi kesalahan saat mengambil data kendaraan.',
                        });
                    }
                });
            });
        });
        // Finish Lihat-Button
    </script>
@endsection
