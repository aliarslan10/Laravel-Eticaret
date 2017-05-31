@extends('icerik_tasarim1')
@section('desc') Arama Sonuçları @stop
@section('sayfatitle') Arama Sonuçları @stop
@section('breadcrumb') Arama Sonuçları @stop
@section('baslik') Arama Sonuçları @stop


@if(isset($sabitsayfasonuclari['0']) || isset($blogaramasonuclari['0']))
	@section('menu_baslik') Sonuç Başlıkları @stop
	@section('menu')
	<ul>
		@foreach($sabitsayfasonuclari as $key => $icerik)
		<li> <a href='{{ asset("$icerik->sayfa_linki") }}'> {{$icerik->sayfa_adi}} </a> </li>
		@endforeach
		@foreach($blogaramasonuclari as $key => $icerik)

		@endforeach
		<li>  <a href='{{ asset("haberler/$icerik->sayfa_linki") }}'> {{$icerik->baslik}} </a> </li>
	</ul>
	@stop

	@section('yazi_baslik') <h2>Arama Sonuçları</h2> @stop
	@section('yazi')

	<!-- Sabit Sayfa Sonuçları -->

	@foreach($sabitsayfasonuclari as $key => $icerik)
	<div class="col-sm-12">
	<div class="blogpost">
	<div class="col-sm-12"> <h3 class="icerikbaslik"> <a href='{{ asset("$icerik->sayfa_linki") }}'> {{$icerik->sayfa_adi}} </a> </h3></div>
	<div class="col-sm-12">
		<div class="col-sm-12 row" style="min-height:50px; text-align: justify;">
			<?php
			 $yazi = strip_tags($icerik->sayfa_icerik); //html öğelerini ayıklar
			 $uzunluk = strlen($yazi);
			 $sinir = 218;

			 if ($uzunluk > $sinir)
			 {
			 	$icerik->sayfa_icerik = substr($yazi,0,$sinir)." ...";
			 }
			 ?>
			 <p> <?=strip_tags($icerik->sayfa_icerik)?> </p>
		</div>
		<!-- <div class="col-sm-12" style="text-align:right;"> <a href='{{ asset("haberler/$icerik->sayfa_linki") }}'><b style="font-size: 14px;"> Devamını Oku </b></a> </div> -->
	</div>

		<div class="clearfix"></div>
	</div>
	</div>
	@endforeach

	<!-- Blog Sonuçları -->
	@foreach($blogaramasonuclari as $key => $icerik)
	<div class="col-sm-12">
	<div class="blogpost">
	<div class="col-sm-12"> <h3 class="icerikbaslik"> <a href='{{ asset("haberler/$icerik->sayfa_linki") }}'> {{$icerik->baslik}} </a> </h3></div>
	<div class="col-sm-12">
		<div class="col-sm-12 row" style="min-height:50px; text-align: justify;">
			<?php
			 $yazi = strip_tags($icerik->icerik); //html öğelerini ayıklar
			 $uzunluk = strlen($yazi);
			 $sinir = 218;

			 if ($uzunluk > $sinir)
			 {
			 	$icerik->icerik = substr($yazi,0,$sinir)." ...";
			 }
			 ?>
			 <p> <?=strip_tags($icerik->icerik)?> </p>
		</div>
		<!-- <div class="col-sm-12" style="text-align:right;"> <a href='{{ asset("haberler/$icerik->sayfa_linki") }}'><b style="font-size: 14px;"> Devamını Oku </b></a> </div> -->
	</div>

		<div class="clearfix"></div>
	</div>
	</div>
	@endforeach
	@stop
@else
@section('yazi')
	<div class="alert alert-danger"> <i class="fa fa-info-circle"></i> Aradığınız içerik bulunamadı. <a href="{{asset('/')}}">Buraya tıklayarak anasayfaya gidebilirsiniz.</a> </div>
@stop
@endif