@extends('blog.blog_tema')

@if(isset($blogicerikleri[0]))
	@foreach($blogicerikleri as $icerik)
		@if(($bloglink) == ($icerik->sayfa_linki))
			@section('desc') {{$icerik->description}} @stop
			@section('sayfatitle') {{$icerik->baslik}} @stop
			@section('breadcrumb') {{$icerik->baslik}} @stop
			@section('blog_baslik') {{$icerik->baslik}}   @stop

			@section('blog_menu_baslik') Haberler @stop
			@section('blog_menu')
			<ul>
			@foreach($blogmenuleri as $menu)   
			  <li><i style="color: gray;" class="glyphicon glyphicon-chevron-right"></i> <a href='{{ asset("haberler/kategoriler/$menu->kategori_link") }}'>{{$menu->menu_adi}}</a></li>
			@endforeach
			<ul>
			@stop

			@section('blog_yazi_baslik') <h2>{{$icerik->baslik}}</h2> @stop
			@section('blog_yazi') <div class="col-sm-12 resimortala"> <img src='{{ asset("img/blog/$icerik->resim_linki") }}'/> </div>
			<?=htmlspecialchars_decode($icerik->icerik,ENT_QUOTES)?> @stop
		@endif
	@endforeach
@else
@section('blog_yazi_baslik') <br />
<div class="alert alert-danger"> <i class="fa fa-info-circle"></i> Aradığınız içerik bulunamadı. <a href="{{asset('/')}}">Buraya tıklayarak anasayfaya gidebilirsiniz.</a> </div> @stop
@section('breadcrumb') Aradığınız içerik bulunamadı.  @stop
@endif