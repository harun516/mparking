<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kendaraan extends Model
{
    use HasFactory;
    protected $primarykey = "id";
    protected $fillable = [
        'kendaraan_id',
        'transporter_id',
        'mobil_id',
        'no_pol',
        'tahun_produksi',
        'nomor_stnk',
        'nomor_kir',
        'barcode',
    ];

    /**
     * Get the user that owns the kendaraan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transporter()
    {
        return $this->belongsTo(transporter::class, 'transporter_id', 'transporter_id');
    }

    /**
     * Get the user that owns the kendaraan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mobil()
    {
        return $this->belongsTo(mobil::class, 'mobil_id', 'mobil_id');
    }
}
