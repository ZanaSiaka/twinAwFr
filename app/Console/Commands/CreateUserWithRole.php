<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class CreateUserWithRole extends Command
{
    protected $signature = 'user:create {email} {pseudo} {role_nom}';
    protected $description = 'Créer un utilisateur et lui affecter un rôle';

    public function handle()
    {
        $email = $this->argument('email');
        $pseudo = $this->argument('pseudo');
        $roleNom = $this->argument('role_nom');

        // Vérifier si le rôle existe
        $role = Role::where('nom', $roleNom)->first();
        if (!$role) {
            $this->error("Le rôle '$roleNom' n'existe pas !");
            return;
        }

        // Vérifier si l'utilisateur existe déjà
        if (User::where('email', $email)->exists()) {
            $this->error("Un utilisateur avec l'email '$email' existe déjà !");
            return;
        }

        // Générer un matricule unique
        $matricule = 'MAT' . rand(1000, 9999);

        // Créer l'utilisateur
        $user = User::create([
            'matricule' => $matricule,
            'email' => $email,
            'password' => Hash::make('123465789'), // Change le mot de passe
            'pseudo' => $pseudo,
            'imageUrl' => null
        ]);

        // Associer le rôle
        $user->roles()->attach($role->id);

        $this->info("Utilisateur '$pseudo' créé avec succès et associé au rôle '$roleNom' les accès: matricule: $matricule, mot de passe: 123465789 !");
    }
}
