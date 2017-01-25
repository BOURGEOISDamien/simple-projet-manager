<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // Un utilisateur possède plusieurs projets
    public function projets()
    {
      return $this->hasMany(Projet::class);
    }

    // Un utilisateur possède plusieurs tâches
    public function taches()
    {
      return $this->hasMany(Tache::class);
    }

    // Un utilisateur possède plusieurs utilisateurs ayant joint celui-ci
    // public function joined_projects()
    // {
    //   return $this->hasMany(ProjetUsers::class);
    // }

    public function joined_projects()
    {
      return $this->belongsToMany(Projet::class, 'projet_users');
    }


    public function hasJoined(Projet $projet)
    {
        return $projet->participating_users()->find($this->id);
    }

    public function hasCreated(Projet $projet)
    {
        return $this->projets()->find($projet->id);
    }
    
    public function worksIn(Projet $projet)
    {
      if($this->hasCreated($projet) || $this->hasJoined($projet))
      {
          return true;
      }

      return false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
