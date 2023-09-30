<?php

namespace App\Http\Controllers;

use App\Models\inbound as ibn;
use App\Models\Kendaraan as kndr;
use App\Models\pengantaran as pgn;
use Carbon\Carbon;
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

    public function indexStartUnloading()
    {
        return view('inbound.start_unloading.index');
    }

    public function indexFinishUnloading()
    {

        return view('inbound.finish_unloading.index');
    }

    public function indexDocumentFinish()
    {
        return view('inbound.document_finish.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mobilBarcode($barcode)
    {
        $registrasiIbn = kndr::where('barcode', $barcode)->first();

        if (!$registrasiIbn) {
            return response()->json(['error' => 'Barcode tidak ditemukan'], 404);
        }

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

        return response()->json($response);
    }

    public function kodeparkir($kodeparkir)
    {
        $startunloadings = ibn::where('kode_parkir', $kodeparkir)->first();

        if (!$startunloadings) {
            return response()->json(['error' => 'Kode parkir tidak ditemukan'], 404);
        }

        // Ambil barcode dari data yang ditemukan
        $barcode = $startunloadings->barcode;

        // Cari kendaraan berdasarkan barcode
        $kendaraan = kndr::where('barcode', $barcode)->first();

        if (!$kendaraan) {
            return response()->json(['error' => 'No polisi tidak ditemukan'], 404);
        }

        return response()->json([
            'nrfp' => $startunloadings->no_referensi,
            'npls' => $kendaraan->no_pol, //kendaraan->no_pol
            'stts' => $startunloadings->status,
            'nmspr' => $startunloadings->driver_nama,
            'chcby' => $startunloadings->checker_by,
            'gtprs' => $startunloadings->gate,
        ]);

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function simpanStartUnloading(Request $request)
    {
        try {

            // Definisikan pesan validasi khusus
            $messages = [
                'stts.required' => 'Field status harus diisi.',
                'gtprs.required' => 'Field gate harus diisi.',
                'chcby.required' => 'Field checker_by harus diisi.',
            ];

            // Validasi input form
            $request->validate([
                'stts' => 'required|string|max:255',
                'gtprs' => 'required|string|max:255',
                'chcby' => 'required|string|max:255',
            ], $messages);

            // Ambil waktu saat ini dalam zona waktu WIB (GMT+7)
            $waktuStartUnloading = Carbon::now('Asia/Jakarta');

            // Ambil data pengguna dari input form
            $startunloadingbData = [
                'status' => "Start Unloading",
                'gate' => $request->input('gtprs'),
                'checker_by' => $request->input('chcby'),
                'waktu_start_unloading' => $waktuStartUnloading,
            ];

            // Ambil kode parkir dari input form
            $kodeParkir = $request->input('kdpkr');
            $startunloadings = ibn::where('kode_parkir', $kodeParkir)->first();

            if (!$startunloadings) {
                // Jika kode parkir tidak ditemukan, kirim pesan error
                return response()->json(['error' => 'Kode parkir tidak ditemukan'], 404);
            }

            $startunloadings->update($startunloadingbData);
            $message = 'Data start unloading berhasil diperbarui!';
            return response()->json(['message' => $message]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Tangani kesalahan validasi
            $errors = $e->validator->errors()->all();

            return response()->json(['error' => implode(' & ', $errors)], 422);
        } catch (\Exception $e) {
            // Tangani kesalahan lainnya
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function simpanFinishUnloading(Request $request)
    {
        try {

            // Ambil waktu saat ini dalam zona waktu WIB (GMT+7)
            $waktuStartUnloading = Carbon::now('Asia/Jakarta');

            // Ambil data pengguna dari input form
            $startunloadingbData = [
                'status' => "Finish Unloading",
                'waktu_finish_unloading' => $waktuStartUnloading,
            ];

            // Ambil kode parkir dari input form
            $kodeParkir = $request->input('kdpkr');
            $startunloadings = ibn::where('kode_parkir', $kodeParkir)->first();
            $startunloadings->update($startunloadingbData);
            $message = 'Data finish unloading berhasil diperbarui!';
            return response()->json(['message' => $message]);
        } catch (\Exception $e) {
            // Tangani kesalahan
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function simpanDocumentFinish(Request $request)
    {
        try {

            // Definisikan pesan validasi khusus
            $messages = [
                'grdc.required' => 'Field GR document harus diisi.',
                'dcby.required' => 'Field document by harus diisi.',
            ];

            // Validasi input form
            $request->validate([
                'grdc' => 'required|string|max:255',
                'dcby' => 'required|string|max:255',
            ], $messages);

            // Ambil waktu saat ini dalam zona waktu WIB (GMT+7)
            $waktuStartUnloading = Carbon::now('Asia/Jakarta');

            // Ambil data pengguna dari input form
            $startunloadingbData = [
                'status' => "Document Finish",
                'waktu_finish_document' => $waktuStartUnloading,
                'gr_cod' => $request->input('grdc'),
                'document_by' => $request->input('dcby'),
            ];

            // Ambil kode parkir dari input form
            $kodeParkir = $request->input('kdpkr');
            $startunloadings = ibn::where('kode_parkir', $kodeParkir)->first();
            $startunloadings->update($startunloadingbData);
            $message = 'Data simpan document berhasil diperbarui!';
            return response()->json(['message' => $message]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Tangani kesalahan validasi
            $errors = $e->validator->errors()->all();

            return response()->json(['error' => implode(' & ', $errors)], 422);
        } catch (\Exception $e) {
            // Tangani kesalahan lainnya
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function simpanRegistrasi(Request $request)
    {
        try {
            // Validasi input form
            $request->validate([
                'brcd' => 'required|string|max:255',
                'sprnm' => 'required|string|max:255',
                'nktp' => 'required|string|max:255',
                'nvks' => 'required|string|max:255',
                'nrfs' => 'required|string|max:255',
                'note' => 'required|string|max:255',
                'rgsby' => 'required|string|max:255',
            ]);

            // Mendapatkan nilai dari request
            $simChecked = $request->input('simChecked');
            $stnkChecked = $request->input('stnkChecked');
            $kirChecked = $request->input('kirChecked');

            $tdkbrshValue = $request->input('tdkbrshValue');
            $bauValue = $request->input('bauValue');
            $bcrValue = $request->input('bcrValue');

            $kdpkr = uniqid();
            // Ambil data pengguna dari input form
            $registrasiIbData = [
                'barcode' => $request->input('brcd'),
                'checkout_id' => "1",
                'kode_parkir' => $kdpkr,
                'driver_nama' => $request->input('sprnm'),
                'driver_ktp' => $request->input('nktp'),
                'driver_vaksin' => $request->input('nvks'),
                'no_referensi' => $request->input('nrfs'),
                'sim' => $simChecked,
                'stnk' => $stnkChecked,
                'kir' => $kirChecked,
                'tidak_bersih' => $tdkbrshValue,
                'bocor' => $bcrValue,
                'bau' => $bauValue,
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
