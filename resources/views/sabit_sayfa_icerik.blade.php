@extends('icerik_tasarim1')
@foreach($menuler as $icerik)
	@if(($getLink) == ($icerik->sayfa_linki))
		@section('desc') {{$icerik->description}} @stop
		@section('sayfatitle') {{$icerik->sayfa_adi}} @stop
		@section('breadcrumb') {{$icerik->sayfa_adi}} @stop	
		@section('baslik') {{$icerik->sayfa_adi}}   @stop

		@section('menu_baslik') Menü @stop
		@section('menu')
		@foreach($menuler as $menu)
		<ul>
		  <li><a href="#">{{$menu->sayfa_adi}}</a></li>
		</ul>
		@endforeach
		@stop
		@section('yazi_baslik') <h2>{{$icerik->sayfa_adi}}</h2> @stop
		@section('yazi') <?=htmlspecialchars_decode($icerik->sayfa_icerik,ENT_QUOTES)?> @stop
	@endif
@endforeach