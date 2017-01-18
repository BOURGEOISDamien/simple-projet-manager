<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    // Un projet comprend un à plusieurs tâches
    public function taches()
    {
        return $this->hasMany(Tache::class);
    }

    // Un projet appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un projet comprend un à plusieurs utilisateurs
    public function joined_users()
    {
        return $this->hasMany(ProjetUsers::class);
    }

}
