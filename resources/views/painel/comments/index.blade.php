@extends('painel.templates.template')

@section('content')

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Comentários</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">  <a href="{{url('/painel')}}">Home </a></li>
                <li class="breadcrumb-item">Comentários</li>
              </ol>
            </div>
          </div>
        </div>
    </div>


        @if( Session::has('success') )
            <div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2" role="alert">
                                      <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                      </button>
                                        {{Session::get('success')}}
                                    </div>
        @endif

    <div class="content-body">
      <div class="card">


                <div class="card-header">


                  <div class="card-header">
                    <div class="row">
                          <div class="col-md-12 col-12" style=" padding-right: 0px !important; padding-left: 0px !important;" >
                            {!! Form::open(['route' => 'comments.search', 'class' => 'form form-inline']) !!}
                              {!! Form::text('key-search', isset($dataForm['key-search']) ? $dataForm['key-search'] : null, ['class' => 'form-control', 'placeholder' => 'Nome:']) !!}
                              {!! Form::select('status', ['R' => 'Rascunhos', 'A' => 'Respondidos'], isset($dataForm['status']) ? $dataForm['status'] : null , ['class' => 'form-control']) !!}
                            {!! Form::button('<i class="la la-search"></i> Filtrar ',array('class'=>'btn btn-info box-shadow-1 ', 'type'=>'submit')) !!}
                          </div>

                    {!! Form::close() !!}
                    </div>
                  </div>
                </div>


                <div class="card-content">
                  <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped  table-middle">
                        <thead>
                          <tr class="uppercase">
                              <th colspan="2"> Nome</th>
                              <th> Comentário</th>
                              <th> Ações</th>
                          </tr>
                        </thead>

                        <tbody>

                        @forelse($data as $v)
                            <tr>
                                <td>
                                   {{$v->name}}
                                </td>
                                <td>{{$v->name}}</td>
                                <td>{{$v->description}}</td>
                                <td>
                                  <a href="{{url("/painel/comentario/{$v->id}/respostas")}}" class="delete"><i class="fa fa-reply-all" aria-hidden="true"></i> Responder</a>
                                </td>

                            </tr>
                        @empty
                            <p>Nenhum Comentário Para Responder</p>
                        @endforelse


                        </tbody>
                    </table>


                    @if( isset($dataForm) )
                        {!! $data->appends($dataForm)->links() !!}
                    @else
                        {!! $data->links() !!}
                    @endif


                </div>

                  </div>

                </div>

              </div>

</div>

</div>

</div>


@endsection
