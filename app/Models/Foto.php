<?php

namespace App\Models;

use App\Models\User;
use App\Models\Komentarfoto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = [
        'JudulFoto',
        'DeskripsiFoto',
        'image',
        'id_album',
        'id_user'
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    public function komentarfoto(): hasMany
    {
        return $this->hasMany(Komentarfoto::class, 'foto_id');
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function userLiked()
    {   
        return $this->likes()->where('user_id', Auth::id())->exists();
    }

    public function scopeFilter(Builder $query): void
    {
       $query->where('JudulFoto', 'like', '%' . request('search') . '%');
    }
}
