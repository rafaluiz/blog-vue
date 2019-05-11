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
            <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
              <div class="card-header border-0 pb-0">
                <div class="card-title text-center">
                <img src="{{url('assets/painel/images/logo/logo.png')}}" alt="logo" class="branding logo"/>
                </div>
                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                  <span>Nós lhe enviaremos um link para redefinir a senha.</span>
                </h6>
              </div>
              <div class="card-content">
                <div class="card-body">
                    {!! Form::open(['url' => '/password/email', 'class' => 'form-horizontal']) !!}

                    <fieldset class="form-group position-relative has-icon-left">

                      {!! Form::email('email', null, ['placeholder' => 'E-mail:', 'class'=>'form-control form-control-lg input-lg','id'=>'user-email' ]) !!}
                      <div class="form-control-position">
                        <i class="ft-mail"></i>
                      </div>
                    </fieldset>
                    <button type="button" onclick="goBack()" id="back-btn" class="btn btn-outline-info btn-outline btn-lg box-shadow-1">Back</button>
                    {!! Form::button('<i class="ft-unlock"></i> Recuperar',array('class'=>'btn btn-outline-info btn-lg pull-right box-shadow-1', 'type'=>'submit')) !!}
                    
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>
        {!! Form::close() !!}
      </section>
    </div>
  </div>
</div>
    @endsection


<script>
function goBack() {
  window.history.back();
}
</script>