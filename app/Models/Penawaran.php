<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penawaran extends Model
{
    use HasFactory;

    protected $table = 'penawaran';

    protected $fillable = [
        'id_user',
        'id_lelang',
        'harga_penawaran',
    ];

    /**
     * Get the user that owns the Penawaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    /**
     * Get the lelang that owns the Penawaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lelang(): BelongsTo
    {
        return $this->belongsTo(Lelang::class, 'id_lelang');
    }
}
