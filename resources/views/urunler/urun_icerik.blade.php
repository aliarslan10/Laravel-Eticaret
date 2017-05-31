@extends('urunler.urunler_tema')

@if(isset($sayfaicerik[0]))
@foreach($urunler as $icerik)
	@if(($getLink) == ($icerik->sayfa_linki))
		@section('desc') {{$icerik->description}} @stop
		@section('sayfatitle') {{$icerik->sayfa_adi}} @stop
		@section('breadcrumb') {{$icerik->sayfa_adi}} @stop	
		@section('baslik') {{$icerik->sayfa_adi}}   @stop

		@section('menu_baslik') Ürünlerimiz @stop
		@section('menu')
		<ul>
		@foreach($urunler_menu as $menu)
		  <li><i style="color: gray;" class="glyphicon glyphicon-chevron-right"></i> <a href="{{ asset($menu->sayfa_linki) }}">{{$menu->sayfa_adi}}</a></li>
		@endforeach
		</ul>
		@stop

		@section('yazi_baslik') <h2>{{$icerik->sayfa_adi}}</h2> @stop
		@section('yazi')  @if($icerik->resim_linki) <div class="col-sm-12 resimortala"> <img src='{{ asset("img/urunler/$icerik->resim_linki") }}'/> </div> @endif
		<?=htmlspecialchars_decode($icerik->sayfa_icerik,ENT_QUOTES)?> @stop
	@endif
@endforeach
@else
@section('yazi')  <br />
<div class="alert alert-danger"> <i class="fa fa-info-circle"></i> Aradığınız içerik bulunamadı. <a href="{{asset('urunlerimiz')}}">Buraya tıklayarak tüm ürünlerimizi görüntüleyebilirsiniz.</a> </div> @stop
@section('breadcrumb') Aradığınız içerik bulunamadı.  @stop
@endif