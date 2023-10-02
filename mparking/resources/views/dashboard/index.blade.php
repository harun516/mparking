@extends('dashboard.master')
@section('content')
    <html>
        <head>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    </script>
@endsection
