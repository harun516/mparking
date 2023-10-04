<?php

namespace App\Http\Controllers;

use App\Models\inbound as ibn;
use App\Models\kendaraan as kndr;
use App\Models\mobil as mbl;
use App\Models\outbound as obn;
use App\Models\transporter as tpr;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        // Menghitung jumlah baris dengan table inbound
        $inbound1 = ibn::where('checkout_id', 1)->count();
        $rgsibn = ibn::where('status', 'Registrasi Mobil')->count();
        $stribn = ibn::where('status', 'Start Unloading')->count();
        $fnsibn = ibn::where('status', 'Finish Unloading')->count();
        $dcibn = ibn::where('status', 'Document Finish - Inbound')->count();
        $inbound2 = ibn::where('checkout_id', 2)->count();

        // Menghitung jumlah baris dengan table outbound
        $outbound1 = obn::where('checkout_id', 1)->count();
        $rgsobn = obn::where('status', 'Registrasi Mobil')->count();
        $strdcobn = obn::where('status', 'Start Document')->count();
        $strpcobn = obn::where('status', 'Start Picking Process')->count();
        $strldobn = obn::where('status', 'Start Loading')->count();
        $fnsdobn = obn::where('status', 'Finish Loading')->count();
        $dcobn = obn::where('status', 'Document Finish - Outbound')->count();
        $outbound2 = obn::where('checkout_id', 2)->count();

        // Mengirim jumlah baris ke view
        return view('dashboard.index', compact('inbound1', 'outbound1', 'rgsibn', 'stribn', 'fnsibn', 'dcibn', 'inbound2', 'rgsobn', 'strdcobn', 'strpcobn', 'strldobn', 'fnsdobn', 'dcobn', 'outbound2'));
    }

    public function get(Request $request)
    {
        $inboundData = ibn::select('barcode as brcd', 'status as stts', 'kode_parkir as kdpkr', 'created_at as date', 'created_at as time', 'driver_nama as drnm', 'stnk as nstnk', 'sim as nsim', 'kir as nkir', 'gate as gt', 'note as nt')->get();
        $outboundData = obn::select('barcode as brcd', 'status as stts', 'kode_parkir as kdpkr', 'created_at as date', 'created_at as time', 'driver_nama as drnm', 'stnk as nstnk', 'sim as nsim', 'kir as nkir', 'gate as gt', 'note as nt')->get();

        $combinedData = $inboundData->concat($outboundData);

        // Mendapatkan daftar barcode unik
        $uniqueBarcodes = $combinedData->pluck('brcd')->unique();

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
        $combinedData = $combinedData->map(function ($item) use ($noPolData, $transporterIdData, $transporterData, $mobilIdData, $mobilData) {
            $barcode = $item['brcd'];
            $item['npl'] = $noPolData[$barcode] ?? null;
            $item['tprid'] = $transporterIdData[$barcode] ?? null;
            $transporterId = $item['tprid'];
            $item['tprnm'] = $transporterData[$transporterId] ?? null;
            $item['mblid'] = $mobilIdData[$barcode] ?? null;
            $mobilId = $item['mblid'];
            $item['mblnm'] = $mobilData[$mobilId] ?? null;
            return $item;
        });

        //dd($transporterIdData, $transporterIdList,  $transporterData, $transporterData, $combinedData);

        return response()->json(['data' => $combinedData]);
    }

    public function getKendaraan($kendaraanId)
    {
        // Cari data kendaraan di tabel inbound
        $inboundKendaraan = ibn::where('kode_parkir', $kendaraanId)->first();

        if ($inboundKendaraan) {
            $kendaraan = kndr::where('barcode', $inboundKendaraan->barcode)->first();
            $mobil = mbl::where('mobil_id', $kendaraan->mobil_id)->first();
            $transporter = tpr::where('transporter_id', $kendaraan->transporter_id)->first();
            $data = [
                'table' => 'inbound', // Tambahkan informasi tabel ke respons
                'kdpkr' => $inboundKendaraan->kode_parkir,
                'npl' => $kendaraan ? $kendaraan->no_pol : '-',
                'kndrnm' => $mobil ? $mobil->nama : '-',
                'dtin' => optional($inboundKendaraan->created_at)->format('Y-m-d'),
                'tmin' => optional($inboundKendaraan->created_at)->format('H:i:s'),
                'tprnm' => $transporter ? $transporter->nama : '-',
                'drnm' => $inboundKendaraan->driver_nama,
                'nstnk' => $inboundKendaraan->stnk,
                'nsim' => $inboundKendaraan->sim,
                'nkir' => $inboundKendaraan->kir,
                'gt' => $inboundKendaraan->gate,
                'stts' => $inboundKendaraan->status,
                'nt' => $inboundKendaraan->note,
                'rgsby' => $inboundKendaraan->register_by,
                'tsu' => $inboundKendaraan->waktu_start_unloading ? Carbon::parse($inboundKendaraan->waktu_start_unloading)->format('H:i:s') : '-',
                'tfu' => $inboundKendaraan->waktu_finish_unloading ? Carbon::parse($inboundKendaraan->waktu_finish_unloading)->format('H:i:s') : '-',
                'tfd' => $inboundKendaraan->waktu_finish_document ? Carbon::parse($inboundKendaraan->waktu_finish_document)->format('H:i:s') : '-',
                'tco' => $inboundKendaraan->waktu_keluar ? Carbon::parse($inboundKendaraan->waktu_keluar)->format('H:i:s') : '-',

            ];
        } else {
            // Jika tidak ditemukan di tabel inbound, coba cari di tabel outbound
            $outboundKendaraan = obn::where('kode_parkir', $kendaraanId)->first();

            if ($outboundKendaraan) {
                $kendaraan = kndr::where('barcode', $outboundKendaraan->barcode)->first();
                $mobil = mbl::where('mobil_id', $kendaraan->mobil_id)->first();
                $transporter = tpr::where('transporter_id', $kendaraan->transporter_id)->first();
                $data = [
                    'table' => 'outbound', // Tambahkan informasi tabel ke respons
                    'kdpkrobn' => $outboundKendaraan->kode_parkir,
                    'nplobn' => $kendaraan ? $kendaraan->no_pol : '-',
                    'kndrnmobn' => $mobil ? $mobil->nama : '-',
                    'dtinobn' => $outboundKendaraan->created_at->format('Y-m-d'),
                    'tminobn' => $outboundKendaraan->created_at->format('H:i:s'),
                    'tprnmobn' => $transporter ? $transporter->nama : '-',
                    'drnmobn' => $outboundKendaraan->driver_nama,
                    'nstnkobn' => $outboundKendaraan->stnk,
                    'nsimobn' => $outboundKendaraan->sim,
                    'nkirobn' => $outboundKendaraan->kir,
                    'gtobn' => $outboundKendaraan->gate,
                    'sttsobn' => $outboundKendaraan->status,
                    'ntobn' => $outboundKendaraan->note,
                    'rgsbyobn' => $outboundKendaraan->register_by,
                    'tsdobn' => $outboundKendaraan->waktu_start_document ? Carbon::parse($outboundKendaraan->waktu_start_document)->format('H:i:s') : '-',
                    'tspobn' => $outboundKendaraan->waktu_start_picking ? Carbon::parse($outboundKendaraan->waktu_start_picking)->format('H:i:s') : '-',
                    'pcbyobn' => $outboundKendaraan->picking_by ?? '-',
                    'tslobn' => $outboundKendaraan->waktu_start_loading ? Carbon::parse($outboundKendaraan->waktu_start_loading)->format('H:i:s') : '-',
                    'ldbyobn' => $outboundKendaraan->loading_by ?? '-',
                    'tflobn' => $outboundKendaraan->waktu_finish_loading ? Carbon::parse($outboundKendaraan->waktu_finish_loading)->format('H:i:s') : '-',
                    'tfdobn' => $outboundKendaraan->waktu_document_finish ? Carbon::parse($outboundKendaraan->waktu_document_finish)->format('H:i:s') : '-',
                    'tcoobn' => $outboundKendaraan->waktu_keluar ? Carbon::parse($outboundKendaraan->waktu_keluar)->format('H:i:s') : '-',
                ];
                // dd($data);
            } else {
                return response()->json(['error' => 'Kendaraan tidak ditemukan'], 404);
            }
        }

        return response()->json($data);
    }

    public function destroy($kode_parkir)
    {
        // Cek apakah kode_parkir ada di tabel inbound
        $inboundKendaraan = ibn::where('kode_parkir', $kode_parkir)->first();

        if ($inboundKendaraan) {
            // Hapus kendaraan dari tabel inbound
            $inboundKendaraan->delete();
            return response()->json(['message' => 'Kendaraan dari inbound berhasil dihapus']);
        }

        // Jika tidak ditemukan di tabel inbound, coba cari di tabel outbound
        $outboundKendaraan = obn::where('kode_parkir', $kode_parkir)->first();

        if ($outboundKendaraan) {
            // Hapus kendaraan dari tabel outbound
            $outboundKendaraan->delete();
            return response()->json(['message' => 'Kendaraan dari outbound berhasil dihapus']);
        }

        // Jika tidak ditemukan di kedua tabel, beri pesan bahwa kendaraan tidak ditemukan
        return response()->json(['message' => 'Kendaraan tidak ditemukan'], 404);
    }

}
