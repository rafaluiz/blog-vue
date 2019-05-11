@extends('painel.templates.template')

@section('content')

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Usuário</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">  <a href="{{url('/painel')}}">Home </a></li>
                <li class="breadcrumb-item">  <a href="{{url('/painel/usuarios')}}">Usuários </a></li>
                <li class="breadcrumb-item">Deletar</li>
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
      <div class="col-xl-4 col-md-6 col-12">
              <div class="card">
                <div class="text-center">
                  <div class="card-body">
                    @if( auth()->user()->image != '' && file_exists(public_path('assets/uploads/users/'.$data->image)) )
                        <img class="rounded-circle  height-150" src="{{url('assets/uploads/users/'.$data->image)}}"
                             alt="{{$data->name}}" >
                    @else
                        <img class="rounded-circle  height-150" src="{{url('assets/painel/imgs/no-image.jpg')}}" alt="{{$data->name}}"
                          >
                    @endif
                  </div>
                  <div class="card-body">
                    <h4 class="card-title">{{$data->name}}</h4>
                  </div>
                  <div class="card-body">


                        {!! Form::open(['route' => ['usuarios.destroy', $data->id], 'class' => 'form form-search form-ds', 'method' => 'DELETE']) !!}
                            <div class="form-group">
                                {!! Form::button('<i class="la la-trash"></i> Deletar',array('class'=>'btn btn-danger box-shadow-1', 'type'=>'submit')) !!}
                            </div>
                        {!! Form::close() !!}

                  </div>
                </div>
                <div class="list-group list-group-flush">
                  <a href="#" class="list-group-item"><i class="la la-briefcase"></i> Overview</a>
                  <a href="#" class="list-group-item"><i class="ft-mail"></i> {{$data->email}}</a>
                  <a href="#" class="list-group-item"><i class="ft-check-square"></i> {{$data->facebook}}</a>
                  <a href="#" class="list-group-item"> <i class="ft-message-square"></i>{{$data->twitter}}</a>
                  <a href="#" class="list-group-item"> <i class="ft-message-square"></i>{{$data->github}}</a>
                  <a href="#" class="list-group-item"> <i class="ft-message-square"></i>{{$data->site}}</a>
                  <a href="#" class="list-group-item"> <i class="ft-message-square"></i>{{$data->bibliography}}</a>


              </div>
            </div>
    </div>
  </div>
</div>




@endsection
