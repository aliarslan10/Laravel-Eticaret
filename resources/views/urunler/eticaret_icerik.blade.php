@extends('urunler.satis_tema')
						
@if(isset($sayfaicerik[0]))
@foreach($sayfaicerik as $icerik)
		@section('desc') {{$icerik->description}} @stop
		@section('sayfatitle') {{$icerik->sayfa_adi}} @stop
		@section('breadcrumb') {{$icerik->sayfa_adi}} @stop	
		@section('baslik') {{$icerik->sayfa_adi}}   @stop
		
		@section('satis_alani')
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-5">
					
					<link rel="stylesheet" href='{{ asset("css/smoothproducts.css") }}'>

					<div class="sp-loading"><img src="{{ asset('img/sp-loading.gif') }}" alt=""><br>YÜKLENİYOR...</div>
					<div class="sp-wrap">
						<a href='{{ asset("img/urunler/$icerik->resim_linki") }}'> <img src='{{ asset("img/urunler/$icerik->resim_linki") }}'/> </a>
						@if(isset($gorseller[0])) <!-- Galeriden gelen görseller -->
							@foreach($gorseller as $key=>$resim) 
						<a href='{{ asset("img/urunler/urun/$resim->r_resim") }}'> <img src='{{ asset("img/urunler/urun/$resim->r_resim") }}'/> </a>
						@endforeach 
						@endif <!-- Galeriden gelen görseller END -->
					</div>
					
					<script type="text/javascript" src='{{ asset("js/smoothproducts.min.js") }}'></script>
					<script type="text/javascript">
						/* wait for images to load */
						$(window).load( function() {
							$('.sp-wrap').smoothproducts();
						});
					</script>
						
					</div>
					<div class="details col-md-7">

						<h3 class="product-title">{{$icerik->sayfa_adi}}</h3>
						<p class="product-description"><?=htmlspecialchars_decode($icerik->kisa_aciklama,ENT_QUOTES)?></p>
						@if($icerik->firsat_urunu)
							<h4 class="price"> Fiyat :  <del style="color:red">{{$icerik->fiyat}}</del> <span style="color:darkgreen;"> {{$icerik->indirimli_fiyat}} TL</span> 
							<!-- <img style="margin-left:50px;" src='{{ asset("img/kargospeed.jpg") }}'> -->
							<img style="margin-left:50px;" width="40%" src='{{ asset("img/24-saatte-kargo.jpg") }}'>
							</h4>
						@else
							<!-- <h4 class="price"> Fiyat : <span> {{-- $icerik->fiyat --}} TL</span> sepet.js pasif -->
							<!-- <img style="margin-left:50px;" src='{{ asset("img/kargospeed.jpg") }}'> -->
							<!-- <img style="margin-left:50px;" width="40%" src='{{ asset("img/24-saatte-kargo.jpg") }}'> -->
							</h4>
						@endif
						<div class="action">
							<!-- <input class="form-control sepete_ekleme_adeti col-sm-1" type="number" id="quantity" min="1" value="1" style="width: 10%;"> -->
							<a href="javascript:;" onClick="yapimda()" productcode="{{$icerik->urun_id}}" productname="{{$icerik->sayfa_adi}}"  class="add-to-cart btn btn-default addtocartbutton col-sm-3" type="button" style="padding:7px 5px 5px 5px;">Sepete Ekle <meta name="csrf-token" content="{!! Session::token() !!}"></a>
						</div>
						<div class="bosluk10"></div>
						<span class="hidden"> * Cuma günü öğleden sonra sipariş edilen ürünler, pazartesi günü kargoya verilmektedir. </span>
						<div class="bosluk10"></div>
						<!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
					</div>
				</div>
			</div>
		</div>
		
		<script>
			function yapimda(){
				alert("Sepete ekleme modülü henüz aktif değildir. Banka ile olan sanalpos işlemleri tamamlandıktan sonra sepete ekleme işlemi aktif edilecektir.");
			}
		</script>
		
		@stop

		@section('satis_detaylari')


	      <div class="row">
	        <div class="col-sm-6 nav-tab-holder">
	        <ul class="nav nav-tabs row" role="tablist">
	          <li role="presentation" class="active col-sm-6"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><b>Ürün Detayları</b></a></li>
	          <li role="presentation" class="col-sm-6"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><b>İade Koşulları</b></a></li>
	        </ul>
	      </div>
	      </div>

	      <div class="tab-content">
	        <div role="tabpanel" class="tab-pane active" id="home">
	          <div class="row">

	            <div class="col-sm-12 mobile-pull">
	              <article role="vitrin-stili" style="padding:20px; font-size:16px;">
	              		<?=htmlspecialchars_decode($icerik->sayfa_icerik,ENT_QUOTES)?>
	              </article>
	            </div>


	          </div>

	        </div>

			<div role="tabpanel" class="tab-pane" id="profile">
		        <div class="row">

		          <div class="col-sm-12 mobile-pull">
		            <article role="vitrin-stili" style="padding:20px; text-align:justify; line-height: 1.8; font-size:16px;">
<b>İade ve İptal İşlemleri</b>
<br>
Buraya LARAVEL E-TİCARET sitesiyle ilgili iade ve iptal işlemleri yazısı gelecek.
<br><br>
Mutlu ve güvenli alışverişler..					
					
					</article>
		          </div>
		        </div>
	     	</div>
	      </div>
		@stop

	
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
	
@endforeach
@else
	@section('yazi')  <br />
	<div class="alert alert-danger"> <i class="fa fa-info-circle"></i> Aradığınız içerik bulunamadı. <a href="{{asset('urunlerimiz')}}">Buraya tıklayarak tüm ürünlerimizi görüntüleyebilirsiniz.</a> </div>
	@stop
	@section('breadcrumb') Aradığınız içerik bulunamadı.  @stop
@endif