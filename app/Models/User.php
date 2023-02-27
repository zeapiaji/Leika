<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_lengkap',
        'username',
        'email',
        'password',
        'telp',
        'alamat',
        'usia',
        'foto_profil',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the lelang associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lelang(): HasOne
    {
        return $this->hasOne(Lelang::class, 'id_petugas');
    }

    /**
     * Get the penawaran associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function penawaran(): HasOne
    {
        return $this->hasOne(Penawaran::class, 'id_user');
    }

    /**
     * Get the riwayat_lelang associated with the Lelang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function riwayat_lelang(): HasOne
    {
        return $this->hasOne(Riwayat_Lelang::class, 'id_user');
    }
    
}
