@include('painel.templates.head')


<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md">

<div class="page-wrapper">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">





      <!-- Fonts -->


      <!-- Styles -->

  </head>
  <body>
      <div id="app">
          <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
              <div class="container">
                  <a class="navbar-brand" href="{{ url('/') }}">
                      {{ config('app.name', 'Laravel') }}
                  </a>


                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <!-- Left Side Of Navbar -->
                      <ul class="navbar-nav mr-auto">

                      </ul>

                      <!-- Right Side Of Navbar -->
                      <ul class="navbar-nav ml-auto">
                          <!-- Authentication Links -->

                          <notifications>


                          </notifications>

                      </ul>
                  </div>
              </div>
          </nav>


      </div>
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
  </body>
  </html>

    @include('painel.templates.header')

    <div class="page-container">

        @include('painel.templates.siderbar')

        <div class="page-content-wrapper">

            <div class="page-content">
                @yield('content')


            </div>

        </div>



    </div>
