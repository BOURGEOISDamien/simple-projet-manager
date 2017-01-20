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

     // Un projet comprend un à plusieurs tâches
    public function tachesFinies()
    {
        return $this->hasMany(Tache::class)->where('done','=', true);
    }

    // Un projet appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function participating_users()
    {
        return $this->belongsToMany(User::class, 'projet_users');
    }




}
