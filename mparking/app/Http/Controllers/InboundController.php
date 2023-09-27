<?php

namespace App\Http\Controllers;

use App\Models\inbound as ibn;
use App\Models\Kendaraan as kndr;
use App\Models\pengantaran as pgn;
use Illuminate\Http\Request;

class InboundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexRegistrasi()
    {
        // combobox
        $pengantarans = pgn::select('pengantaran_id', 'nama')->get();
        return view('inbound.registrasi.index', compact('pengantarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mobilBarcode($barcode)
    {
        $registrasiIbn = kndr::where('barcode', $barcode)->first();

        // Cek jika data ditemukan
        if ($registrasiIbn) {
            // Data ditemukan, ambil nama mobil dan transporter
            $mobilName = $registrasiIbn->mobil->nama;
            $transporterName = $registrasiIbn->transporter->nama;
        } else {
            // Data tidak ditemukan, atur nilai default
            $mobilName = "Data Tidak Ditemukan";
            $transporterName = "Data Tidak Ditemukan";
        }

        return response()->json([
            'mobil_id' => $registrasiIbn->mobil_id,
            'transporter_id' => $registrasiIbn->transporter_id,
            'mobilName' => $mobilName,
            'transporterName' => $transporterName,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function simpan(Request $request)
    {
        try {
            // Validasi input form
            $request->validate([
                'brcd' => 'required|string|max:255',
                'sprnm' => 'required|string|max:255',
                'nktp' => 'required|string|max:255',
                'nvks' => 'required|string|max:255',
                'note' => 'required|string|max:255',
                'rgsby' => 'required|string|max:255',
            ]);

            // Mendapatkan nilai dari request
            $simChecked = $request->input('sim') === 'ya' ? 1 : 0;
            $stnkChecked = $request->input('stnk') === 'ya' ? 1 : 0;
            $kirChecked = $request->input('kir') === 'ya' ? 1 : 0;
            $tdkbrshChecked = $request->input('tdkbrsh') === 'ya' ? 1 : 0;
            $brshChecked = $request->input('brsh') === 'ya' ? 1 : 0;
            $bcrChecked = $request->input('bcr') === 'ya' ? 1 : 0;
            $tdkbcrChecked = $request->input('tdkbcr') === 'ya' ? 1 : 0;
            $bauChecked = $request->input('bau') === 'ya' ? 1 : 0;
            $tidakbauChecked = $request->input('tidakbau') === 'ya' ? 1 : 0;

            // Ambil data pengguna dari input form
            $registrasiIbData = [
                'barcode' => $request->input('brcd'),
                'checkout_id' => $request->input('mblnm'),
                'kode_parkir' => $request->input('tprnm'),
                'driver_nama' => $request->input('sprnm'),
                'driver_ktp' => $request->input('nktp'),
                'driver_vaksin' => $request->input('nvks'),
                'no_refrensi' => $request->input('thnpr'),
                'sim' => $simChecked,
                'stnk' => $stnkChecked,
                'kir' => $kirChecked,
                'bersih' => $brshChecked,
                'bocor' => $bcrChecked,
                'bau' => $bauChecked,
                'status' => "Registrasi Mobil",
                'note' => $request->input('note'),
                'register_by' => $request->input('rgsby'),
            ];

            // Cek apakah ini adalah penyimpanan data baru atau pembaruan data pengguna
            if ($request->filled('user_id')) {
                // Jika ada user_id, ini adalah pembaruan data pengguna
                $registrasiIbn = ibn::findOrFail($request->input('user_id'));
                $registrasiIbn->update($registrasiIbData);
                $message = 'Data registrasi mobil berhasil diperbarui!';
            } else {
                // Jika tidak ada user_id, ini adalah penyimpanan data baru
                ibn::create($registrasiIbData);
                $message = 'Data registrasi mobil berhasil disimpan!';
            }

            return response()->json(['message' => $message]);
        } catch (\Exception $e) {
            // Tangani kesalahan
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
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
