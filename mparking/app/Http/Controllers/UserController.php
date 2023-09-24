<?php

namespace App\Http\Controllers;

use App\Models\role as rl;
use App\Models\user as usr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // combobox
        $roles = rl::select('role_id', 'nama')->get();

        return view('user.index', compact('roles'));

    }

    public function get(Request $request)
    {
        // $users = usr::all(); // Gantilah ini dengan query untuk mengambil data Anda
        // return response()->json(['data' => $users]);

        $users = usr::with('role')->get();

        // Loop melalui pengguna dan tambahkan kolom "nama_role" berdasarkan ID peran
        foreach ($users as $user) {
            $nama_role = $user->role ? $user->role->nama : 'Tidak Diketahui';
            $user->nama_role = $nama_role;
        }

        return response()->json(['data' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        //         'eml' => 'required',
        //         'ktsd' => 'required',
        //     ]);

        //     // Proses penyimpanan data ke dalam database menggunakan model dengan alias
        //     $user = new usr; // Menggunakan alias
        //     $user->nama = $request->nm;
        //     $user->role_id = $request->rlid;
        //     $user->email = $request->eml;
        //     // Hashing password sebelum menyimpannya
        //     $user->password = Hash::make($request->ktsd);
        //     $user->save();

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
        $user = usr::find($id);
        return response()->json($user);
    }

    public function simpan(Request $request)
    {
        try {
            // Validasi input form
            $request->validate([
                'nm' => 'required|string|max:255',
                'rlid' => 'required|string|max:255', 
                'eml' => 'required|email|unique:users,email,' . $request->input('user_id'),
                'ktsd' => 'nullable|string|min:6',
            ]);
    
            // Ambil data pengguna dari input form
            $userData = [
                'nama' => $request->input('nm'),
                'role_id' => $request->input('rlid'),
                'email' => $request->input('eml'),
            ];
    
            // Jika ada kata sandi baru, hash kata sandi tersebut dan tambahkan ke data pengguna
            if ($request->filled('ktsd')) {
                $userData['password'] = Hash::make($request->input('ktsd'));
            }
    
            // Cek apakah ini adalah penyimpanan data baru atau pembaruan data pengguna
            if ($request->filled('user_id')) {
                // Jika ada user_id, ini adalah pembaruan data pengguna
                $user = usr::findOrFail($request->input('user_id'));
                $user->update($userData);
                $message = 'Data pengguna berhasil diperbarui!';
            } else {
                // Jika tidak ada user_id, ini adalah penyimpanan data baru
                usr::create($userData);
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
        $user = usr::find($id);

        // Periksa apakah pengguna ditemukan
        if (!$user) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
        }

        // Hapus pengguna
        $user->delete();

        return response()->json(['message' => 'Pengguna berhasil dihapus']);
    }
}
