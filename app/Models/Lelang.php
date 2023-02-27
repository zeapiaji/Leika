<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lelang extends Model
{
    use HasFactory;

    protected $table = 'lelang';

    protected $fillable = [
        'id_barang',
        'harga_awal',
        'kelipatan_harga',
        'harga_tertinggi',
        'id_petugas',
        'status',
    ];

    /**
     * Get the barang that owns the Lelang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class,'id_barang');
    }

    /**
     * Get the user that owns the Lelang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_petugas');
    }
    
    /**
     * Get the penawaran associated with the Lelang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function penawaran(): HasOne
    {
        return $this->hasOne(Penawaran::class, 'id_lelang');
    }

    /**
     * Get the riwayat_lelang associated with the Lelang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function riwayat_lelang(): HasOne
    {
        return $this->hasOne(Riwayat_Lelang::class, 'id_lelang');
    }
}
