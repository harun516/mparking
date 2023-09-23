@extends('dashboard.master')
@section('content')
    <html>

    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Tambahkan link CSS dan JavaScript DataTables di sini -->
    </head>

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
                        <h5 class="float-right">Tambah User</h5>
                    </div>
                    <form id="userform" style="display: none;">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nm">Nama</label>
                                <input type="text" class="form-control" id="nm" placeholder="Masukkan nama">
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control select2bs4" id="rlid" style="width: 100%;"
                                    data-placeholder="Pilih Role">
                                    <option></option>
                                    @foreach ($roles as $role)
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
                            <button type="button" id="simpanData" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>Data User</h3>
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
                    {{-- <tbody>
                        <tr>
                            <td>Trident</td>
                            <td>Internet
                                Explorer 4.0
                            </td>
                            <td>Win 95+</td>
                            <td> 4</td>
                            <td>X</td>
                        </tr>
                        <tr>
                            <td>Trident</td>
                            <td>Internet
                                Explorer 5.0
                            </td>
                            <td>Win 95+</td>
                            <td>5</td>
                            <td>C</td>
                        </tr>
                        <tr>
                            <td>Trident</td>
                            <td>Internet
                                Explorer 5.5
                            </td>
                            <td>Win 95+</td>
                            <td>5.5</td>
                            <td>A</td>
                        </tr>
                        <tr>
                            <td>Trident</td>
                            <td>Internet
                                Explorer 6
                            </td>
                            <td>Win 98+</td>
                            <td>6</td>
                            <td>A</td>
                        </tr>
                        <tr>
                            <td>Trident</td>
                            <td>Internet Explorer 7</td>
                            <td>Win XP SP2+</td>
                            <td>7</td>
                            <td>A</td>
                        </tr>
                    </tbody> --}}
                </table>
            </div>
        </div>
    </body>

    </html>
    <script>
        // DataTable
        $(document).ready(function() {
            var table = $('#example1').DataTable({
                "ajax": "{{ route('user.get') }}",
                "columns": [{
                        "data": "nama_role",
                        "title": "Role ID"
                    },
                    {
                        "data": "nama",
                        "title": "Nama"
                    },
                    {
                        "data": "email",
                        "title": "Email"
                    },
                    {
                        "data": "created_at",
                        "title": "Dibuat Tanggal"
                    },
                    {
                        "data": null,
                        "title": "Aksi",
                        "render": function(data, type, full, meta) {
                            var userId = full.id;
                            return '<button class="btn btn-success btn-circle"><i class="fas fa-eye"></i> Lihat</button> ' +
                                '<button class="btn btn-primary btn-circle"><i class="fas fa-edit"></i> Ubah</button> ' +
                                '<button class="btn btn-danger btn-circle hapus-button" data-user-id="' +
                                userId + '"><i class="fas fa-trash"></i> Hapus</button>';
                        }
                    },
                    // Tambahkan kolom lain sesuai kebutuhan
                ],
                "fixedHeader": true,
                "scrollY": "500px",
                "scrollCollapse": true,
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
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

        // Event listener untuk tombol "Hapus"
        $(document).ready(function() {
            $('#example1').on('click', '.hapus-button', function() {
                var userId = $(this).data('user-id');
                console.log('Tombol "Hapus" diklik. userId:', userId);
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menghapus pengguna ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('user.destroy', ['id' => ':userId']) }}".replace(
                                ':userId', userId),
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
                                    // Hapus baris data dari tabel setelah penghapusan berhasil
                                    $('#example1').DataTable().row($("#user-" +
                                        userId)).remove().draw(false);
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


        // simpanData
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

            // Event handler untuk tombol "Simpan"
            $("#simpanData").click(function() {
                simpanData();
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

        // fiturtambah
        document.addEventListener("DOMContentLoaded", function() {
            const collapseButton = document.getElementById("collapseButton");
            const formContainer = document.getElementById("userform");

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
    </script>
@endsection
