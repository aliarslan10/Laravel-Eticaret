@extends('master')
@section('content')

<!-- kurumsal_tema ve kurumsal_arayuz Özel CSS -->
<link href="{{ asset('css/sepet.css') }}" rel="stylesheet">

<div class="breadcrumb">
  <div class="container">
    <a href="{{asset('')}}">Anasayfa</a>
    <i class="glyphicon glyphicon-chevron-right"></i> <a href="{{asset('kullanici-paneli')}}">Sepet İşlemleri</a>
	<i class="glyphicon glyphicon-chevron-right"></i> @yield('breadcrumb')
</div>
</div>

<div class="icerik">
<div class="container">


<div class="col-md-3 col-sm-3 col-xs-12 menualanimobil">
<div class="menualani">
	<div class="menubaslik">
  		<h3> @yield('sepet_menu_baslik') </h3>
	</div>
	<div class="menu">
  		@yield('sepet_menu')
	</div>
</div>
</div>

<div class="col-md-9 col-sm-9 col-xs-12 yazialani">
	<div class="yazibaslik">
  		@yield('sepet_baslik')
	</div>
	<div class="yazi">
  		@yield('sepet_yazi')
	</div>
</div>

</div>
</div>
@stop