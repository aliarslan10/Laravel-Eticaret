@extends('kurumsal.kurumsal_tema')

@if(isset($sayfaicerik[0]))
@foreach($kurumsal as $icerik)
	@if(($getLink) == ($icerik->sayfa_linki))
		@section('desc') {{$icerik->description}} @stop
		@section('sayfatitle') {{$icerik->sayfa_adi}} @stop
		@section('breadcrumb') {{$icerik->sayfa_adi}} @stop	
		@section('baslik') {{$icerik->sayfa_adi}}   @stop

		@section('kurumsal_menu_baslik') Menü @stop
		@section('kurumsal_menu')
		<ul>
		@foreach($kurumsal as $menu)
		  <li><i style="color: gray;" class="glyphicon glyphicon-chevron-right"></i> <a href="{{$menu->sayfa_linki}}">{{$menu->sayfa_adi}}</a></li>
		@endforeach
		</ul>
		@stop
		@section('kurumsal_baslik') <h2>{{$icerik->sayfa_adi}}</h2> @stop
		@section('kurumsal_yazi') @if($icerik->resim_linki) <div class="col-sm-12 resimortala"> <img src='{{ asset("img/kurumsal/$icerik->resim_linki") }}'/> </div> @endif
		<?=htmlspecialchars_decode($icerik->sayfa_icerik,ENT_QUOTES)?> @stop
	@endif
@endforeach
@else
@section('kurumsal_yazi')  <br />
<script type="text/javascript"> window.location = "{{ url('/404') }}" </script>
<div class="alert alert-warning"> <i class="fa fa-info-circle"></i> Aradığınız içerik bulunamadı. <a href="{{asset('/')}}">Buraya tıklayarak anasayfaya gidebilirsiniz. </a> </div> @stop
@section('breadcrumb') Aradığınız içerik bulunamadı.  @stop
@endif