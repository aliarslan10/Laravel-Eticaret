@extends('master')
@section('content')

<!-- hizmetler_tema ve hizmetler_arayuz Özel CSS -->
<link href="{{ asset('css/hizmetler.css') }}" rel="stylesheet">

<div class="breadcrumbx">
  <div class="container">
    <a href="{{asset('/')}}">Anasayfa</a>
    <i class="glyphicon glyphicon-chevron-right"></i> <a href="{{asset('/hizmetlerimiz')}}">Hizmetlerimiz</a>
	<i class="glyphicon glyphicon-chevron-right"></i> @yield('breadcrumb')
</div>
</div>

<div class="icerik">
<div class="container">
	<div class="col-sm-9 yazialani">
		<div class="col-sm-12 yazibaslik">
	  		@yield('yazi_baslik')
		</div>
		<div class="col-sm-12 yazi">
	  		@yield('yazi')
		</div>
	</div>

	<div class="col-sm-3 menualanimobil">
	<div class="menualani">
		<div class="menubaslik">
	  		<h3> @yield('menu_baslik') </h3>
		</div>
		<div class="menu">
	  		@yield('menu')
		</div>
	</div>
	</div>
</div>
</div>
@stop