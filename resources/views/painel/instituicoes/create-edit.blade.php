@extends('painel.templates.template')

@section('content')

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Instituições</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/painel')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('/painel/instituicoes')}}">Instituições</a></li>

                @if( isset($user) )
                    <li class="breadcrumb-item">Edit</li>
                @else
                    <li class="breadcrumb-item">Add</li>
                @endif
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


                                               @if( isset($data) )

                                                  Editar
                                               @else
                                                  Novo
                                               @endif


                                             </h2>

                                             @if( isset($data) )
                                                 {!! Form::model($data, ['route' => ['instituicoes.update', $data->id], 'class' => 'form', 'files' => true, 'method' => 'PUT']) !!}
                                             @else
                                                 {!! Form::open(['route' => 'instituicoes.store', 'class' => 'form', 'files' => true]) !!}
                                             @endif
                                            <div class="row">

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>Nome</label>
                                                  {!! Form::text('name', null, ['class' => 'form-control']) !!}
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
