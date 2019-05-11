@extends('auth.templates.template')

@section('content-login')

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <section class="flexbox-container">
            <div class="col-12 d-flex align-items-center justify-content-center">
              <div class="col-md-4 col-10 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 m-0">
                  <div class="card-header border-0">
                    <div class="card-title text-center">
                      <div class="p-1">
                        <img src="{{url('assets/painel/images/logo/logo.png')}}" alt="logo" class="branding logo"/>
                      </div>
                    </div>
                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                      <span>Login</span>
                    </h6>
                  </div>
                  <div class="card-content">
                    <div class="card-body">

                            {!! Form::open(['url' => '/password/reset', 'class' => 'login-form']) !!}
                              {!! Form::hidden('token', $token) !!}
                              <fieldset class="form-group position-relative has-icon-left mb-0">
            {!! Form::email('email', null, ['placeholder' => 'E-mail:', 'class'=>'form-control form-control-lg input-lg']) !!}
    <div class="form-control-position">
      <i class="ft-user"></i>

                              </fieldset>
                              <fieldset class="form-group position-relative has-icon-left">
    {!! Form::password('password', ['placeholder' => 'Senha:', 'class'=>'form-control form-control-lg input-lg']) !!}
    {!! Form::password('password_confirmation', ['placeholder' => 'Senha:', 'class'=>'form-control form-control-lg input-lg]) !!}
                                <div class="form-control-position">
                                  <i class="la la-key"></i>
                              </fieldset>
                                {!! Form::submit('Resetar', ['class' => 'btn btn-info btn-lg btn-block']) !!}
                                <i class="ft-unlock"></i>

    {!! Form::close() !!}

                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="">
                        <p class="float-sm-left text-center m-0">
                            <a href="{{ url('/login') }}" id="back-btn" class="btn green btn-outlines">Login?</a>
                        </p>
                      <!--   <p class="float-sm-right text-center m-0">New to Moden Admin? <a href="register-simple.html" class="card-link">Sign Up</a></p> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>


@endsection
