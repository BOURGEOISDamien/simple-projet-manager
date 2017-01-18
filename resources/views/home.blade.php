@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-6 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="" style="font-size:20px;">Projets créés par {{Auth::user()->username}}</span>
                    <button type="button" class="btn btn-default" style="float:right;" name="button">
                        Ajouter
                    </button>
                </div>

                <div class="panel-body">
                  <ul  class="list-group">
                    @foreach($created_projects as $created_project)
                      <li class="list-group-item">
                        <span class="number_header">Projet #{{$created_project->id}}</span> ~
                        {{ $created_project->title }}

                      </li>
                    @endforeach

                  </ul>
                </div>
            </div>
</div>
<div class="col-md-6 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="" style="font-size:20px;">Projets auquels {{Auth::user()->username}} participe</span>

                </div>

                <div class="panel-body">
                  <ul  class="list-group">

                    @foreach($joined_projects as $joined_project)
                      <li class="list-group-item">
                        <span class="number_header">Projet #{{$joined_project->id}}</span> ~
                        {{ $joined_project->title }}

                      </li>
                    @endforeach

                  </ul>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
