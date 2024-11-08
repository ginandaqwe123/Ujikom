<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Album extends Model
{
    protected $fillable = [
        'NamaAlbum',
        'Deskripsi',
        'id_user',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }
    public function fotos()
    {
    return $this->hasMany(Foto::class, 'id_album');
    }

}
