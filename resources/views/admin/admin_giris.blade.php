<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
	<title> Admin Girişi </title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/style-responsive.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/themes/default.css') }}" rel="stylesheet" id="style_color" />
  <link href="{{ asset('assets/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css" />
  <link href="#" rel="stylesheet" id="style_metro" />
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN PAGE LEVEL STYLES -->  
  <link href="{{ asset('assets/css/pages/login.css') }}" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL STYLES -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body>
  <!-- BEGIN LOGO -->
  <div id="logo" class="center">
    <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="center" /> 
  </div>
  <!-- END LOGO -->
  <!-- BEGIN LOGIN -->
  <div id="login">
    <!-- BEGIN LOGIN FORM -->
    {{ Form::open(['action'=>'AdminGoruntuleController@Login', 'id'=>'loginform', 'class'=>'form-vertical no-padding no-margin', 'method'=>'POST']) }}
      <p class="center">Kullanıcı Adınızı ve şifrenizi yazınız.</p>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-user"></i></span>
			{{ Form::text('kullanici_adi','',array('placeholder'=>'Kullanıcı Adı','required' => 'required')) }}
          </div>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-lock"></i></span>
			{{ Form::password('sifre','',array('placeholder'=>'Şifre','required' => 'required')) }}
          </div>
        </div>
      </div>
      <div class="control-group remember-me">
        <div class="controls">
          <a href="javascript:;" class="pull-right" id="forget-password"></a>
        </div>
      </div>
      <input type="submit" id="login-btn" class="btn btn-block btn-inverse" value="GİRİŞ" name="giris" />
    {{ Form::close() }}
    <!-- END LOGIN FORM -->        
    <!-- BEGIN FORGOT PASSWORD FORM -->
    {{ Form::open(['action'=>'AdminController@sifremiUnuttum', 'id'=>'forgotform', 'class'=>'form-vertical no-padding no-margin hide']) }}
      <p class="center">Lütfen sistemde kayıtlı mail adresinizi yazınız.</p>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-envelope"></i></span><input id="input-email" type="text" placeholder="E-mail Adresiniz" />
          </div>
        </div>
        <div class="space10"></div>
      </div>
      <input type="button" id="forget-btn" class="btn btn-block btn-inverse" value="GÖNDER"  name="unuttum" />
    {{ Form::close() }}
    <!-- END FORGOT PASSWORD FORM -->
  </div>
  <!-- END LOGIN -->
  <!-- BEGIN COPYRIGHT -->
  <div id="login-copyright">
       
ALİ ARSLAN LARAVEL E-TİCARET © Tüm Hakları Saklıdır.
  </div>
  <!-- END COPYRIGHT -->
  <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
  <!-- BEGIN CORE PLUGINS -->
  <script src="{{ asset('assets/plugins/jquery-1.8.3.min.js') }}" type="text/javascript"></script> 
  <!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->  
  <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>    
  <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
  <!--[if lt IE 9]>
  <script src="assets/plugins/excanvas.js"></script>
  <script src="assets/plugins/respond.js"></script> 
  <![endif]-->  
  <script src="{{ asset('assets/plugins/breakpoints/breakpoints.js') }}" type="text/javascript"></script>  
  <script src="{{ asset('assets/plugins/jquery.blockui.js') }}" type="text/javascript"></script> 
  <script src="{{ asset('assets/plugins/jquery.cookie.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript" ></script>  
  <!-- END CORE PLUGINS -->
  <!-- BEGIN PAGE LEVEL SCRIPTS -->
  <script src="{{ asset('assets/scripts/app.js') }}"></script>
  <script src="{{ asset('assets/scripts/login.js') }}"></script> 
  <!-- END PAGE LEVEL SCRIPTS --> 
  <script>
    jQuery(document).ready(function() {     
      // initiate layout and plugins
      App.init();
      Login.init();
    });
  </script>
  <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>