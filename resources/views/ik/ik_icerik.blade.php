@extends('ik.ik_tema')

@if(isset($sayfaicerik[0]))
@foreach($ik as $icerik)
	@if(($getLink) == ($icerik->sayfa_linki))
		@section('desc') {{$icerik->description}} @stop
		@section('sayfatitle') {{$icerik->sayfa_adi}} @stop
		@section('breadcrumb') {{$icerik->sayfa_adi}} @stop	
		@section('baslik') {{$icerik->sayfa_adi}}   @stop

		@section('ik_menu_baslik') Menü @stop
		@section('ik_menu')
		<ul>
		@foreach($ik as $menu)
		  <li><i style="color: gray;" class="glyphicon glyphicon-chevron-right"></i> <a href='{{ asset("$menu->sayfa_linki") }}'>{{$menu->sayfa_adi}}</a></li>
		@endforeach
		</ul>
		@stop
		@section('ik_baslik') <h2>{{$icerik->sayfa_adi}}</h2> @stop
		@section('ik_yazi') @if($icerik->resim_linki) <div class="col-sm-12 resimortala"> <img width="60%" src='{{ asset("img/ik/$icerik->resim_linki") }}'/> </div> @endif
		<?=htmlspecialchars_decode($icerik->sayfa_icerik,ENT_QUOTES)?> @stop
	@endif
@endforeach
@else
@section('ik_yazi')  <br />
<div class="alert alert-danger"> <i class="fa fa-info-circle"></i> Aradığınız içerik bulunamadı. <a href="{{asset('/')}}">Buraya tıklayarak anasayfaya gidebilirsiniz.</a> </div> @stop
@section('breadcrumb') Aradığınız içerik bulunamadı.  @stop
@endif