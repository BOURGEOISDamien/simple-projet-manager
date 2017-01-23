@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="" style="font-size:1.8rem;">Projet #{{ $projet->id }} ~ {{ $projet->title }}</span>
                    <button type="button" class="btn custom-button" style="float:right; padding:3px 12px !important;" name="button">
                        Ajouter
                    </button>
                </div>
 
                <div class="panel-body">
                  <ul  class="list-group">
                    @foreach($projet->taches as $tache)

                          <li class="list-group-item">
                            <div class="task-display" style="position:relative; display:inline-block; width:72%;">
                              <span class="number_header">Tache #{{$projet->taches->search($tache)+1}}</span> ~ {{ $tache->title }}
                            </div>
                            <div class="usertag" style="position:relative;display:inline-block;">{{'@'.$tache->user->username}}</div>
                            <span class="glyphicon glyphicon-option-horizontal" aria-hidden="true" style="float:right;"></span>
                            <a href="{{URL::to('/')}}/tache/{{$tache->id}}/toggle">
                              <span class="glyphicon glyphicon-ok
                              @if($tache->done)
                                  task--done
                              @else
                                  task
                              @endif
                              " aria-hidden="true" style="float:right; margin-right:20px;"></span>
                            </a>
                          </li>
                      

                    @endforeach

                  </ul>
                </div>
            </div>
</div>
<div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="" style="font-size:1.8rem;">Participants</span>
                    <button type="button" data-toggle="modal" data-target="#invitation" class="btn custom-button" style="float:right; padding:3px 12px !important;" name="button">
                        Inviter
                    </button>
                </div>
                <div class="panel-body">
                  <ul class="list-group">
                          <li class="list-group-item creator">
                            <span class="usertag"> {{ '@'.$projet->user->username }}</span>
                            <span class="glyphicon glyphicon-option-horizontal" aria-hidden="true" style="float:right;"></span>
                            <span class="badge" style="float:right; margin-right:15px;">{{ $projet->user->taches()->where('projet_id', $projet->id)->count() }}</span>
                          </li>
                    @foreach($projet->participating_users as $user)
              
                          <li class="list-group-item">
                            <span class="usertag"> {{ '@'.$user->username }}</span>
                            <span class="glyphicon glyphicon-option-horizontal" aria-hidden="true" style="float:right;"></span>
                            <span class="badge" style="float:right; margin-right:15px;">{{ $user->taches()->where('projet_id', $projet->id)->count() }}</span>
                          </li>
                    
                    @endforeach
                  </ul>


                </div>
            </div>
        </div>
    </div>
</div>



<div id="invitation" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Inviter une personne à participer au projet</h4>
      </div>
      <div class="modal-body">
        <p>{{URL::to('/').'/join/'.$projet->inviteURL}}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn custom-button" data-dismiss="modal">Retour</button>
      </div>
    </div>

  </div>
</div>
@endsection
