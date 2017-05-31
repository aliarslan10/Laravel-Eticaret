@extends('urunler.urunler_tema')
@section('menu_baslik') Ürünlerimiz @stop


@section('menu')
<ul>
@foreach($urunler_menu as $menu)
	<li><i class="glyphicon glyphicon-chevron-right"></i> <a href='{{ asset("$menu->sayfa_linki") }}'>{{$menu->sayfa_adi}}</a></li>
@endforeach
	<li><i class="glyphicon glyphicon-chevron-right"></i> <a href='{{ asset("urunlerimiz") }}'>TÜM ÜRÜNLERİMİZ</a></li>
</ul>
@stop

@if(isset($urunler['0']))
@if(isset($sayfaicerik[0]))
	@section('yazi_baslik') <h2 style="margin:10px 0 20px 0;">{{ $sayfaicerik[0]['sayfa_adi'] }}</h2> @stop
	@section('breadcrumb') {{ $sayfaicerik[0]['sayfa_adi'] }} @stop
	@section('sayfatitle') {{ $sayfaicerik[0]['sayfa_adi'] }} @stop
@elseif(isset($aramakelimesi))
	@section('yazi_baslik') <h2 style="margin:10px 0 20px 0;"> "{{$aramakelimesi}}" kelimesi için arama sonuçları </h2> @stop
	@section('breadcrumb') Arama Sonuçları @stop
	@section('sayfatitle')  {{$aramakelimesi}} kelimesi için Arama Sonuçları @stop
@elseif($firsat == "var")
	@section('yazi_baslik') <h2 style="margin:10px 0 20px 0;"> Fırsat Ürünleri </h2> @stop
	@section('breadcrumb') Fırsat Ürünleri @stop
	@section('sayfatitle')  Fırsat Ürünleri @stop
	@section('desc') Fırsat Ürünleri @stop
@else
	@section('yazi_baslik') <h2 style="margin:10px 0 20px 0;"> Tüm Ürünlerimiz </h2> @stop
	@section('breadcrumb')Tüm Ürünlerimiz @stop	
	@section('sayfatitle') Ürünlerimiz @stop
	@section('desc') Ürünlerimiz @stop
@endif
@section('yazi')

@if($firsat == "")
<div class="row">
   <div class="vitrin">
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
          <div class="row">

            <div class="col-sm-12 mobile-pull">
              <article role=""> <!-- class : vitrin-stili -->

              	@foreach($urunler as $key => $icerik)

				<?php # ARAYÜZ GÖSTERİMİNDE SAYFA BAŞLIĞI VE AÇIKLAMA.
				 $yazi = strip_tags($icerik->sayfa_adi); //html öğelerini ayıklar
				 $uzunluk = strlen($yazi);
				 $sinir = 30;
				 
				 if ($uzunluk > $sinir)
				 {
				 	$icerik->sayfa_adi = substr($yazi,0,$sinir)."...";
				 }
				 ?>

				 <?php
				 $yazi = strip_tags($icerik->sayfa_icerik); //html öğelerini ayıklar
				 $uzunluk = strlen($yazi);
				 $sinir = 50;

				 if ($uzunluk > $sinir)
				 {
				 	$icerik->sayfa_icerik= substr($yazi,0,$sinir).".....";
				 }
				 ?>
				 
				@if($icerik->kisa_aciklama)
					@section('desc') {{$icerik->kisa_aciklama}} - @stop
				@elseif($icerik->description)
					@section('desc') {{$icerik->description}} - @stop
				@else
					@section('desc') {{$icerik}} - @stop
				@endif

                <a href='{{ asset("$icerik->sayfa_linki") }}' style="color:black;"> 
                <div class="col-sm-6 col-md-6" style="margin-bottom: 20px;">
	                <div class="vitrin-cerceve">
	                    <div class="col-sm-12 vitrin-gorsel" style="padding: 0; height: 250px;">
	                    	<img style="width: 100%;  height: 250px;" src='@if(($icerik->resim_linki)==null) {{ asset("img/hazirlaniyor.png") }} @else 
	                    	{{ asset("img/urunler/$icerik->resim_linki") }} @endif' alt="{{$icerik->resim_linki}}" title="{{$icerik->resim_linki}}">
	                    </div>
	                    <div class="clearfix"></div>
	                    <div class="vitrin-satis">
	                        <div class="pull-left" style="color: white;"><i class="glyphicon glyphicon-th-large"> </i> {{$icerik->sayfa_adi}}</div>
	                        <div class="pull-right">
	                         <a href='{{ asset("$icerik->sayfa_linki") }}' style="padding: 3px; text-align: center;" class="inputbtn"> 
							 <i class="fa fa-pointer"></i> Detaylar</a>
							</div>
	                        <div class="clearfix"></div>
	                    </div>
	                </div>
                </div>
	            </a>
				@if(($key+1)%2==0) <div class="clearfix"></div> @endif
				@endforeach
              </article>
            </div>
          </div>
        </div>
 	 </div>
   </div>

</div>

@else
  <div class="firsat-urunu">

			<?php $sayac=0; ?>

			@foreach($tumurunler as $key=>$firsaturunu)
			@if($firsaturunu->firsat_urunu && isset($firsaturunu->firsat_urunu))
			@if($sayac==0)  <div class="item active">
			<!-- There are 4 active item. Begining of active item. -->  @endif 
			@if($sayac==3)  <div class="item">  @endif
			
			 <a href='{{ asset("$firsaturunu->sayfa_linki") }}' style="color:black;">
				<div class="col-sm-6" style="padding-bottom:20px;">
					<div class="col-item"  style="border: 1px solid black;">
						<div class="photo" style="height: 200px;">
						@if($firsaturunu->resim_linki)
							<img style="width: 100%; height: 200px;  overflow: hidden;" src='{{ asset("img/urunler/$firsaturunu->resim_linki") }}' class="img-responsive" alt="" />
						@else
							<img src='http://placehold.it/350x260' class="img-responsive" alt="" />
						@endif
						</div>
						<div class="info">
							<div class="row">
								<div class="price col-md-12">
									<h5 style="text-align: center; font-weight: bold;  padding-bottom: 10px;">{{$firsaturunu->sayfa_adi}}</h5>
								</div>
							</div>
							<div class="separator clear-left">
								<p class="btn-add">
									<i class="fa fa-shopping-cart"></i><a href="javascript:;" productcode="{{$firsaturunu->urun_id}}" productname="{{$firsaturunu->sayfa_adi}}" id="{{$key}}" class="hidden-sm addtocartbutton" style="font-size:13px; color: #0d5bbc; font-weight: bold;">SEPETE EKLE <meta name="csrf-token" content="{!! Session::token() !!}"> </a></p>
								<p class="btn-details">
									<del style="color:red; font-size:13px;">{{$firsaturunu->fiyat}} </del> 
									<b style="color:black; font-size:13.5px;">{{$firsaturunu->indirimli_fiyat}} TL</b>
								</p>
							</div>
							<div class="clearfix">
							</div>
						</div>
					</div>
				</div>
			</a>
			<?php $sayac++; ?>
			
			@endif
			@endforeach
			</div>
			</div>
</div>
@endif

@if($sayfalama == 'olsun') {{ $urunler }} @endif
@stop
@else
@section('yazi') <br/>  <div class="alert alert-danger"><i class="fa fa-info-circle"></i> Aradığınız içerik sitede mevcut değil. </div> @stop
@endif
