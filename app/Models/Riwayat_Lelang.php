<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Riwayat_Lelang extends Model
{
    use HasFactory;

    protected $table = 'riwayat_lelang';

    protected $fillable = [
        'id_lelang',
        'id_barang',
        'id_user',
        'penawaran_harga',
    ];

    /**
     * Get the user that owns the Riwayat_Lelang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    /**
     * Get the barang that owns the Riwayat_Lelang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }

    /**
     * Get the lelang that owns the Riwayat_Lelang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lelang(): BelongsTo
    {
        return $this->belongsTo(Lelang::class, 'id_lelang');
    }
}
