@extends('dashboard.master')
@section('content')
    <html>

    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <style>
        .dataTables th div {
            text-align: center;
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
                        <h5 class="float-right">Tambah Transporter</h5>
                    </div>
                    <form id="transporterform" style="display: none;">
                        <input type="hidden" id="user_id" name="user_id" value="" readonly>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="tprid">Transporter ID</label>
                                <input type="text" class="form-control" id="tprid"
                                    placeholder="Masukkan transporter">
                            </div>
                            <div class="form-group">
                                <label for="nm">Nama</label>
                                <input type="text" class="form-control" id="nm" placeholder="Masukkan nama">
                            </div>
                            <div class="form-group">
                                <label for="alm">Alamat</label>
                                <textarea class="form-control" id="alm" placeholder="Masukkan alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ntlp">No Telpon</label>
                                <input type="number" class="form-control" id="ntlp" placeholder="Masukkan no telpon">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" id="simpanData" class="btn btn-primary">
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
        <div class="card">
            <div class="card-header">
                <h3>Data Transporter</h3>
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
                "ajax": "{{ route('transporter.get') }}",
                "columns": [{
                        "data": "transporter_id",
                        "title": "<div style='text-align:center;'>Transporter ID</div>",
                    },
                    {
                        "data": "nama",
                        "title": "<div style='text-align:center;'>Nama</div>",
                    },
                    {
                        "data": "alamat",
                        "title": "<div style='text-align:center;'>Alamat</div>",
                    },
                    {
                        "data": "no_telp",
                        "title": "<div style='text-align:center;'>No Telp</div>",
                    },
                    {
                        "data": null,
                        "title": "<div style='text-align:center;'>Aksi</div>",
                        "render": function(data, type, full, meta) {
                            var transporterId = full.id;
                            return '<div style="text-align:center;">' +
                                '<button class="btn btn-primary btn-circle ubah-button" data-user-id="' +
                                transporterId + '"><i class="fas fa-edit"></i> Ubah</button> ' +
                                '<button class="btn btn-danger btn-circle hapus-button" data-user-id="' +
                                transporterId + '"><i class="fas fa-trash"></i> Hapus</button>';
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
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'colvis',
                        columns: [0, 1, 2, 3]
                    }
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        // Finisih DataTable

        // Start Hapus-Button
        $(document).ready(function() {
            $('#example1').on('click', '.hapus-button', function() {
                var transporterId = $(this).data('user-id');
                console.log('Tombol "Hapus" diklik. transporterId:', transporterId);
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menghapus transporter ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('transporter.destroy', ['id' => ':transporterId']) }}"
                                .replace(
                                    ':transporterId', transporterId),
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
                var transporterId = $(this).data('user-id');

                // Lakukan permintaan AJAX untuk mendapatkan data pengguna berdasarkan transporterId
                $.ajax({
                    url: "{{ route('transporter.show', ':transporterId') }}".replace(
                        ':transporterId', transporterId),
                    type: 'GET',
                    success: function(response) {
                        // Isi nilai-nilai form dengan data pengguna yang diterima
                        $('#user_id').val(response.id); // Set user_id untuk pembaruan data
                        $('#tprid').val(response.transporter_id);
                        $('#nm').val(response.nama);
                        $('#alm').val(response.alamat)
                        $('#ntlp').val(response.no_telp)

                        // Ganti ikon tombol collapseButton menjadi fas fa-minus
                        $('#collapseButton').find('i').removeClass('fas fa-plus').addClass(
                            'fas fa-minus');
                        // Tampilkan form
                        $('#transporterform').show();
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
            $("#nm, #tprid, #alm, #ntlp").keydown(function(event) {
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
                var nama = $('#nm').val();
                var tprid = $('#tprid').val();
                var alm = $('#alm').val();
                var ntlp = $('#ntlp').val();

                // Kirim permintaan AJAX untuk menyimpan atau mengupdate data pengguna
                $.ajax({
                    url: "{{ route('transporter.simpan') }}", // Rute untuk menyimpan atau mengupdate data
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "user_id": user_id,
                        "nm": nama,
                        "tprid": tprid,
                        "alm": alm,
                        "ntlp": ntlp,
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
                            window.location.href = "{{ route('dashboard.index') }}";
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
                $('#transporterform')[0].reset();
                // Reset nilai input user_id menjadi kosong
                $('#user_id').val('');

            });
        });
        // Finisih Ubah-Button dengan fungsi simpan dan update

        // Start fitur Tambah
        document.addEventListener("DOMContentLoaded", function() {
            const collapseButton = document.getElementById("collapseButton");
            const formContainer = document.getElementById("transporterform");

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
