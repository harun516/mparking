<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mobil as mbl;

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
