@extends('painel.templates.template')

@section('content')
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Post</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/painel')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('/painel/posts')}}">Post</a></li>

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
                                                 {!! Form::model($data, ['route' => ['posts.update', $data->id], 'class' => 'form', 'files' => true, 'method' => 'PUT']) !!}
                                             @else
                                                 {!! Form::open(['route' => 'posts.store', 'class' => 'form', 'files' => true]) !!}
                                             @endif
                                            <div class="row">

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>Título</label>
                                                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                                                </div>
                                              </div>
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                      <label>Sub-Título</label>
                                                      <div class="input-group">
                                                        {!! Form::text('subtitle', null, ['class' => 'form-control']) !!}

                                                      </div>

                                                  </div>

                                              </div>
                                            </div>
                                            <div class="row">
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Url</label>
                                                    {!! Form::text('url', null, [ 'class' => 'form-control']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>Categoria</label>
                                                  {!! Form::select('category_id', $categories, null, ['class' => 'form-control edited']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Data</label>
                                                  {!! Form::date('date', null, ['class' => 'form-control']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                      <label>Hora</label>
                                                      {!! Form::time('hour', null, ['class' => 'form-control']) !!}
                                                </div>
                                              </div>

                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                  {!! Form::select('status', ['A' => 'Ativo', 'R' => 'Rascunho'], null, ['class' => 'form-control']) !!}


                                                </div>
                                              </div>
                                              <div class="col-md-6">
  <label>Imagem</label>
                    <fieldset class="form-group">

                      <div class="custom-file">
                          {!! Form::file('image', ['class' => 'custom-file-input', 'id'=>'inputGroupFile01']) !!}
                        <label class="custom-file-label" for="inputGroupFile01">Selecionar Arquivo</label>
                      </div>
                    </fieldset>
                                              </div>

                                              <div class="col-md-12">
                                                <div class="form-group">
                                                  <label>Descrição</label>
                                                  {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
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
