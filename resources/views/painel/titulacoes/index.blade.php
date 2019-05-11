@extends('painel.templates.template')

@section('content')

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Titulações</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">  <a href="{{url('/painel')}}">Home </a></li>
                <li class="breadcrumb-item">Titulações</li>
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
                      <div class="col-md-3 col-2" style="margin-bottom: 20px !important;">
                        <a href="{{route('titulacoes.create')}}" class="btn btn-success btn-min-width box-shadow-1 "><i class="ft-plus "></i> Adicionar</a>
                      </div>

                  <div class="col-md-9">
                    {!! Form::open(['route' => 'titulacoes.search', 'class'=>'']) !!}

                          <div class="row">
                            <div class="col-md-9 col-9" style=" padding-right: 0px !important; padding-left: 0px !important;" >
                          {!! Form::text('key-search', null, ['class' => 'form-control ',   'placeholder'=>'Pesquisar...']) !!}
                            </div>
                            <div class="col-md-2 col-2" style=" padding-right: 0px !important; padding-left: 0px !important;">
                          {!! Form::button('<i class="la la-search"></i> Pesquisar ',array('class'=>'btn btn-info box-shadow-1 ', 'type'=>'submit')) !!}
                            </div>
                          </div>

                    {!! Form::close() !!}
                  </div>
                </div>
                </div>

                </div>


                <div class="card-content">
                  <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped  table-middle">
                        <thead>
                          <tr class="uppercase">
                              <th > Nome</th>
                              <th > </th>
                              <th> Ações</th>
                          </tr>
                        </thead>

                        <tbody>

                        @forelse($data as $v)
                            <tr>

                                <td>
                                    {{$v->name}}
                                </td>
                                <td>
                                </td>
                                <td>
                                    {!! Form::open(['route' => ['titulacoes.destroy', $v->id], 'class' => '','onsubmit' => 'return confirmDelete()',  'method' => 'DELETE']) !!}
                                    <div class="btn-group" role="group">
                                        <a href='{{route('titulacoes.edit', $v->id)}}' class="btn  btn-info btn-sm">
                                            <i class="la la-pencil-square"></i> </a>
                                        {!! Form::button('<i class="la la-trash"></i> ',array('class'=>'btn  btn-danger btn-sm', 'type'=>'submit')) !!}
                                    </div>
                                    {!! Form::close() !!}

                                    </div>
                                </td>

                            </tr>
                        @empty
                            <p>Nenhum Registro Encontrado</p>
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


<script>

    function confirmDelete() {
        var result = confirm('Você deseja Realmente Deletar? ');

        if (result) {
            return true;
        } else {
            return false;
        }
    }
</script>
