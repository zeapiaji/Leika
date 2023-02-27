<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lensa extends Model
{
    use HasFactory;

    protected $table = 'lensa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'focal_length',
        'aperture',
        'berat',
        'id_mounting',
    ];

    /**
     * Get all of the Barang for the Lensa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Barang(): HasMany
    {
        return $this->hasMany(Barang::class);
    }

    /**
     * Get the mounting that owns the Lensa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mounting(): BelongsTo
    {
        return $this->belongsTo(Mounting::class, 'id_mounting');
    }
}
