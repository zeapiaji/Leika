<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Merek extends Model
{
    use HasFactory;

    protected $table = 'merek';

    protected $fillable = [
        'nama'
    ];

    /**
     * Get all of the Barang for the Merek
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Barang(): HasMany
    {
        return $this->hasMany(Barang::class, 'id_merek');
    }

}
