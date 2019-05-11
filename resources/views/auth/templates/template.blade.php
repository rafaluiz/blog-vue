<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <title>Painel | Cloudmidia</title>  
  <link rel="apple-touch-icon" href="{{url('assets/images/ico/apple-icon-120.png')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{url('assets/images/ico/apple-icon-120.png')}}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  {{ Html::style('assets/painel/css/vendors.css') }}
  {{ Html::style('assets/painel/vendors/css/forms/icheck/icheck.css') }}
  {{ Html::style('assets/painel/vendors/css/forms/icheck/custom.css') }}
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  {{ Html::style('assets/painel/css/app.css') }}
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  {{ Html::style('assets/painel/css/core/menu/menu-types/vertical-menu-modern.css') }}
  {{ Html::style('assets/painel/css/core/colors/palette-gradient.css') }}
  {{ Html::style('assets/painel/css/pages/login-register.css') }}
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  {{ Html::style('assets/painel/css/style.css') }}
  <!-- END Custom CSS-->
</head>



<body class="vertical-layout vertical-menu-modern 1-column   menu-expanded blank-page blank-page"
data-open="click" data-menu="vertical-menu-modern" data-col="1-column">



    @if( isset($errors) && count($errors) > 0 )
        <div class="alert alert-warning">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

    @yield('content-login')





<!-- BEGIN VENDOR JS-->
{{ Html::script('assets/painel/vendors/js/vendors.min.js')}}
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
{{ Html::script('assets/painel/vendors/js/forms/icheck/icheck.min.js')}}
{{ Html::script('assets/painel/vendors/js/forms/validation/jqBootstrapValidation.js')}}
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
{{ Html::script('assets/painel/js/core/app-menu.js')}}
{{ Html::script('assets/painel/js/core/app.js')}}
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
{{ Html::script('assets/painel/js/scripts/forms/form-login-register.js')}}
<!-- END PAGE LEVEL JS-->
</body>
</html>
