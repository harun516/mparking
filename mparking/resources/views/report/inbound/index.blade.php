@extends('dashboard.master')
@section('content')
    <html>

    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <style>
        </style>
    </head>

    <body>
        <div class="card">
            <div class="card-header">
                <h3>Data Management Parking</h3>
            </div>

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
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
                "ajax": "{{ route('reportinbound.get') }}",
                "columns": [{
                        "data": "npl",
                        "title": "<div style='text-align:center;'>No. Polisi Kendaraan</div>",
                    },
                    {
                        "data": "mblnm",
                        "title": "<div style='text-align:center;'>Tipe Kendaraan</div>",
                    },
                    {
                        "data": "tprnm",
                        "title": "<div style='text-align:center;'>Nama Transporter</div>",
                    },
                    {
                        "data": "drnm",
                        "title": "<div style='text-align:center;'>Nama Supir</div>",
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
                        "data": "stts",
                        "title": "<div style='text-align:center;'>Status</div>",
                    },
                    {
                        "data": "nt",
                        "title": "<div style='text-align:center;'>Note</div>",
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
                        "data": "tsu",
                        "title": "<div style='text-align:center;'>Waktu Start Unloading</div>",
                        "render": function(data, type, row) {
                            // Format data datetime menjadi waktu (HH:MM:SS)
                            if (type === 'display' || type === 'filter') {
                                return new Date(data).toLocaleTimeString();
                            }
                            return data;
                        }
                    },
                    {
                        "data": "tfd",
                        "title": "<div style='text-align:center;'>Waktu Finish Document</div>",
                        "render": function(data, type, row) {
                            // Jika data null atau undefined, tampilkan "-"
                            if (data === null || typeof data === 'undefined') {
                                return '-';
                            }

                            // Format data datetime menjadi waktu (HH:MM:SS)
                            if (type === 'display' || type === 'filter') {
                                return new Date(data).toLocaleTimeString();
                            }
                            return data;
                        }
                    },
                    {
                        "data": "tco",
                        "title": "<div style='text-align:center;'>Waktu Keluar</div>",
                        "render": function(data, type, row) {
                            // Jika data null atau undefined, tampilkan "-"
                            if (data === null || typeof data === 'undefined') {
                                return '-';
                            }

                            // Format data datetime menjadi waktu (HH:MM:SS)
                            if (type === 'display' || type === 'filter') {
                                return new Date(data).toLocaleTimeString();
                            }
                            return data;
                        }
                    },
                    {
                        "data": "rgsby",
                        "title": "<div style='text-align:center;'>Registrasi By</div>",
                        "render": function(data, type, row) {
                            // Jika data null atau undefined, tampilkan "-"
                            if (data === null || typeof data === 'undefined') {
                                return '-';
                            }
                            return data;
                        }
                    },
                    {
                        "data": "chcrby",
                        "title": "<div style='text-align:center;'>Checker By</div>",
                        "render": function(data, type, row) {
                            // Jika data null atau undefined, tampilkan "-"
                            if (data === null || typeof data === 'undefined') {
                                return '-';
                            }
                            return data;
                        }
                    },
                    {
                        "data": "dcby",
                        "title": "<div style='text-align:center;'>Document By</div>",
                        "render": function(data, type, row) {
                            // Jika data null atau undefined, tampilkan "-"
                            if (data === null || typeof data === 'undefined') {
                                return '-';
                            }
                            return data;
                        }
                    },
                    {
                        "data": "chcby",
                        "title": "<div style='text-align:center;'>Checkout By</div>",
                        "render": function(data, type, row) {
                            // Jika data null atau undefined, tampilkan "-"
                            if (data === null || typeof data === 'undefined') {
                                return '-';
                            }
                            return data;
                        }
                    },
                ],
                "responsive": true,
                "lengthMenu": [50],
                "lengthChange": false,
                "autoWidth": false,
                "fixedHeader": true,
                "scrollCollapse": true,
                "sPaginationType": "full_numbers",
                "dom": 'Bfrtip',
                buttons: [{
                        extend: 'copy',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]
                        }
                    },
                    {
                        extend: 'colvis',
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]
                    }
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        // Finisih DataTable
    </script>
@endsection
