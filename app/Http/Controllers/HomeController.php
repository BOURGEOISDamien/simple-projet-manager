<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Projet;
use App\ProjetUsers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // On récupère tous les projets qui ont l'utilisateur dont l'id
        // correspond à celui de l'utilisateur de la session active comme utilisateur "créateur"
        $created_projects = Projet::whereHas('user',function($query){
            $query->where('user_id','=',Auth::user()->id);
        })->get();

        // On récupère tous les projets qui ont l'utilisateur dont l'id
        // correspond à celui de l'utilisateur de la session active comme utilisateur
        // ayant joint le projet
        $joined_projects = Projet::whereHas('participating_users', function($query){
            $query->where('user_id','=',Auth::user()->id);
        })->get();

        return view('home', compact('created_projects', 'joined_projects'));
    }
}
