<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inbound extends Model
{
    use HasFactory;
    protected $primaykey = 'id';
    protected $fillable = [
        'checkout_id',
        'pengantaran_id',
        'kendaraan_id',
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
        'gr_code',
        'waktu_start_unloading',
        'waktu_finish_unloading',
        'waktu_finish_document',
        'waktu_keluar',
        'register_by',
        'checker_by',
        'document_by',
    ];

    /**
     * Get the user that owns the inbound
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pengantaran(): BelongsTo
    {
        return $this->belongsTo(pengantaran::class, 'pengantaran_id', 'pengantaran_id');
    }

    /**
     * Get the user that owns the inbound
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kendaraan(): BelongsTo
    {
        return $this->belongsTo(kendaraan::class, 'kendaraan_id', 'kendaraan_id');
    }
}
