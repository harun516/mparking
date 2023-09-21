<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outbound extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'kendaraan_id',
        'checkout_id',
        'kode_parkir',
        'driver_nama',
        'driver_ktp',
        'driver_vaksin',
        'no_refrensi',
        'sim',
        'stnk',
        'kir',
        'tidak_bersih',
        'bocor',
        'bau',
        'status',
        'note',
        'gate',
        'bundle_id',
        'no_do',
        'waktu_start_document',
        'waktu_start_picking',
        'waktu_start_loading',
        'waktu_finish_loading',
        'waktu_keluar',
        'picking_by',
        'register_by',
        'loading_by',
        'document_by',
    ];

    /**
     * Get the user that owns the outbound
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kendaraan(): BelongsTo
    {
        return $this->belongsTo(kendaraan::class, 'kendaraan_id', 'kendaraan_id');
    }
}
