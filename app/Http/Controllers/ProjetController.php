<?php

namespace App\Http\Controllers;


use App\User;
use App\Projet;
use Illuminate\Http\Request;
use Auth;

class ProjetController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function show(Projet $projet)
  {

     $projet->load('taches.user','participating_users');

     return view('taches.show', compact('projet'));

  }

  public function join($token)
  {
    $projet = new Projet;
    $projet = Projet::where('inviteURL','=',$token)->get()->first();
 
    if($projet)
    {
       // pop up -> validation
      simple_alert('Opération réussie', 'Vous avez bien rejoint le projet.', 'success',3000);
      // ajout utilisateur dans utilisateurs participant au projet
      Projet::find($projet->id)->participating_users()->save(Auth::user());
      // redirection projet concerné
      return redirect('projet/'.$projet->id);

    }
    else
    {
       // pop up -> erreurr
      simple_alert('Erreur', 'Le lien d\'invitation ne correspond à aucun projet.','error',3000);
      //redirection acceuil
       return redirect('home');
    }
  }

  public function delete(Projet $projet)
  {
      $projet->delete();
      simple_alert('Opération réussie', 'Le projet à bien été supprimé', 'success',1500);     
      return back();

  }

  public function quit(Projet $projet)
  {
      $projet->remove_joined_user(Auth::user());
      simple_alert('Opération réussie', 'Vous avez bien quitté le projet séléctionné', 'success',1500);     
      return back();

  }

}
