@extends('galeri.galeri_tema')

@if(isset($sayfaicerik[0]))
@foreach($galeri as $icerik)
	@if(($getLink) == ($icerik->sayfa_linki))
		@section('desc') {{$icerik->description}} @stop
		@section('sayfatitle') {{$icerik->sayfa_adi}} @stop
		@section('breadcrumb') {{$icerik->sayfa_adi}} @stop	
		@section('baslik') {{$icerik->sayfa_adi}}   @stop

		@section('galeri_menu_baslik') Menü @stop
		@section('galeri_menu')
		<ul>
		@foreach($galeri as $menu)
		  <li><i style="color: gray;" class="glyphicon glyphicon-chevron-right"></i> <a href='{{ asset("$menu->sayfa_linki") }}'>{{$menu->sayfa_adi}}</a></li>
		@endforeach
		  <li><i style="color: gray;" class="glyphicon glyphicon-chevron-right"></i> <a href='{{ asset("galeri") }}'>Tüm Resimler</a></li>
		</ul>
		@stop
		@section('galeri_yazi_baslik') <h2>{{$icerik->sayfa_adi}}</h2> @stop
		@section('galeri_yazi') 

		<div class='list-group gallery'>
		@foreach($resimler as $key=>$resim)
			@if(($icerik->id)==($resim->r_kategori_id))
			<div class='col-sm-6 col-xs-6 col-md-6 col-lg-4'>
				<a class="thumbnail fancybox" rel="ligthbox" title="{{ $resim->r_aciklama }}" href='{{ asset("img/urunler/$resim->r_resim") }}'>
					<img class="img-responsive" style="height: 180px;" alt="" src='{{ asset("img/urunler/$resim->r_resim") }}' />
					<div class='text-center'>
						<small class='text-muted'><h5 style="color:black;">{{ $resim->r_aciklama }}</h5></small>
					</div>
				</a>
			</div>
			@endif
		@endforeach
		<div class="clearfix"></div>
		{{$resimler}}
		</div>
		@stop
	@endif
@endforeach
@else
@section('galeri_yazi') <div class="bosluk35"></div>
<i class="fa fa-info-circle"></i> Aradığınız içerik bulunamadı. <a href="{{asset('/')}}">Buraya tıklayarak anasayfaya gidebilirsiniz.</a> @stop
@section('breadcrumb') Aradığınız içerik bulunamadı.  @stop
@endif