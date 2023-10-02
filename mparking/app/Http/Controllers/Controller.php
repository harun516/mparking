<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\inbound as ibn;
use App\Models\outbound as obn;

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
}
