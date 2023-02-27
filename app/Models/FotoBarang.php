<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FotoBarang extends Model
{
    use HasFactory;

    protected $table = 'foto_barang';

    protected $fillable = [
        'id_barang',
        'lokasi_foto',
    ];

    /**
     * Get the barang that owns the FotoBarang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
