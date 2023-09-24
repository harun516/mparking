@extends('dashboard.master')
@section('content')
    <html>

    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Tambahkan link CSS dan JavaScript DataTables di sini -->
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
                        <h5 class="float-right">Tambah User</h5>
                    </div>
                    <form id="userform" style="display: none;">
                        <input type="hidden" id="user_id" name="user_id" value="" readonly>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nm">Nama</label>
                                <input type="text" class="form-control" id="nm" placeholder="Masukkan nama">
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control select2bs4" id="rlid" style="width: 100%;"
                                    data-placeholder="Pilih Role">
                                    <option> </option>
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
                </table>
            </div>
        </div>
    </body>

    </html>
    <script>
        // Start DataTable
        $(document).ready(function() {
            var table = $('#example1').DataTable({
                "ajax": "{{ route('user.get') }}",
                "columns": [{
                        "data": "nama_role",
                        "title": "<div style='text-align:center;'>Role ID</div>",
                    },
                    {
                        "data": "nama",
                        "title": "<div style='text-align:center;'>Nama</div>",
                    },
                    {
                        "data": "email",
                        "title": "<div style='text-align:center;'>Email</div>",
                    },
                    {
                        "data": "created_at",
                        "title": "<div style='text-align:center;'>Tanggal Registrasi</div>",
                    },
                    {
                        "data": null,
                        "title": "<div style='text-align:center;'>Aksi</div>",
                        "render": function(data, type, full, meta) {
                            var userId = full.id;
                            return '<div style="text-align:center;">' +
                                '<button class="btn btn-primary btn-circle ubah-button" data-user-id="' +
                                userId + '"><i class="fas fa-edit"></i> Ubah</button> ' +
                                '<button class="btn btn-danger btn-circle hapus-button" data-user-id="' +
                                userId + '"><i class="fas fa-trash"></i> Hapus</button>';
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
                var userId = $(this).data('user-id');

                // Lakukan permintaan AJAX untuk mendapatkan data pengguna berdasarkan userId
                $.ajax({
                    url: "{{ route('user.show', ':userId') }}".replace(':userId', userId),
                    type: 'GET',
                    success: function(response) {
                        // Isi nilai-nilai form dengan data pengguna yang diterima
                        $('#user_id').val(response.id); // Set user_id untuk pembaruan data
                        $('#nm').val(response.nama);
                        $('#rlid').val(response.role_id).trigger('change.select2');
                        $('#eml').val(response.email);
                        $('#ktsd').val(
                            ''
                        ); // Anda dapat mengosongkan kata sandi jika tidak ingin menampilkannya
                        // Ganti ikon tombol collapseButton menjadi fas fa-minus
                        $('#collapseButton').find('i').removeClass('fas fa-plus').addClass(
                            'fas fa-minus');
                        // Tampilkan form
                        $('#userform').show();
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
            $("#nm, #rlid, #eml, #ktsd").keydown(function(event) {
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
                var rlid = $('#rlid').val();
                var eml = $('#eml').val();
                var ktsd = $('#ktsd').val();

                // Kirim permintaan AJAX untuk menyimpan atau mengupdate data pengguna
                $.ajax({
                    url: "{{ route('user.simpan') }}", // Rute untuk menyimpan atau mengupdate data
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "user_id": user_id,
                        "nm": nama,
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
                $('#userform')[0].reset();

                // Kosongkan nilai yang dipilih dalam combo box dengan Select2
                $('#rlid').val(null).trigger('change');
            });
        });
        // Finisih Ubah-Button

        // Start SimpanData
        // $(document).ready(function() {
        //     // Tangkap form yang dikirim
        //     $("#userrform").submit(function(event) {
        //         event.preventDefault(); // Mencegah pengiriman formulir standar
        //         simpanData();
        //     });

        //     // Tambahkan event listener untuk input "Nama"
        //     $("#ktsd").keydown(function(event) {
        //         // Periksa jika tombol Enter (kode tombol 13) ditekan
        //         if (event.keyCode === 13) {
        //             event.preventDefault();
        //             simpanData();
        //         }
        //     });

        //     // Event handler untuk tombol "Simpan"
        //     $("#simpanData").click(function() {
        //         simpanData();
        //     });

        //     // Fungsi untuk menyimpan data
        //     function simpanData() {
        //         // Ambil nilai dari input
        //         var nm = $("#nm").val();
        //         var rlid = $("#rlid").val();
        //         var eml = $("#eml").val();
        //         var ktsd = $("#ktsd").val();

        //         // Kirim permintaan AJAX
        //         $.ajax({
        //             url: "{{ route('user.simpan') }}", // Gantilah dengan nama route yang sesuai
        //             type: "POST",
        //             data: {
        //                 "_token": "{{ csrf_token() }}",
        //                 "nm": nm,
        //                 "rlid": rlid,
        //                 "eml": eml,
        //                 "ktsd": ktsd,
        //             },
        //             success: function(response) {
        //                 // Tangani respons sukses
        //                 Swal.fire({
        //                     icon: 'success',
        //                     title: 'Sukses',
        //                     text: response.message,
        //                     timer: 2000, // Menampilkan notifikasi selama 2 detik
        //                     showConfirmButton: false // Tidak menampilkan tombol OK
        //                 }).then(function() {
        //                     // Arahkan pengguna ke halaman indeks setelah 2 detik
        //                     window.location.href = "{{ route('user.index') }}";
        //                 });
        //             },
        //             error: function(xhr, status, error) {
        //                 // Tangani kesalahan
        //                 Swal.fire({
        //                     icon: 'error',
        //                     title: 'Error',
        //                     text: "Terjadi kesalahan: " + error,
        //                 });
        //             }
        //         });
        //     }
        // });
        // Finish SimpanData

        // Start fitur Tambah
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
        // Finish Fitur Tambah
    </script>
@endsection
