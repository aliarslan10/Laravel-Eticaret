@extends('urunler.urunler_tema')
@section('desc') Ürünlerimiz @stop
@section('sayfatitle') Ürünlerimiz @stop
@section('breadcrumb') Tüm Ürünlerimiz @stop
@section('baslik') Tüm Ürünlerimiz @stop

@section('menu_baslik') Ürünlerimiz @stop
@section('menu')
<ul>
@foreach($urunler_menu as $menu)
	<li><i style="color: gray;" class="glyphicon glyphicon-chevron-right"></i> <a href='{{ asset("$menu->sayfa_linki") }}'>{{$menu->sayfa_adi}}</a></li>
@endforeach
</ul>
@stop

@if(isset($urunler['0']))
@section('yazi_baslik') <h2>Tüm Ürünlerimiz</h2> @stop
@section('yazi')

<div class="row">
	@foreach($urunler as $key => $icerik)
	<div class="col-sm-6 col-md-4">
		<div class="thumbnail urunicerik">
			<img style="height:100px;" src='@if(($icerik->resim_linki)==null) img/hazirlaniyor.png @else {{ asset("img/urunler/$icerik->resim_linki") }} @endif' alt="{{$icerik->resim_linki}}" title="{{$icerik->resim_linki}}">
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
@if($sayfalama == 'olsun') {{ $urunler }} @endif
@stop
@else
@section('yazi') <br/>  <div class="alert alert-danger"><i class="fa fa-info-circle"></i> Siteye henüz urunlerle ilgili bilgi girişi yapılmadı.</div> @stop
@endif
