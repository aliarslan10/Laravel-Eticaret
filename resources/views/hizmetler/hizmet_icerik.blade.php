@extends('hizmetler.hizmetler_tema')

@if(isset($sayfaicerik[0]))
@foreach($hizmetler as $icerik)
	@if(($getLink) == ($icerik->sayfa_linki))
		@section('desc') {{$icerik->description}} @stop
		@section('sayfatitle') {{$icerik->sayfa_adi}} @stop
		@section('breadcrumb') {{$icerik->sayfa_adi}} @stop	
		@section('baslik') {{$icerik->sayfa_adi}}   @stop

		@section('menu_baslik') Hizmetlerimiz @stop
		@section('menu')
		@foreach($hizmetler as $menu)
		<ul>
		  <li><a href="{{ asset($menu->sayfa_linki) }}">{{$menu->sayfa_adi}}</a></li>
		</ul>
		@endforeach
		@stop

		@section('yazi_baslik') <h2>{{$icerik->sayfa_adi}}</h2> @stop
		@section('yazi')  @if($icerik->resim_linki) <div class="col-sm-12 resimortala"> <img src='{{ asset("img/hizmetler/$icerik->resim_linki") }}'/> </div> @endif
		<?=htmlspecialchars_decode($icerik->sayfa_icerik,ENT_QUOTES)?> @stop
	@endif
@endforeach
@else
@section('yazi')  <br />
<div class="alert alert-danger"> <i class="fa fa-info-circle"></i> Aradığınız içerik bulunamadı. <a href="{{asset('/')}}">Buraya tıklayarak anasayfaya gidebilirsiniz.</a> </div> @stop
@section('breadcrumb') Aradığınız içerik bulunamadı.  @stop
@endif