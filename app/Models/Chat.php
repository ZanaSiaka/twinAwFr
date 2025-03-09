<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    // Définir les colonnes pouvant être assignées en masse
    protected $fillable = ['question', 'est_visible'];
}
