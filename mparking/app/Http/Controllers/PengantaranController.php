<?php

namespace App\Http\Controllers;

use App\Models\pengantaran as pgn;
use Illuminate\Http\Request;

class PengantaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Logika atau data apa pun yang ingin Anda proses sebelum menampilkan view

        return view('pengantaran.index'); // Menampilkan view 'dashboard.index'
    }

    public function get(Request $request)
    {
        $pengantarans = pgn::all(); // Gantilah ini dengan query untuk mengambil data Anda
        return response()->json(['data' => $pengantarans]);
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
                'pgnid' => 'required',
                'nm' => 'required',
                'alm' => 'required',
                'ntlp' => 'required',
            ]);

            // Proses penyimpanan data ke dalam database menggunakan model dengan alias
            $pengantaran = new pgn; // Menggunakan alias rl
            $pengantaran->pengantaran_id = $request->pgnid;
            $pengantaran->nama = $request->nm;
            $pengantaran->alamat = $request->alm;
            $pengantaran->no_telp = $request->ntlp;
            $pengantaran->save();

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
        $pengantaran = pgn::find($id);
        return response()->json($pengantaran);
    }

    public function simpan(Request $request)
    {
        try {
            // Validasi input form
            $request->validate([
                'nm' => 'required|string|max:255',
                'pgnid' => 'required|string|max:255',
                'alm' => 'required|string|max:255',
                'ntlp' => 'required|string|max:255',
            ]);

            // Ambil data pengguna dari input form
            $pengantaranData = [
                'nama' => $request->input('nm'),
                'pengantaran_id' => $request->input('pgnid'),
                'alamat' => $request->input('alm'),
                'no_telp' => $request->input('ntlp'),
            ];

            // Cek apakah ini adalah penyimpanan data baru atau pembaruan data pengguna
            if ($request->filled('user_id')) {
                // Jika ada user_id, ini adalah pembaruan data pengguna
                $pengantaran = pgn::findOrFail($request->input('user_id'));
                $pengantaran->update($pengantaranData);
                $message = 'Data pengantaran berhasil diperbarui!';
            } else {
                // Jika tidak ada user_id, ini adalah penyimpanan data baru
                pgn::create($pengantaranData);
                $message = 'Data pengantaran berhasil disimpan!';
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
        $pengantaran = pgn::find($id);

        // Periksa apakah pengguna ditemukan
        if (!$pengantaran) {
            return response()->json(['message' => 'Pengantaran tidak ditemukan'], 404);
        }

        // Hapus pengguna
        $pengantaran->delete();

        return response()->json(['message' => 'Pengantaran berhasil dihapus']);
    }
}
