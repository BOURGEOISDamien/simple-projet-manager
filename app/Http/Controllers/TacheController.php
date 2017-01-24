<?php

namespace App\Http\Controllers;

use App\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
   public function toggle(Tache $tache)
   {
   		$tache->load('projet');
   		$tache->toggleDone();
   		simple_alert('Opération réussie', 'Le statut de la tâche à bien été mis à jour', 'success',1500);   	
   		return back();
   		
   }

   public function delete(Tache $tache)	
   {
   		$tache->delete();
   		simple_alert('Opération réussie', 'La tâche à bien été suprimée', 'success',1500);
   		return back();
   }
}
