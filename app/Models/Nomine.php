<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomine extends Model
{
    use HasFactory;

    protected $fillable = ['award_id', 'user_id'];

    /**
     * Relation avec l'award (Un nominé appartient à un seul award).
     */
    public function award()
    {
        return $this->belongsTo(\App\Models\Awards::class);
    }

    /**
     * Relation avec l'utilisateur (Un nominé est un utilisateur).
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * Relation avec les votes (Un nominé peut avoir plusieurs votes).
     */
    public function votes()
    {
        return $this->hasMany(\App\Models\Vote::class);
    }
}
