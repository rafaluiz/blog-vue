@extends('painel.templates.template')

@section('content')

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Usuários</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/painel')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('/painel/usuarios')}}">Usuários</a></li>

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
                                                 {!! Form::model($data, ['route' => ['usuarios.update', $data->id], 'class' => 'form', 'files' => true, 'method' => 'PUT']) !!}
                                             @else
                                                 {!! Form::open(['route' => 'usuarios.store', 'class' => 'form', 'files' => true]) !!}
                                             @endif
                                            <div class="row">

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>Nome</label>
                                                  {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                                </div>
                                              </div>
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                      <div class="input-group">

                                                        <div class="input-group-prepend">
                                                          <span class="input-group-text" id="basic-addon3"><i class="la la-envelope"></i></span>
                                                        </div>

                                                          {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                                      </div>

                                                  </div>

                                              </div>
                                            </div>
                                            <div class="row">
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Senha</label>
                                                  {!! Form::password('password', [ 'class' => 'form-control']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>Confirmar Senha</label>
                                                  {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Facebook</label>
                                                  {!! Form::text('facebook', null, ['class' => 'form-control']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Twitter</label>
                                                  {!! Form::text('twitter', null, ['class' => 'form-control']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>GitHub</label>
                                                  {!! Form::text('github', null, ['class' => 'form-control']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>Site</label>
                                                  {!! Form::text('site', null, ['class' => 'form-control']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>Bibliografia</label>
                                                  {!! Form::textarea('bibliography', null, ['class' => 'form-control']) !!}
                                                </div>
                                              </div>



                                              <div class="col-md-6">

                                                <div class="card-block">
                  <div class="card-body">
                    <fieldset class="form-group">
                      <div class="custom-file">
                          {!! Form::file('image', ['class' => 'custom-file-input', 'id'=>'inputGroupFile01']) !!}
                        <label class="custom-file-label" for="inputGroupFile01">Selecionar Arquivo</label>
                      </div>
                    </fieldset>
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
