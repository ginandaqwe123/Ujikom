<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_lengkap',
        'email',
        'alamat',
        'username',
        'password',
    ];

    // protected $guarded = ['UserID'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
   protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
   ];

    public $timestamps = false;


    public function foto() : HasMany
    {
        return $this->hasMany(Foto::class, 'id_user');
    }

    public function komentarfoto() : HasMany
    {
        return $this->hasMany(Komentarfoto::class, 'user_id');
    }

    public function Album() : HasMany
    {
        return $this->hasMany(album::class, 'user_id');
    }

    public function likefoto() : hasOne
    {
        return $this->hasOne(Like::class);
    }
}
