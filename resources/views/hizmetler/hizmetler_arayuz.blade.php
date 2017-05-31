@extends('hizmetler.hizmetler_tema')
@section('desc') Hizmetlerimiz @stop
@section('sayfatitle') Hizmetlerimiz @stop
@section('breadcrumb') Tüm Hizmetlerimiz @stop
@section('baslik') Tüm Hizmetlerimiz @stop

@section('menu_baslik') Hizmetlerimiz @stop
@section('menu')
@foreach($hizmetler as $menu)
<ul>
	<li><a href='{{ asset("$menu->sayfa_linki") }}'>{{$menu->sayfa_adi}}</a></li>
</ul>
@endforeach
@stop

@if(isset($hizmetler['0']))
@section('yazi_baslik') <h2>Tüm Hizmetlerimiz</h2> @stop
@section('yazi')

<div class="row">
	@foreach($hizmetler as $key => $icerik)
	<div class="col-sm-6 col-md-4">
		<div class="thumbnail hizmeticerik">
			<img style="height:100px;" src="@if(($icerik->resim_linki)==null) img/gorsel-hazirlaniyor.jpg @else img/hizmetler/{{$icerik->resim_linki}} @endif" alt="{{$icerik->resim_linki}}" title="{{$icerik->resim_linki}}">
			<div class="caption">

			<?php
			 $yazi = strip_tags($icerik->sayfa_adi); //html öğelerini ayıklar
			 $uzunluk = strlen($yazi);
			 $sinir = 25;

			 if ($uzunluk > $sinir)
			 {
			 	$icerik->sayfa_adi = substr($yazi,0,$sinir)."...";
			 }
			 ?>
			 <h2> {{$icerik->sayfa_adi}} </h2> <hr>

			 <?php
			 $yazi = strip_tags($icerik->sayfa_icerik); //html öğelerini ayıklar
			 $uzunluk = strlen($yazi);
			 $sinir = 75;

			 if ($uzunluk > $sinir)
			 {
			 	$icerik->sayfa_icerik= substr($yazi,0,$sinir).".....";
			 }
			 ?>
			 <p> <?=strip_tags($icerik->sayfa_icerik)?> </p>

			 <p><a href='{{ asset("$icerik->sayfa_linki") }}' class="btn btn-primary" role="button"> Detaylar </a></p>
			</div>
		</div>
	</div>
	@if(($key+1)%3==0) <div class="clearfix"></div> @endif
	@endforeach
</div>
{{ $hizmetler }}
@stop
@else
@section('yazi') <br/>  <div class="alert alert-danger"><i class="fa fa-info-circle"></i> Siteye henüz hizmetlerle ilgili bilgi girişi yapılmadı.</div> @stop
@endif
