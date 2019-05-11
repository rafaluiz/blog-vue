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
                                  <li class="breadcrumb-item">Perfil</li>
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

                                        </div>
                                        {{$title}}

                                  </div>
                                  </div>

                                  </div>

                                    {!! Form::open(['route' => 'professores.users.add', 'class' => 'form', 'files' => true]) !!}
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
                                <div class="form-actions right">
                                    <input type="hidden" value="{{$professor_id}}" name="professor_id"/>                                  
                                  {!! Form::button('<i class="la la-check-square-o"></i> Registrar',array('class'=>'btn btn-success box-shadow-1', 'type'=>'submit')) !!}
                                </div>

                  </div>

                  </div>

                  </div>





                  @endsection
