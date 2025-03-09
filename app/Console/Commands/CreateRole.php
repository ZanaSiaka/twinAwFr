<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Role;

class CreateRole extends Command
{
    protected $signature = 'role:create {nom} {description} {valeur}';
    protected $description = 'Créer un rôle dans la base de données';

    public function handle()
    {
        $nom = $this->argument('nom');
        $description = $this->argument('description');
        $valeur = $this->argument('valeur');

        // Vérifier si le rôle existe déjà
        if (Role::where('nom', $nom)->exists()) {
            $this->error("Le rôle '$nom' existe déjà !");
            return;
        }

        // Créer le rôle
        Role::create([
            'nom' => $nom,
            'description' => $description,
            'valeur' => $valeur
        ]);

        $this->info("Le rôle '$nom' a été créé avec succès !");
    }
}
