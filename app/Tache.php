<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    // Une tâche appartient à un utilisateur
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    // Une tâche appartient à un projet
    public function projet()
    {
      return $this->belongsTo(Projet::class);
    }

}
