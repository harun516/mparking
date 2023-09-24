<?php

namespace App\Http\Controllers;

use App\Models\Role as rl;
// Import model Role dengan alias rl
use Illuminate\Http\Request;

// Import QueryException untuk menangani kesalahan database

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Logika atau data apa pun yang ingin Anda proses sebelum menampilkan view

        return view('role.index'); // Menampilkan view 'dashboard.index'
    }

    public function get(Request $request)
    {
        $roles = rl::all(); // Gantilah ini dengan query untuk mengambil data Anda
        return response()->json(['data' => $roles]);
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
        // try {
        //     // Validasi input jika diperlukan
        //     $validatedData = $request->validate([
        //         'rlid' => 'required',
        //         'nm' => 'required',
        //     ]);

        //     // Proses penyimpanan data ke dalam database menggunakan model dengan alias
        //     $role = new rl; // Menggunakan alias rl
        //     $role->role_id = $request->rlid;
        //     $role->nama = $request->nm;
        //     $role->save();

        //     // Respon untuk AJAX (Anda dapat mengirim pesan JSON sebagai balasan)
        //     return response()->json(['message' => 'Data berhasil disimpan']);
        // } catch (QueryException $e) {
        //     // Tangani kesalahan database
        //     return response()->json(['error' => 'Terjadi kesalahan pada database'], 500);
        // } catch (\Exception $e) {
        //     // Tangani kesalahan umum lainnya
        //     return response()->json(['error' => $e->getMessage()], 500);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = rl::find($id);
        return response()->json($role);
    }

    public function simpan(Request $request)
    {
        try {
            // Validasi input form
            $request->validate([
                'nm' => 'required|string|max:255',
                'rlid' => 'required|string|max:255',
            ]);

            // Ambil data pengguna dari input form
            $roleData = [
                'nama' => $request->input('nm'),
                'role_id' => $request->input('rlid'),
            ];

            // Cek apakah ini adalah penyimpanan data baru atau pembaruan data pengguna
            if ($request->filled('user_id')) {
                // Jika ada user_id, ini adalah pembaruan data pengguna
                $role = rl::findOrFail($request->input('user_id'));
                $role->update($roleData);
                $message = 'Data pengguna berhasil diperbarui!';
            } else {
                // Jika tidak ada user_id, ini adalah penyimpanan data baru
                rl::create($roleData);
                $message = 'Data pengguna berhasil disimpan!';
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
        $role = rl::find($id);

        // Periksa apakah pengguna ditemukan
        if (!$role) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
        }

        // Hapus pengguna
        $role->delete();

        return response()->json(['message' => 'Pengguna berhasil dihapus']);
    }
}
