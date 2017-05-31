@extends('master')
@section('content')

<!-- ik_tema ve ik_arayuz Özel CSS -->
<link href="{{ asset('css/ik.css') }}" rel="stylesheet">

<div class="bosluk100"></div>

<div class="breadcrumb">
  <div class="container">
    <a href="{{asset('')}}">Anasayfa</a>
    <i class="glyphicon glyphicon-chevron-right"></i> <a href="{{asset('insan-kaynaklari')}}">İnsan Kaynakları</a>
	<i class="glyphicon glyphicon-chevron-right"></i> @yield('breadcrumb')
</div>
</div>

<div class="icerik">
<div class="container">
	<div class="col-sm-9 yazialani">
		<div class="col-sm-12 yazibaslik">
	  		@yield('ik_baslik')
		</div>
		<div class="col-sm-12 yazi">
	  		@yield('ik_yazi')
		</div>
	</div>

	<div class="col-sm-3 menualanimobil">
	<div class="menualani">
		<div class="menubaslik">
	  		<h3> @yield('ik_menu_baslik') </h3>
		</div>
		<div class="menu">
	  		@yield('ik_menu')
		</div>
	</div>
	</div>
</div>
</div>
@stop