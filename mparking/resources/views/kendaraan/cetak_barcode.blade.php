<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Data Kendaraan</title>
    <style>
        body {
            text-align: center;
        }

        h3 {
            margin-top: 20px;
        }

        hr {
            border-top: 2px dashed #000;
            width: 80%;
        }

        /* Gaya khusus untuk mencetak */
        @media print {

            /* Mengatur lebar gambar barcode agar responsif */
            #barcode {
                max-width: 100%;
                height: auto;
            }

            /* Mengatur teks agar responsif dan cetak dalam satu halaman */
            p {
                page-break-inside: avoid;
            }

            /* Mengatur tombol cetak agar tidak tercetak */
            #printButton {
                display: none;
            }
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.5/JsBarcode.all.min.js"
        integrity="sha512-QEAheCz+x/VkKtxeGoDq6nsGyzTx/0LMINTgQjqZ0h3+NjP+bCsPYz3hn0HnBkGmkIFSr7QcEZT+KyEM7lbLPQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <center>
        <h3>Form Data Kendaraan</h3>
    </center>
    ===========================
    <br>
    <!-- Tampilkan gambar barcode di sini -->
    <svg id="barcode" alt="Barcode"></svg>
    <br>
    ===========================
    <br>
    <p>Nama Transporter: {{ $kendaraan->transporter->nama }}</p>
    <p>Nama Kendaraan: {{ $kendaraan->mobil->nama }}</p>
    <p>Nomor Polisi: {{ $kendaraan->no_pol }}</p>
    <center>Harap dicetak dan dilaminating agar tidak mudah rusak</center>
    <br>
    <!-- Tombol untuk mencetak -->
    <button id="printButton">Cetak</button>
</body>

</html>
<script>
    // Event listener untuk tombol "Cetak"
    document.getElementById("printButton").addEventListener("click", function() {
        // Cek apakah data telah disimpan (misalnya, ada nilai di dalam variabel "dataTersimpan")
        var dataTersimpan = true; // Ganti dengan logika Anda untuk memeriksa penyimpanan data

        if (dataTersimpan) {
            // Sembunyikan tombol cetak
            document.getElementById("printButton").style.display = "none";

            // Cetak halaman
            window.print();
        } else {
            // Tampilkan notifikasi bahwa data harus disimpan terlebih dahulu
            alert("Data harus disimpan terlebih dahulu sebelum mencetak dan klik ubah.");
        }
    });

     // Me-refresh halaman kendaraan.index setelah 3 detik
     setTimeout(function() {
        window.opener.location.href = "{{ route('kendaraan.index') }}";
    }, 1000); // Ganti 3000 dengan jumlah milidetik yang Anda inginkan

    // Dapatkan data barcode dari variabel Blade
    var barcodeData = "{{ $kendaraan->barcode }}"; // Ganti dengan data barcode yang sesuai

    // Generate barcode dan tampilkan pada elemen dengan id "barcode"
    JsBarcode("#barcode", barcodeData, {
        format: "CODE128", // Ganti format sesuai dengan kode barcode yang Anda miliki
        displayValue: true // Menampilkan teks kode di sekitar barcode
    });
</script>
