<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan as kndr;
use App\Models\mobil as mbl;
use App\Models\transporter as tpr;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // combobox
        $transporters = tpr::select('transporter_id', 'nama')->get();
        $mobils = mbl::select('mobil_id', 'nama')->get();

        return view('kendaraan.index', compact('transporters', 'mobils'));
    }

    public function get(Request $request)
    {
        // $kendaraans = kndr::all(); // Gantilah ini dengan query untuk mengambil data Anda
        // return response()->json(['data' => $kendaraans]);

        $kendaraans = kndr::with('transporter', 'mobil')->get();

        // Loop melalui pengguna dan tambahkan kolom "nama_role" berdasarkan ID peran
        foreach ($kendaraans as $kendaraan) {
            $nama_transporter = $kendaraan->transporter ? $kendaraan->transporter->nama : 'Tidak Diketahui';
            $kendaraan->nama_transporter = $nama_transporter;

            $nama_mobil = $kendaraan->mobil ? $kendaraan->mobil->nama : 'Tidak Diketahui';
            $kendaraan->nama_mobil = $nama_mobil;
        }

        return response()->json(['data' => $kendaraans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kendaraan = kndr::find($id);
        return response()->json($kendaraan);
    }

    public function simpan(Request $request)
    {
        try {
            // Validasi input form
            $request->validate([
                'kndrid' => 'required|string|max:255',
                'npl' => 'required|string|max:255',
                'nstnk' => 'required|string|max:255',
                'nkir' => 'required|string|max:255',
                'tprid' => 'required|string|max:255',
                'mblid' => 'required|string|max:255',
                'thnpr' => 'required|string|max:255',
                'brcd' => 'required|string|max:255',
            ]);

            // Ambil data pengguna dari input form
            $kendaraanData = [
                'kendaraan_id' => $request->input('kndrid'),
                'no_pol' => $request->input('npl'),
                'nomor_stnk' => $request->input('nstnk'),
                'nomor_kir' => $request->input('nkir'),
                'transporter_id' => $request->input('tprid'),
                'mobil_id' => $request->input('mblid'),
                'tahun_produksi' => $request->input('thnpr'),
                'barcode' => $request->input('brcd'),
            ];

            // Cek apakah ini adalah penyimpanan data baru atau pembaruan data pengguna
            if ($request->filled('user_id')) {
                // Jika ada user_id, ini adalah pembaruan data pengguna
                $kendaraan = kndr::findOrFail($request->input('user_id'));
                $kendaraan->update($kendaraanData);
                $message = 'Data kendaraan berhasil diperbarui!';
            } else {
                // Jika tidak ada user_id, ini adalah penyimpanan data baru
                kndr::create($kendaraanData);
                $message = 'Data kendaraan berhasil disimpan!';
            }

            return response()->json(['message' => $message]);
        } catch (\Exception $e) {
            // Tangani kesalahan
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Cari pengguna berdasarkan ID
        $kendaraan = kndr::find($id);

        // Periksa apakah pengguna ditemukan
        if (!$kendaraan) {
            return response()->json(['message' => 'Kendaraan tidak ditemukan'], 404);
        }

        // Hapus pengguna
        $kendaraan->delete();

        return response()->json(['message' => 'Kendaraan berhasil dihapus']);
    }
}
