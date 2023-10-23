<?php

namespace App\Http\Controllers;

use App\Models\kendaraan as kndr;
use App\Models\outbound as obn;
use App\Models\mobil as mbl;
use App\Models\transporter as tpr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OutboundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexRegistrasi()
    {
        return view('outbound.registrasi.index');
    }

    public function indexStartDocument()
    {
        return view('outbound.start_document.index');
    }

    public function indexStartPickingProcess()
    {
        return view('outbound.start_picking_process.index');
    }

    public function indexStartLoading()
    {
        return view('outbound.start_loading.index');
    }

    public function indexFinishLoading()
    {
        return view('outbound.finish_loading.index');
    }

    public function indexDocumentFinishOut()
    {
        return view('outbound.document_finish.index');
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
        $kodeparkirs = obn::where('kode_parkir', $kodeparkir)->first();

        if (!$kodeparkirs) {
            return response()->json(['error' => 'Kode parkir tidak ditemukan'], 404);
        }

        // Ambil barcode dari data yang ditemukan
        $barcode = $kodeparkirs->barcode;

        // Cari kendaraan berdasarkan barcode
        $kendaraan = kndr::where('barcode', $barcode)->first();

        // Ambil mobil_id dari data yang ditemukan
        $mbl_id = $kendaraan->mobil_id;
        
        // Cari mobil berdasarkan mobil_id
        $mobil = mbl::where('mobil_id', $mbl_id)->first();

        // Ambil transporter_id dari data yang ditemukan
        $tpr_id = $kendaraan->transporter_id;
        
        // Cari transporter berdasarkan transporter_id
        $transporter = tpr::where('transporter_id', $tpr_id)->first();

        if (!$kendaraan) {
            return response()->json(['error' => 'No polisi tidak ditemukan'], 404);
        }

        return response()->json([
            'nrfp' => $kodeparkirs->no_referensi,
            'npls' => $kendaraan->no_pol,
            'nmspr' => $kodeparkirs->driver_nama,
            'kndrid' => $mobil->nama,
            'tprid' => $transporter->nama,
            'stts' => $kodeparkirs->status,
            'gtprs' => $kodeparkirs->gate,
            'pcby' => $kodeparkirs->picking_by,
            'ldby' => $kodeparkirs->loading_by,
            'bdlid' => $kodeparkirs->bundle_id,
            'nodo' => $kodeparkirs->no_do,
        ]);

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function simpanRegistrasi(Request $request)
    {
        try {
            // Validasi input form
            $request->validate([
                'brcd' => 'required|string|max:255',
                'sprnm' => 'required|string|max:255',
                'nktp' => 'required|string|max:255',
                'nvks' => 'required|string|max:255',
                'nrfsi' => 'required|string|max:255',
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
                'no_referensi' => $request->input('nrfsi'),
                'sim' => $simChecked,
                'stnk' => $stnkChecked,
                'kir' => $kirChecked,
                'tidak_bersih' => $tdkbrshValue,
                'bocor' => $bcrValue,
                'bau' => $bauValue,
                'status' => "Registrasi Mobil - Outbound",
                'note' => $request->input('note'),
                'register_by' => $request->input('rgsby'),
            ];

            // Cek apakah ini adalah penyimpanan data baru atau pembaruan data pengguna
            if ($request->filled('user_id')) {
                // Jika ada user_id, ini adalah pembaruan data pengguna
                $registrasiIbn = obn::findOrFail($request->input('user_id'));
                $registrasiIbn->update($registrasiIbData);
                $message = 'Data registrasi mobil berhasil diperbarui!';
            } else {
                // Jika tidak ada user_id, ini adalah penyimpanan data baru
                obn::create($registrasiIbData);
                $message = 'Data registrasi mobil berhasil disimpan!';
            }

            return response()->json(['message' => $message]);
        } catch (\Exception $e) {
            // Tangani kesalahan
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function simpanStartDocument(Request $request)
    {
        try {

            // Definisikan pesan validasi khusus
            $messages = [
                'bdlid.required' => 'Field bundle id harus diisi.',
                'nodo.required' => 'Field no do harus diisi.',
            ];

            // Validasi input form
            $request->validate([
                'bdlid' => 'required|string|max:255',
                'nodo' => 'required|string|max:255',
            ], $messages);

            // Ambil waktu saat ini dalam zona waktu WIB (GMT+7)
            $waktuStartDocument = Carbon::now('Asia/Jakarta');

            // Ambil data pengguna dari input form
            $startdocumentData = [
                'status' => "Start Document - Outbound",
                'bundle_id' => $request->input('bdlid'),
                'no_do' => $request->input('nodo'),
                'waktu_start_document' => $waktuStartDocument,
            ];

            // Ambil kode parkir dari input form
            $kodeParkir = $request->input('kdpkr');
            $startdocuments = obn::where('kode_parkir', $kodeParkir)->first();

            if (!$startdocuments) {
                // Jika kode parkir tidak ditemukan, kirim pesan error
                return response()->json(['error' => 'Kode parkir tidak ditemukan'], 404);
            }

            $startdocuments->update($startdocumentData);
            $message = 'Data start document berhasil diperbarui!';
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

    public function simpanStartPickingProcess(Request $request)
    {
        try {

            // Definisikan pesan validasi khusus
            $messages = [
                'gtprs.required' => 'Field gate process harus diisi.',
                'pcby.required' => 'Field picking by harus diisi.',
            ];

            // Validasi input form
            $request->validate([
                'gtprs' => 'required|string|max:255',
                'pcby' => 'required|string|max:255',
            ], $messages);

            // Ambil waktu saat ini dalam zona waktu WIB (GMT+7)
            $waktuStartDocument = Carbon::now('Asia/Jakarta');

            // Ambil data pengguna dari input form
            $startdocumentData = [
                'status' => "Start Picking Process - Outbound",
                'gate' => $request->input('gtprs'),
                'picking_by' => $request->input('pcby'),
                'waktu_start_picking' => $waktuStartDocument,
            ];

            // Ambil kode parkir dari input form
            $kodeParkir = $request->input('kdpkr');
            $startdocuments = obn::where('kode_parkir', $kodeParkir)->first();

            if (!$startdocuments) {
                // Jika kode parkir tidak ditemukan, kirim pesan error
                return response()->json(['error' => 'Kode parkir tidak ditemukan'], 404);
            }

            $startdocuments->update($startdocumentData);
            $message = 'Data start picking process berhasil diperbarui!';
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

    public function simpanStartLoading(Request $request)
    {
        try {

            // Definisikan pesan validasi khusus
            $messages = [
                'ldby.required' => 'Field loading by harus diisi.',
            ];

            // Validasi input form
            $request->validate([
                'ldby' => 'required|string|max:255',
            ], $messages);

            // Ambil waktu saat ini dalam zona waktu WIB (GMT+7)
            $waktuStartDocument = Carbon::now('Asia/Jakarta');

            // Ambil data pengguna dari input form
            $startdocumentData = [
                'status' => "Start Loading - Outbound",
                'loading_by' => $request->input('ldby'),
                'waktu_start_loading' => $waktuStartDocument,
            ];

            // Ambil kode parkir dari input form
            $kodeParkir = $request->input('kdpkr');
            $startdocuments = obn::where('kode_parkir', $kodeParkir)->first();

            if (!$startdocuments) {
                // Jika kode parkir tidak ditemukan, kirim pesan error
                return response()->json(['error' => 'Kode parkir tidak ditemukan'], 404);
            }

            $startdocuments->update($startdocumentData);
            $message = 'Data start loading berhasil diperbarui!';
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
    
    public function simpanFinishLoading(Request $request)
    {
        try {

            // Ambil waktu saat ini dalam zona waktu WIB (GMT+7)
            $waktuStartDocument = Carbon::now('Asia/Jakarta');

            // Ambil data pengguna dari input form
            $startdocumentData = [
                'status' => "Finish Loading - Outbound",
                'waktu_finish_loading' => $waktuStartDocument,
            ];

            // Ambil kode parkir dari input form
            $kodeParkir = $request->input('kdpkr');
            $startdocuments = obn::where('kode_parkir', $kodeParkir)->first();

            if (!$startdocuments) {
                // Jika kode parkir tidak ditemukan, kirim pesan error
                return response()->json(['error' => 'Kode parkir tidak ditemukan'], 404);
            }

            $startdocuments->update($startdocumentData);
            $message = 'Data finish loading berhasil diperbarui!';
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

    public function simpanDocumentFinishOut(Request $request)
    {
        try {

            // Definisikan pesan validasi khusus
            $messages = [
                'dcby.required' => 'Field document by harus diisi.',
            ];

            // Validasi input form
            $request->validate([
                'dcby' => 'required|string|max:255',
            ], $messages);

            // Ambil waktu saat ini dalam zona waktu WIB (GMT+7)
            $waktuStartDocument = Carbon::now('Asia/Jakarta');

            // Ambil data pengguna dari input form
            $startdocumentData = [
                'status' => "Document Finish - Outbound",
                'document_by' => $request->input('dcby'),
                'waktu_document_finish' => $waktuStartDocument,
            ];

            // Ambil kode parkir dari input form
            $kodeParkir = $request->input('kdpkr');
            $startdocuments = obn::where('kode_parkir', $kodeParkir)->first();

            if (!$startdocuments) {
                // Jika kode parkir tidak ditemukan, kirim pesan error
                return response()->json(['error' => 'Kode parkir tidak ditemukan'], 404);
            }

            $startdocuments->update($startdocumentData);
            $message = 'Data document finish berhasil diperbarui!';
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
