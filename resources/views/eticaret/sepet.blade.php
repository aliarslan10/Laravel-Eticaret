@extends('eticaret.eticaret_arayuz')

@section('desc') Sepet @stop
@section('sayfatitle') Sepet @stop
@section('breadcrumb') Sepet @stop	
@section('baslik') Sepet   @stop

@section('sepet_yazi')

<div class="panel panel-info">
	<div class="panel-heading">
		<div class="panel-title">
			<div class="row">
				<div class="col-sm-6">
					<h5><span class="glyphicon glyphicon-shopping-cart"></span> <b>Alışveriş Sepeti</b> </h5>
				</div>
				<div class="col-sm-6">
					<div class="col-sm-3"></div>
					<a class="col-sm-4 col-xs-4 text-center" href="sepetim">
						<button type="button" class="btn btn-primary btn-sm ">
							<span class="glyphicon glyphicon-refresh"></span> Sepeti Güncelle
						</button>
					</a>

					<a class="col-sm-5 col-xs-5 text-center" href=" {{ asset('urunlerimiz') }} "> 
						<button type="button" class="btn btn-primary btn-sm ">
							<span class="glyphicon glyphicon-share-alt"></span> Alışverişe Devam Et
						</button>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-body">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	@if(Session::has('sepet'))
		@foreach($carts as $key=>$sepet)
		<div class="row sepetcart">
			<div class="col-sm-2 col-xs-6"><img class="img-responsive" src="http://placehold.it/100x70"></div>
			<div class="col-sm-4 col-xs-6">
				<h4 class="product-name"><strong> {{ $sepet['urun_adi'] }} </strong></h4><h4>
				<small> {{ $sepet['birim_fiyat'] }} x <span class="adetyazdir">{{ $sepet['adet'] }}</span> = <span class="toplamBirimFiyatYazdir">{{$sepet['toplam_fiyat']}}</span> TL  </small></h4>
			</div>
			<div class="col-sm-6 col-xs-12 row">
				<div class="col-sm-6 col-xs-8 text-right">
					<h4><strong valuebirimfiyat="{{ $sepet['birim_fiyat'] }}"> {{ $sepet['birim_fiyat'] }} <span class="text-muted"> x </span> </strong></h4>
					<input type="hidden" class="birimfiyat" value="{{ $sepet['birim_fiyat'] }}">
				</div>
				<div class="col-sm-5 col-xs-3 row">
					<input class="form-control input-xs adet" type="number" maxlength="5" size="5" value="{{ $sepet['adet'] }}">
				</div>
				<div class="col-sm-1 col-xs-1">
					<div class="bosluk10"></div>
					<a href='{{ asset("kaldir") }}/{{$sepet["urun_id"]}}'> <span class="glyphicon glyphicon-trash"> </span> </a>
					<input type="hidden" class="brandidentity" value='{{$sepet["urun_id"]}}''>
				</div>
			</div>
		</div>
		<hr>
		@endforeach
	@else
		<div class="text-left"> Sepetinize henüz ürün eklememişsiniz. <a href=" {{ asset('urunlerimiz') }} "> Buraya tıklayarak </a> alışverişe başlayabilirsiniz. </div>
	@endif
	</div>
	<div class="panel-footer">
		<div class="row text-center">
			<div class="col-sm-6" style="padding-top:8px;"></div>
			<div class="col-sm-3">
				<h4 class="text-center">Toplam <strong id="total">{{$total}}</strong> TL</h4>
			</div>
			<div class="col-sm-3">
				<a  href='{{ asset("teslimat-bilgileri") }}'> <button type="button" class="btn btn-success btn-block"> Siparişi Tamamla </button> </a>
			</div>
		</div>
	</div>
</div>

@stop