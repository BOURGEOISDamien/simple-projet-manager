<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Projet;
use App\ProjetUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class DashboardController extends Controller
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
        })->paginate(8, ['*'], 'projet');

         

        // On récupère tous les projets qui ont l'utilisateur dont l'id
        // correspond à celui de l'utilisateur de la session active comme utilisateur
        // ayant joint le projet
        $joined_projects = Projet::whereHas('participating_users', function($query){
            $query->where('user_id','=',Auth::user()->id);
        })->paginate(8, ['*'], 'projet_rejoint');

       

        $created_projects->appends('projet_rejoint', Input::get('projet_rejoint',1))->links();
        $joined_projects->appends('projet', Input::get('projet',1))->links();


        return view('home', compact('created_projects', 'joined_projects'));
    }
}
