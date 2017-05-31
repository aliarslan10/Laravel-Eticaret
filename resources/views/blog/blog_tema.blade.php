@extends('master')
@section('content')

<!-- blog_tema ve blog_arayuz Özel CSS -->
<link href="{{ asset('css/blog.css') }}" rel="stylesheet">

<div class="breadcrumb">
  <div class="container">
    <a href="{{asset('')}}">Anasayfa</a>
    <i class="glyphicon glyphicon-chevron-right"></i> <a href="{{asset('haberler')}}">Haberler</a>
	<i class="glyphicon glyphicon-chevron-right"></i> @yield('breadcrumb')
</div>
</div>

<div class="icerik">
<div class="container">
	<div class="col-sm-9 yazialani">
		<div class="col-sm-12 yazibaslik">
	  		@yield('blog_yazi_baslik')
		</div>
		<div class="col-sm-12 yazi">
	  		@yield('blog_yazi')
		</div>
	</div>

	<div class="col-sm-3 menualanimobil">
	<div class="menualani">
		<div class="menubaslik">
	  		<h3> @yield('blog_menu_baslik') </h3>
		</div>
		<div class="menu">
	  		@yield('blog_menu')
		</div>
	</div>
	</div>
</div>
</div>
@stop