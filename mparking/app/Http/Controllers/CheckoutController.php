<?php

namespace App\Http\Controllers;

use App\Models\checkout as chc;
use App\Models\inbound as ibn;
use App\Models\kendaraan as kndr;
use App\Models\outbound as obn;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('checkout.index');
    }

    public function kodeparkir($kodeparkir)
    {
        // Cari kode parkir dalam tabel outbound
        $kodeparkirs = obn::where('kode_parkir', $kodeparkir)->first();

        if (!$kodeparkirs) {
            // Jika tidak ditemukan dalam tabel outbound, cari dalam tabel inbound
            $kodeparkirs = ibn::where('kode_parkir', $kodeparkir)->first();

            if (!$kodeparkirs) {
                return response()->json(['error' => 'Kode parkir tidak ditemukan'], 404);
            }
        }

        // Ambil barcode dari data yang ditemukan
        $barcode = $kodeparkirs->barcode;

        // Cari kendaraan berdasarkan barcode
        $kendaraan = kndr::where('barcode', $barcode)->first();

        // Ambil mobil_id dari data yang ditemukan
        $mbl_id = $kendaraan->mobil_id;

        if (!$kendaraan) {
            return response()->json(['error' => 'No polisi tidak ditemukan'], 404);
        }

        return response()->json([
            'nrfp' => $kodeparkirs->no_referensi,
            'npls' => $kendaraan->no_pol,
            'nmspr' => $kodeparkirs->driver_nama,
            'stts' => $kodeparkirs->status,
        ]);

        return response()->json($response);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function simpanCheckout(Request $request)
    {
        try {
            // Definisikan pesan validasi khusus
            $messages = [
                'chcby.required' => 'Field checkout by harus diisi.',
            ];

            // Validasi input form
            $request->validate([
                'chcby' => 'required|string|max:255',
            ], $messages);

            // Ambil waktu saat ini dalam zona waktu WIB (GMT+7)
            $waktuCheckout = Carbon::now('Asia/Jakarta');

            // Ambil kode parkir dari input form
            $kodeParkir = $request->input('kdpkr');

            // Periksa apakah kode parkir telah ada dalam tabel checkout
            $existingCheckout = chc::where('kode_parkir', $kodeParkir)->first();

            if ($existingCheckout) {
                // Jika kode parkir sudah ada dalam tabel checkout, kirim pesan error
                return response()->json(['error' => 'Kode parkir sudah pernah di-checkout'], 422);
            }

            // Cari kode parkir dalam tabel outbound
            $checkouts = obn::where('kode_parkir', $kodeParkir)->first();

            // Jika tidak ditemukan dalam tabel outbound, cari dalam tabel inbound
            if (!$checkouts) {
                $checkouts = ibn::where('kode_parkir', $kodeParkir)->first();

                if (!$checkouts) {
                    // Jika kode parkir tidak ditemukan, kirim pesan error
                    return response()->json(['error' => 'Kode parkir tidak ditemukan'], 404);
                }

                // Set status berdasarkan tabel yang sesuai
                $checkouts->update([
                    'status' => "Checkout - Inbound",
                    'checkout_id' => "2",
                    'waktu_keluar' => $waktuCheckout,
                ]);
            } else {
                // Jika kode parkir ditemukan dalam tabel outbound
                // Set status berdasarkan tabel outbound
                $checkouts->update([
                    'status' => "Checkout - Outbound",
                    'checkout_id' => "2",
                    'waktu_keluar' => $waktuCheckout,
                ]);
            }

            // Input data ke tabel checkout
            chc::create([
                'kode_parkir' => $kodeParkir,
                'checkout_by' => $request->input('chcby'),
            ]);

            $message = 'Data checkout berhasil diperbarui!';
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
