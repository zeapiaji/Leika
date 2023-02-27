<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kamera extends Model
{
    use HasFactory;
    
    protected $table = 'kamera';

    protected $fillable = [
        'shutter_count',
        'tipe_sensor',
        'jumlah_piksel',
        'baterai',
        'id_mounting',
    ];

    /**
     * Get all of the Barang for the Kamera
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function barang(): HasMany
    {
        return $this->hasMany(Barang::class);
    }

    /**
     * Get the mounting that owns the Kamera
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mounting(): BelongsTo
    {
        return $this->belongsTo(Mounting::class, 'id_mounting');
    }
}
