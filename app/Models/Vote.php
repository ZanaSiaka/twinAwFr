<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['nomine_id', 'user_id', 'award_id'];

    /**
     * Relation avec le nominé (Un vote appartient à un nominé).
     */
    public function nomine()
    {
        return $this->belongsTo(Nomine::class);
    }

    /**
     * Relation avec l'utilisateur (Un vote est effectué par un utilisateur).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function award()
    {
        return $this->belongsTo(\App\Models\Awards::class);
    }
}
