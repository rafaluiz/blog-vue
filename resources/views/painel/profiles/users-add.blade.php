@extends('painel.templates.template')

@section('content')

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Perfil</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/painel')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('/painel/perfis')}}">Perfil</a></li>
                <li class="breadcrumb-item">
                    <a href="{{route('profile.users', $profile->id)}}">  Usuários Vinculados </a>
                </li>

                <li class="breadcrumb-item">
                    {{$profile->name}}
                </li>
              </ol>
            </div>
          </div>
        </div>
    </div>

    @if( isset($errors) && count($errors) > 0 )
        <div class="alert alert-warning">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

    <div class="content-body">
      <div class="card">
                <div class="card-content">
                  <div class="card-body">

                                          <div class="form-body">
                                            <h2 class="form-section">


                                              Adicionar Novos Usuários ao Perfil:<b>{{$profile->name}}</b>


                                             </h2>


                                             {!! Form::open(['route' => ['profile.users.add', $profile->id], 'class' => 'form']) !!}


                                            <div class="row">

                                              <div class="col-md-6">
                                                <div class="form-group">

                                                  <div class="md-checkbox-inline">
                                                      @foreach( $users as $user )
                                                      <div class="md-checkbox">
                                                          {{ Form::checkbox('users[]', $user->id, null,['class' => 'md-check', 'id'=> $user->id]) }}
                                                          <label for="{{$user->id}}">
                                                              <span class="inc"></span>
                                                              <span class="check"></span>
                                                              <span class="box"></span>  {{ $user->name }}</label>
                                                      </div>
                                                      @endforeach
                                                  </div>
                                                </div>
                                              </div>

                                            </div>


                                            <div class="form-actions right">
                                              {!! Form::button('<i class="la la-check-square-o"></i> Registrar',array('class'=>'btn btn-success box-shadow-1', 'type'=>'submit')) !!}

                                            </div>

                                          </div>

                                      {!! Form::close() !!}
                  </div>
                </div>
      </div>
    </div>
  </div>
</div>




@endsection
