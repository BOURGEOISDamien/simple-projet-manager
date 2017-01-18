<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjetUsers extends Model
{
  // Un ProjetUsers possède un à plusieurs utilisateurs
  public function users()
  {
    return $this->belongsToMany(User::class);
  }

  // Un ProjetUsers possède un à plusieurs projets
  public function projets()
  {
    return $this->belongsToMany(Projet::class);
  }

}
