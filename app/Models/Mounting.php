<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mounting extends Model
{
    use HasFactory;

    protected $table = 'mounting';

    protected $fillable = [
        'nama'
    ];
    /**
     * Get all of the kamera for the Mounting
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kamera(): HasMany
    {
        return $this->hasMany(Kamera::class);
    }

    /**
     * Get all of the lensa for the Mounting
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lensa(): HasMany
    {
        return $this->hasMany(Lensa::class);
    }
}
