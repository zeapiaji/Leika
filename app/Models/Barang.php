<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'barang';

    protected $fillable = [
        'nama_barang',
        'id_merek',
        'tanggal_rilis',
        'id_kondisi',
        'id_kategori',
        'deskripsi',
        'id_kamera',
        'id_lensa',
    ];

    /**
     * Get the merek that owns the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function merek(): BelongsTo
    {
        return $this->belongsTo(Merek::class, 'id_merek');
    }

    /**
     * Get the kondisi that owns the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kondisi(): BelongsTo
    {
        return $this->belongsTo(Kondisi::class, 'id_kondisi');
    }

    /**
     * Get the kategori that owns the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    /**
     * Get the kamera that owns the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kamera(): BelongsTo
    {
        return $this->belongsTo(Kamera::class, 'id_kamera');
    }


    /**
     * Get the lensa that owns the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lensa(): BelongsTo
    {
        return $this->belongsTo(Lensa::class, 'id_lensa');
    }

    /**
     * Get all of the gambar for the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function foto_barang(): HasMany
    {
        return $this->hasMany(FotoBarang::class, 'id_barang');
    }

    /**
     * Get the lelang associated with the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lelang(): HasOne
    {
        return $this->hasOne(Lelang::class, 'id_barang');
    }

    /**
     * Get the riwayat_lelang associated with the Lelang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function riwayat_lelang(): HasOne
    {
        return $this->hasOne(Riwayat_Lelang::class);
    }
}
