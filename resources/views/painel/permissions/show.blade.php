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
                <li class="breadcrumb-item">  <a href="{{url('/painel')}}">Home </a></li>
                <li class="breadcrumb-item">  <a href="{{url('/painel/perfis')}}">Perfil </a></li>
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

                  </div>
                  <div class="card-body">

                    <h2><strong>Perfil :</strong> {{$data->name}}</h2>
                    <h2><strong>Descirção :</strong> {{$data->label}}</h2>
                  </div>
                  <div class="card-body">


                        {!! Form::open(['route' => ['permissoes.destroy', $data->id], 'class' => 'form form-search form-ds', 'method' => 'DELETE']) !!}
                            <div class="form-group">
                                {!! Form::button('<i class="la la-trash"></i> Deletar',array('class'=>'btn btn-danger box-shadow-1', 'type'=>'submit')) !!}
                            </div>
                        {!! Form::close() !!}

                  </div>
                </div>
            </div>
    </div>
  </div>
</div>

@endsection
