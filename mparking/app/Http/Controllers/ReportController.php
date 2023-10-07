<?php

namespace App\Http\Controllers;

use App\Models\checkout as chc;
use App\Models\inbound as ibn;
use App\Models\outbound as obn;
use App\Models\kendaraan as kndr;
use App\Models\mobil as mbl;
use App\Models\transporter as tpr;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexinbound()
    {
        return view('report.inbound.index');
    }

    public function indexoutbound()
    {
        return view('report.outbound.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function InboundGet(Request $request)
    {
        $inboundData = ibn::select('barcode as brcd', 'status as stts', 'kode_parkir as kdpkr', 'created_at as date', 'created_at as time',
            'driver_nama as drnm', 'stnk as nstnk', 'sim as nsim', 'kir as nkir', 'gate as gt', 'note as nt', 'waktu_start_unloading as tsu',
            'waktu_finish_document as tfd', 'waktu_keluar as tco', 'register_by as rgsby', 'checker_by as chcrby', 'document_by as dcby')->get();

        // Mendapatkan daftar barcode unik
        $uniqueBarcodes = $inboundData->pluck('brcd')->unique();

        // Mengambil data no_pol dari tabel kendaraan berdasarkan barcode
        $noPolData = kndr::whereIn('barcode', $uniqueBarcodes)->pluck('no_pol', 'barcode');

        // Mengambil data transporter_id dari tabel kendaraan berdasarkan barcode
        $transporterIdData = kndr::whereIn('barcode', $uniqueBarcodes)->pluck('transporter_id', 'barcode');

        // Mengambil nama transporter dari tabel transporter berdasarkan transporter_id
        $transporterIdList = $transporterIdData->unique();
        $transporterData = tpr::whereIn('transporter_id', $transporterIdList)->pluck('nama', 'transporter_id');

        // Mengambil data transporter_id dari tabel kendaraan berdasarkan barcode
        $mobilIdData = kndr::whereIn('barcode', $uniqueBarcodes)->pluck('mobil_id', 'barcode');

        // Mengambil nama transporter dari tabel transporter berdasarkan transporter_id
        $mobilIdList = $mobilIdData->unique();
        $mobilData = mbl::whereIn('mobil_id', $mobilIdList)->pluck('nama', 'mobil_id');

        // Mengambil data kode_parkir dari tabel inbound berdasarkan barcode
        $kodeparkirIdData = ibn::whereIn('barcode', $uniqueBarcodes)->pluck('kode_parkir', 'barcode');

        // Mengambil checkout_by dari tabel checkout berdasarkan kode_parkir
        $kodeparkirIdList = $kodeparkirIdData->unique();
        $checkoutlData = chc::whereIn('kode_parkir', $kodeparkirIdList)->pluck('checkout_by', 'kode_parkir');

        // Filter data berdasarkan rentang tanggal
        $minDate = $request->input('min');
        $maxDate = $request->input('max');

        if (!empty($minDate) && !empty($maxDate)) {
            $inboundData = $inboundData->filter(function ($item) use ($minDate, $maxDate) {
                $date = $item['created_at'];
                return $date >= $minDate && $date <= $maxDate;
            });
        }

        $formattedData = $inboundData->map(function ($item) use ($noPolData, $transporterIdData, $transporterData, $mobilIdData, $mobilData, $kodeparkirIdData, $checkoutlData) {
            $barcode = $item['brcd'];
            $item['npl'] = $noPolData[$barcode] ?? null;
            $item['tprid'] = $transporterIdData[$barcode] ?? null;
            $transporterId = $item['tprid'];
            $item['tprnm'] = $transporterData[$transporterId] ?? null;
            $item['mblid'] = $mobilIdData[$barcode] ?? null;
            $mobilId = $item['mblid'];
            $item['mblnm'] = $mobilData[$mobilId] ?? null;
            $item['kdpkr'] = $kodeparkirIdData[$barcode] ?? null;
            $kodeparkir = $item['kdpkr'];
            $item['chcby'] = $checkoutlData[$kodeparkir] ?? null;
            return $item;
        });

        //dd($transporterIdData, $transporterIdList,  $transporterData, $transporterData, $combinedData);

        return response()->json(['data' => $formattedData]);
    }

    public function OutboundGet(Request $request)
    {
        $outboundData = obn::select('barcode as brcd', 'status as stts', 'kode_parkir as kdpkr', 'created_at as date', 'created_at as time',
            'driver_nama as drnm', 'stnk as nstnk', 'sim as nsim', 'kir as nkir', 'gate as gt', 'note as nt', 'waktu_start_document as tsd',
            'waktu_start_picking as tsp', 'waktu_start_loading as tsl', 'waktu_finish_loading as tfl', 'waktu_document_finish as tdf', 'waktu_keluar as tco', 
            'register_by as rgsby', 'picking_by as pcby', 'loading_by as ldby', 'document_by as dcby')->get();

        // Mendapatkan daftar barcode unik
        $uniqueBarcodes = $outboundData->pluck('brcd')->unique();

        // Mengambil data no_pol dari tabel kendaraan berdasarkan barcode
        $noPolData = kndr::whereIn('barcode', $uniqueBarcodes)->pluck('no_pol', 'barcode');

        // Mengambil data transporter_id dari tabel kendaraan berdasarkan barcode
        $transporterIdData = kndr::whereIn('barcode', $uniqueBarcodes)->pluck('transporter_id', 'barcode');

        // Mengambil nama transporter dari tabel transporter berdasarkan transporter_id
        $transporterIdList = $transporterIdData->unique();
        $transporterData = tpr::whereIn('transporter_id', $transporterIdList)->pluck('nama', 'transporter_id');

        // Mengambil data transporter_id dari tabel kendaraan berdasarkan barcode
        $mobilIdData = kndr::whereIn('barcode', $uniqueBarcodes)->pluck('mobil_id', 'barcode');

        // Mengambil nama transporter dari tabel transporter berdasarkan transporter_id
        $mobilIdList = $mobilIdData->unique();
        $mobilData = mbl::whereIn('mobil_id', $mobilIdList)->pluck('nama', 'mobil_id');

        // Mengambil data kode_parkir dari tabel inbound berdasarkan barcode
        $kodeparkirIdData = ibn::whereIn('barcode', $uniqueBarcodes)->pluck('kode_parkir', 'barcode');

        // Mengambil checkout_by dari tabel checkout berdasarkan kode_parkir
        $kodeparkirIdList = $kodeparkirIdData->unique();
        $checkoutlData = chc::whereIn('kode_parkir', $kodeparkirIdList)->pluck('checkout_by', 'kode_parkir');

        // Filter data berdasarkan rentang tanggal
        $minDate = $request->input('min');
        $maxDate = $request->input('max');

        if (!empty($minDate) && !empty($maxDate)) {
            $outboundData = $outboundData->filter(function ($item) use ($minDate, $maxDate) {
                $date = $item['created_at'];
                return $date >= $minDate && $date <= $maxDate;
            });
        }

        $formattedData = $outboundData->map(function ($item) use ($noPolData, $transporterIdData, $transporterData, $mobilIdData, $mobilData, $kodeparkirIdData, $checkoutlData) {
            $barcode = $item['brcd'];
            $item['npl'] = $noPolData[$barcode] ?? null;
            $item['tprid'] = $transporterIdData[$barcode] ?? null;
            $transporterId = $item['tprid'];
            $item['tprnm'] = $transporterData[$transporterId] ?? null;
            $item['mblid'] = $mobilIdData[$barcode] ?? null;
            $mobilId = $item['mblid'];
            $item['mblnm'] = $mobilData[$mobilId] ?? null;
            $item['kdpkr'] = $kodeparkirIdData[$barcode] ?? null;
            $kodeparkir = $item['kdpkr'];
            $item['chcby'] = $checkoutlData[$kodeparkir] ?? null;
            return $item;
        });

        //dd($transporterIdData, $transporterIdList,  $transporterData, $transporterData, $combinedData);

        return response()->json(['data' => $formattedData]);
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
