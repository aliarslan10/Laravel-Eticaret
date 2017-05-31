@extends('eticaret.eticaret_arayuz')

@section('desc') Teslimat Bilgileri @stop
@section('sayfatitle') Teslimat Bilgileri @stop
@section('breadcrumb') Teslimat Bilgileri @stop	
@section('baslik') Teslimat Bilgileri   @stop

@section('sepet_yazi')

@if(Session::get('mailadress') != "")
	<center>
		<h2><i style="color:green;" class="fa fa-check-circle fa-5x"></i></h2>
		<h2>Siparişiniz başarıyla tamamlandı.</h2> <br>
		<h4><b>{{ Session::get('mailadress') }}</b> adresinize gönderdiğimiz bilgiler ile siparişinizi takip edebilirsiniz.</h4>
	</center>

	{{ Session::forget('sepet') }}
	{{ Session::forget('sepet_odeme') }}
	{{ Session::forget('orderCode') }}
	{{ Session::forget('mailadress') }}

@else
	@if(Session::has('orderCode'))
	<center>
		<h2><i style="color:green;" class="fa fa-check-circle fa-5x"></i></h2>
		<h2>Siparişiniz başarıyla tamamlanamadı.</h2>
		<h3><b> {{ Session::get('orderCode') }}</b> sipariş koduyla siparişinizi takip edebilirsiniz.</h3>
	</center>


	{{ Session::forget('sepet') }}
	{{ Session::forget('sepet_odeme') }}
	{{ Session::forget('orderCode') }}
	{{ Session::forget('mailadress') }}


	@else
	<?php header("Refresh:0; url=404");?>
	@endif
@endif

@stop