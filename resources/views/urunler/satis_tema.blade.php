@extends('master')
@section('content')

<!-- urunler_tema ve urunler_arayuz Özel CSS -->
<link href="{{ asset('css/eticaret.css') }}" rel="stylesheet">

<div class="breadcrumb">
  <div class="container">
    <a href="{{asset('/')}}">Anasayfa</a>
    <i class="glyphicon glyphicon-chevron-right"></i> <a href="{{asset('/urunlerimiz')}}">Ürünlerimiz</a>
	<i class="glyphicon glyphicon-chevron-right"></i> @yield('breadcrumb')
</div>
</div>

<div class="icerik">
<div class="container">
	<div class="col-sm-12">
	  	@yield('satis_alani')
	</div>

	<div class="col-sm-12">
		@yield('satis_detaylari')
	</div>
</div>
</div>
@stop