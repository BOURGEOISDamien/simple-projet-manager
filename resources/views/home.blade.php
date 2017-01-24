@extends('layouts.app')

@section('content')




<div class="container">
    <div class="row">
        <div class="col-md-6 ">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="" style="font-size:1.8rem;">Projets créés par {{Auth::user()->username}}</span>
                    <button type="button" class="btn btn-default" style="float:right; padding:3px 12px !important;" name="button">
                        Ajouter
                    </button>
                </div>

                <div class="panel-body">
                  <ul  class="list-group">
                    @foreach($created_projects as $created_project)
             
                          <li class="list-group-item">
                           <a href="projet/{{$created_project->id}}"class="clickable-item">
                              <span class="number_header">Projet #{{$created_project->id}}</span> ~ 
                                {{ $created_project->title }}
                            </a>

                          <div class="btn-group" style="float:right; position:relative; display:inline-block;">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="glyphicon glyphicon-option-horizontal" aria-hidden="true" style="float:right;"></span>
                              </button>
                              <ul class="dropdown-menu">
                                <li><a href="#">Modifier</a></li>
                                <li><a href="/projet/{{$created_project->id}}/delete">Supprimer</a></li>
                                 <li><a href="#">Inviter un membre</a></li>
                              </ul>

                            </div>
                           
                             @if($created_project->taches()->count() == $created_project->tachesFinies()->count())
                                @if($created_project->taches()->count() == 0)
                                   <span class="badge empty">Vide</span>
                                @else
                                   <span class="badge over">Terminé</span>
                                @endif
                            @else
                                 <span class="badge current">En cours</span>
                            @endif
                            
                            
                          </li>
               
                    @endforeach

                  </ul>
                  <div class="row">
                    <div class="col-md-10 col-md-offset-2">
                         {{$created_projects->links()}}
                    </div>
                  </div>
               
                </div>
            </div>
</div>
<div class="col-md-6 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="" style="font-size:1.8rem;">Projets auquels {{Auth::user()->username}} participe</span>

                </div>

                <div class="panel-body">
                  <ul  class="list-group">

                    @foreach($joined_projects as $joined_project)
                      <li class="list-group-item">
                       <a href="projet/{{$joined_project->id}}"class="clickable-item">
                        <span class="number_header">Projet #{{$joined_project->id}}</span> ~
                        {{ $joined_project->title }}
                      </a>
                       
                        <div class="btn-group" style="float:right; position:relative; display:inline-block;">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="glyphicon glyphicon-option-horizontal" aria-hidden="true" style="float:right;"></span>
                              </button>
                              <ul class="dropdown-menu">
                                <li><a href="#">Inviter un membre</a></li>
                                <li><a href="/projet/{{$joined_project->id}}/quit">Quitter le projet</a></li>
                              </ul>

                            </div>

                           @if($joined_project->taches()->count() == $joined_project->tachesFinies()->count())
                                @if($joined_project->taches()->count() == 0)
                                   <span class="badge empty">Vide</span>
                                @else
                                   <span class="badge over">Terminé</span>
                                @endif
                            @else
                                 <span class="badge current">En cours</span>
                            @endif
                      </li>
                    @endforeach

                  </ul>
                  <div class="row">
                    <div class="col-md-10 col-md-offset-2">
                         {{$joined_projects->links()}}
                    </div>
                  </div>
                

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


