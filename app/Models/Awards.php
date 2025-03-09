<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Awards extends Model
{
    protected $table = "awards";
    use HasFactory;

    protected $fillable = ['nom', 'description', 'imageUrl'];

    // Dans le modèle Award
    public function nomines()
    {
        return $this->hasMany(Nomine::class);  // Relation inverse avec Nomine
    }

}
