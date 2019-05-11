@extends('painel.templates.template')

@section('content')



  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">Dashboard</h3>
        </div>
      </div>
      <div class="content-body">
        <div class="row">

          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="align-self-center">
                      <i class="icon-user success font-large-2 float-left"></i>
                    </div>
                    <div class="media-body text-right">
                      <h3 class="success">{{$totalUser}}</h3>
                      <span>Total de Usuários</span>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>




          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="align-self-center">
                      <i class="icon-tag danger font-large-2 float-left"></i>
                    </div>
                    <div class="media-body text-right">
                      <h3 class="success">{{$totalCategories}}</h3>
                      <span>Total de Categorias</span>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>



            <div class="col-xl-3 col-lg-6 col-12">
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <div class="media d-flex">
                      <div class="align-self-center">
                        <i class="icon-note info font-large-2 float-left"></i>
                      </div>
                      <div class="media-body text-right">
                        <h3>{{$totalPosts}}</h3>
                        <span>Total de Posts</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>





            <div class="col-xl-3 col-lg-6 col-12">
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <div class="media d-flex">
                      <div class="align-self-center">
                        <i class="icon-speech warning font-large-2 float-left"></i>
                      </div>
                      <div class="media-body text-right">
                        <h3>{{$totalComments}}</h3>
                        <span>Total de Comentários</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>





            <div class="col-xl-3 col-lg-6 col-12">
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <div class="media d-flex">
                      <div class="align-self-center">
                        <i class="icon-users success font-large-2 float-left"></i>
                      </div>
                      <div class="media-body text-right">
                        <h3 class="success">{{$totalProfiles}}</h3>
                        <span>Total de Perfis</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <div class="col-xl-3 col-lg-6 col-12">
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <div class="media d-flex">
                      <div class="align-self-center">
                        <i class="icon-lock danger font-large-2 float-left"></i>
                      </div>
                      <div class="media-body text-right">
                        <h3 class="success">{{$totalPermissions}}</h3>
                        <span>Total de Permissões</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

      </div>
    </div>
  </div>







@endsection
