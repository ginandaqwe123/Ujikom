<?php

namespace App\Models;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Komentarfoto extends Model
{
    use HasFactory;
    protected $fillable = [
        'foto_id',
        'id_user',
        'isiKomen',
    ];

    public function foto(): belongsTo
    {
        return $this->belongsTo(Foto::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
