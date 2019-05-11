
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      <li class=" nav-item">
        <a href="{{url('/painel')}}">
          <i class="la la-home"></i>
          <span class="menu-title" data-i18n="nav.dash.main">Dashboard</span>
        </a>
      </li>


                      <li>
                          <a href="{{url('/painel/usuarios')}}">
                              <i class="la la-users"></i>
                              <span class="menu-title" data-i18n="nav.dash.main">Usuarios</span>
                          </a>
                      </li>


                  @can('categorias')
                      <li>
                          <a href="{{url('/painel/categorias')}}">
                            <i class="la la-tag"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">Categorias</span>
                          </a>
                      </li>
                  @endcan

                  @can('posts')
                      <li>
                          <a href="{{url('/painel/posts')}}">
                            <i class="la la-pencil-square"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">Post</span>
                          </a>
                      </li>
                  @endcan

                  @can('comments')
                      <li>
                          <a href="{{url('/painel/comentarios')}}">
                            <i class="la la-comment"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">Comentários</span>
                          </a>
                      </li>
                  @endcan

                  @can('perfis')
                      <li>
                          <a href="{{url('/painel/perfis')}}">
                            <i class="la la-users"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">Perfil</span>
                          </a>
                      </li>
                  @endcan

                  @can('permissions')
                      <li>
                          <a href="{{url('/painel/permissoes')}}">
                            <i class="la la-lock"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">Permissões</span>
                          </a>
                      </li>
                  @endcan


                      <li>
                          <a href="{{url('/painel/alunos')}}">
                            <i class="la la-lock"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">Alunos</span>
                          </a>
                      </li>

                      <li>
                          <a href="{{url('/painel/professores')}}">
                            <i class="la la-lock"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">Professores</span>
                          </a>
                      </li>
                      <li>
                          <a href="{{url('/painel/instituicoes')}}">
                            <i class="la la-lock"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">Instituições</span>
                          </a>
                      </li>
                      <li>
                          <a href="{{url('/painel/cursos')}}">
                            <i class="la la-lock"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">Cursos</span>
                          </a>
                      </li>
                      <li>
                          <a href="{{url('/painel/tarefas')}}">
                            <i class="la la-lock"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">Tarefas</span>
                          </a>
                      </li>


    </ul>

  </div>
</div>
