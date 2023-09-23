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
                'rlid' => 'required',
                'nm' => 'required',
            ]);

            // Proses penyimpanan data ke dalam database menggunakan model dengan alias
            $role = new rl; // Menggunakan alias rl
            $role->role_id = $request->rlid;
            $role->nama = $request->nm;
            $role->save();

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
        //
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
        //
    }
}
