@extends('blog.blog_tema')
@section('desc') {{$baslik}} @stop
@section('sayfatitle') {{$baslik}} @stop
@section('breadcrumb') {{$baslik}} @stop
@section('baslik') {{$baslik}} @stop

@section('blog_menu_baslik') Kategoriler @stop
@section('blog_menu')
<ul>
@foreach($blogKategoriler as $menu)
	<li><i style="color: gray;" class="glyphicon glyphicon-chevron-right"></i> <a href='{{ asset("haberler/kategoriler/$menu->kategori_link") }}'>{{$menu->menu_adi}}</a></li>
@endforeach
</ul>
@stop

@if(isset($blogSonIcerikler['0']))
@section('blog_yazi_baslik') <h2>{{$baslik}}</h2> @stop
@section('blog_yazi')

@foreach($blogSonIcerikler as $key => $icerik)
<div class="col-sm-12">
<div class="blogpost">
<div class="col-sm-12"> <h3 class="icerikbaslik"> <a href='{{ asset("haberler/$icerik->sayfa_linki") }}'> {{$icerik->baslik}} </a> </h3></div>
<div class="col-sm-4"> <img style="max-height:100px; width:100%;" src="@if(($icerik->resim_linki)==null) img/gorsel-hazirlaniyor.jpg @else img/blog/{{$icerik->resim_linki}} @endif" alt="{{$icerik->resim_linki}}" title="{{$icerik->resim_linki}}"></div>
<div class="col-sm-8">
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
	<div class="col-sm-12" style="text-align:right;"> <a href='{{ asset("haberler/$icerik->sayfa_linki") }}'><b style="font-size: 14px;"> Devamını Oku </b></a> </div>
</div>

	<div class="clearfix"></div>
</div>
</div>
@endforeach
{{$blogSonIcerikler}}
@stop
@else
@section('blog_yazi_baslik') <br />
<div class="alert alert-danger"> <i class="fa fa-info-circle"></i> Henüz hiç haber/blog yazısı yayınlanmamış. <a href="{{asset('/')}}">Buraya tıklayarak anasayfaya gidebilirsiniz.</a> </div> @stop
@section('breadcrumb') Henüz hiç haber/blog yazısı yayınlanmamış.  @stop
@endif