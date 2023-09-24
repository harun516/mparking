<?php

namespace App\Http\Controllers;

use App\Models\mobil as mbl;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Logika atau data apa pun yang ingin Anda proses sebelum menampilkan view

        return view('mobil.index'); // Menampilkan view 'dashboard.index'
    }

    public function get(Request $request)
    {
        $mobils = mbl::all(); // Gantilah ini dengan query untuk mengambil data Anda
        return response()->json(['data' => $mobils]);
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
        try {
            // Validasi input jika diperlukan
            $validatedData = $request->validate([
                'mblid' => 'required',
                'nm' => 'required',
                'tns' => 'required',
                'kbk' => 'required',
            ]);

            // Proses penyimpanan data ke dalam database menggunakan model dengan alias
            $mobil = new mbl; // Menggunakan alias rl
            $mobil->mobil_id = $request->mblid;
            $mobil->nama = $request->nm;
            $mobil->tonase = $request->tns;
            $mobil->kubikasi = $request->kbk;
            $mobil->save();

            // Respon untuk AJAX (Anda dapat mengirim pesan JSON sebagai balasan)
            return response()->json(['message' => 'Data berhasil disimpan']);
        } catch (QueryException $e) {
            // Tangani kesalahan database
            return response()->json(['error' => 'Terjadi kesalahan pada database'], 500);
        } catch (\Exception $e) {
            // Tangani kesalahan umum lainnya
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mobil = mbl::find($id);
        return response()->json($mobil);
    }

    public function simpan(Request $request)
    {
        try {
            // Validasi input form
            $request->validate([
                'nama' => 'required|string|max:255',
                'mblid' => 'required|string|max:255',
                'tns' => 'required|string|max:255',
                'kbk' => 'required|string|max:255',
            ]);

            // Ambil data pengguna dari input form
            $mobilData = [
                'nama' => $request->input('nama'),
                'mobil_id' => $request->input('mblid'),
                'tonase' => $request->input('tns'),
                'kubikasi' => $request->input('kbk'),
            ];

            // Cek apakah ini adalah penyimpanan data baru atau pembaruan data pengguna
            if ($request->filled('user_id')) {
                // Jika ada user_id, ini adalah pembaruan data pengguna
                $mobil = mbl::findOrFail($request->input('user_id'));
                $mobil->update($mobilData);
                $message = 'Data mobil berhasil diperbarui!';
            } else {
                // Jika tidak ada user_id, ini adalah penyimpanan data baru
                mbl::create($mobilData);
                $message = 'Data mobil berhasil disimpan!';
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
        $mobil = mbl::find($id);

        // Periksa apakah pengguna ditemukan
        if (!$mobil) {
            return response()->json(['message' => 'Mobil tidak ditemukan'], 404);
        }

        // Hapus pengguna
        $mobil->delete();

        return response()->json(['message' => 'Mobil berhasil dihapus']);
    }
}
