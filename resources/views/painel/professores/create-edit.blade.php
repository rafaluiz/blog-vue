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
                                                 {!! Form::model($data, ['route' => ['professores.update', $data->id], 'class' => 'form', 'files' => true, 'method' => 'PUT']) !!}
                                             @else
                                                 {!! Form::open(['route' => 'professores.store', 'class' => 'form', 'files' => true]) !!}
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
                                                    <label>Matricula</label>
                                                  {!! Form::text('matricula', null, ['class' => 'form-control']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Data Nascimento</label>
                                                  {!! Form::text('datanascimento', null, ['class="form-control date-mask to-date" placeholder="dd/mm/aaaa"']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>Cep</label>
                                                  {!! Form::text('cep', null, ['class' => 'form-control']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>Logradouro</label>
                                                  {!! Form::text('logradouro', null, ['class' => 'form-control']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>Número</label>
                                                  {!! Form::text('numero', null, ['class' => 'form-control']) !!}
                                                </div>
                                              </div>
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>Complemento</label>
                                                  {!! Form::text('complemento', null, ['class' => 'form-control']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Bairro</label>
                                                  {!! Form::text('bairro', null, ['class' => 'form-control']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Cidade</label>
                                                  {!! Form::text('cidade', null, ['class' => 'form-control']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>UF</label>
                                                  {!! Form::text('uf', null, ['class' => 'form-control']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>Naturalidade</label>
                                                  {!! Form::text('naturalidade', null, ['class' => 'form-control']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>Nacionalidade</label>
                                                  {!! Form::text('nacionalidade', null, ['class' => 'form-control']) !!}
                                                </div>
                                              </div>
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>Sexo</label>
                                                  {!! Form::text('sexo', null,['class' => 'form-control']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Cpf</label>
                                                  {!! Form::text('cpf', null, ['class' => 'form-control']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Telefone</label>
                                                  {!! Form::text('telefone', null, ['class' => 'form-control']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>Telefone 2</label>
                                                  {!! Form::text('teleftwo', null, ['class' => 'form-control']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>celular</label>
                                                  {!! Form::text('celular', null, ['class' => 'form-control']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-12">
                                              <h4 class="form-section"><i class="la la-paperclip"></i> Requirementos</h4>
                                            </div>
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>Titulações</label>
                                                <select name="id_titulacoe" class="form-control">

                                                <option value="">Titulações</option>
                                                @foreach( $titulacoes as $mercadoria)
                                                <option value="{{$mercadoria->id}}"
                                                @if( isset($data->id_mercadoria) && $data->id_mercadoria == $mercadoria->id )
                                                selected
                                                @endif
                                                >{{$mercadoria->name}}</option>
                                                @endforeach
                                                  </select>
                                                </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label>Graduações</label>
                                                      {!! Form::text('graduacoes', null, ['class' => 'form-control']) !!}
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label>Pós-Graduações</label>
                                                      {!! Form::text('posgraduacoes', null, ['class' => 'form-control']) !!}
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label>Mestrado</label>
                                                      {!! Form::text('mestrado', null, ['class' => 'form-control']) !!}
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label>Doutorado</label>
                                                      {!! Form::text('doutorado', null, ['class' => 'form-control']) !!}
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label>Pós-Doutorado</label>
                                                      {!! Form::text('posdoutorado', null, ['class' => 'form-control']) !!}
                                                    </div>
                                                  </div>
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label>Observação</label>
                                                          {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                                                        </div>
                                                      </div>

                                            </div>

                                            <div class="form-actions right">
                                              <input type="hidden" name="tipo" value="professor"/>
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
