<?php

namespace App\Http\Controllers;

use App\Projet;
use App\User;
use Illuminate\Http\Request;

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

}
