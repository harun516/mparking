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
        'kode_parkir',
        'no_referensi',
        'pengantaran_id',
        'barcode',
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
    public function pengantaran()
    {
        return $this->belongsTo(pengantaran::class, 'pengantaran_id', 'pengantaran_id');
    }

    /**
     * Get the user that owns the inbound
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kendaraan()
    {
        return $this->belongsTo(kendaraan::class, 'barcode', 'barcode');
    }

    /**
     * Get the user that owns the inbound
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transporter()
    {
        return $this->belongsTo(transporter::class, 'transporter_id', 'transporidter_id');
    }
    public function mobil()
    {
        return $this->belongsTo(mobil::class, 'mobil_id', 'id');
    }
}
