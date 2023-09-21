<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkout extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_parkir',
        'checkout_by',
    ];

    /**
     * Get the inbound that owns the checkout
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inbound(): BelongsTo
    {
        return $this->belongsTo(inbound::class, 'kode_parkir', 'kode_parkir');
    }

    /**
     * Get the user that owns the checkout
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function outbound(): BelongsTo
    {
        return $this->belongsTo(outbound::class, 'kode_parkir', 'kode_parkir');
    }
}
