@if(Session::has('giris_admin'))

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Laravel E-Ticaret | Admin Paneli </title>
    
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArYy8P8l1dSCKC6QY5yfafrHAFaesK1hA"></script>

    <script src="{{ asset('xcrud/editors/ckeditor/ckeditor.js') }}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href='{{ asset("/ckadmin") }}' style="padding-left:0px;" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="{{ asset('dist/img/adminlogo-small.png') }}" alt="<b>Ç</b>K"></span>
          <!-- logo for regular state and mobile devices -->
          <img src="{{ asset('dist/img/adminlogo.png') }}">
          <span class="logo-lg row"><b>LARAVEL E-TİCAET</b>ALİ ARSLAN</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- Notifications: style can be found in dropdown.less -->

              <!-- Tasks: style can be found in dropdown.less -->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                  <span class="hidden-xs">Administrator</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                    <p>
                      Laravel E-Ticaret
                      <small>www.siteadi.com.tr</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
					
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a target="_blank" href='{{ asset("/") }}' class="btn btn-default btn-flat">Sayfayı Görüntüle</a>
                    </div>
                    <div class="pull-right">
                      <a href='{{ asset("ckadmin/cikis") }}' class="btn btn-default btn-flat">Çıkış Yap</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
             
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Administrator</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online </a>
            </div>
          </div>
          <!-- search form 
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
         /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href='{{ asset("/ckadmin") }}'><i class="fa fa-dashboard"></i> <span> Admin Anasayfa</span></a></li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-cog"></i> <span> İçerik Yönetimi </span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href='{{ asset("ckadmin/urun-kategori-yonetimi") }}'><i class="fa fa-circle-o"></i> <span> Sitedeki Ürün Kategorileri </span></a></li>
                <li><a href='{{ asset("ckadmin/urun-alt-kategori-yonetimi") }}'><i class="fa fa-circle-o"></i> <span> Ürün Alt Kategorileri </span></a></li>
                <li><a href='{{ asset("ckadmin/urun-yonetimi") }}'><i class="fa fa-circle-o"></i> <span> Sitedeki Ürün Listesi </span></a></li>
                <li><a href='{{ asset("ckadmin/siparisler") }}'><i class="fa fa-circle-o"></i> <span> Siparişler </span></a></li>
                <li><a href='{{ asset("ckadmin/slider-yonetimi") }}'><i class="fa fa-circle-o"></i> Manşet Görseller </a></li>
                <li><a href='{{ asset("ckadmin/kurumsal-sayfa-yonetimi") }}'><i class="fa fa-circle-o"></i> Site İçerikleri </a></li>
                <li><a href='{{ asset("ckadmin/iletisim-bilgileri") }}'><i class="fa fa-circle-o"></i> İletişim Bilgileri </a></li>
              </ul>
            </li>
			<!--
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-newspaper-o"></i> <span> Haber Yönetimi </span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href='{{ asset("ckadmin/blog-kategorileri") }}'><i class="fa fa-newspaper-o"></i> Haber Kategorileri </a></li>
                <li><a href='{{ asset("ckadmin/blog-icerikleri") }}'><i class="fa fa-newspaper-o"></i> Haber İçerikleri </a></li>
              </ul>
            </li>
			-->
            <li><a href='{{ asset("ckadmin/kullanici-yonetimi") }}'><i class="fa fa-user"></i> <span> Kayıtlı Kullanıcılar </span></a></li>
            <li><a href='{{ asset("ckadmin/cikis") }}'><i class="fa fa-sign-out"></i> <span> Çıkış Yap </span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->

            <!-- jQuery 2.1.4 -->
    <script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
       
       @yield('admin_header')

        <!-- Main content -->
        <section class="content">
         
         @yield('admin_content')

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2010-2017 <a target="_blank" href="#">LARAVEL E-TİCARET ALİ ARSLAN</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      
    </div><!-- ./wrapper -->

    <!-- Morris.js charts -->	
    <script src="{{ asset('dist/js/app.min.js') }}"></script>

  </body>
</html>

@else
   Admin giriş sayfasına yönlendiriliyorsunuz...
   <?php header("Refresh:0; url=ckadmin/giris"); ?>
@endif