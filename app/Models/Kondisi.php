<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kondisi extends Model
{
    use HasFactory;

    protected $table = 'kondisi';

    protected $fillable = [
        'nama'
    ];
    /**
     * Get all of the barang for the Kondisi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function barang(): HasMany
    {
        return $this->hasMany(Barang::class);
    }
}
