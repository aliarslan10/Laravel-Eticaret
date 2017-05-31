@extends('eticaret.eticaret_arayuz')

@section('desc') Teslimat Bilgileri @stop
@section('sayfatitle') Teslimat Bilgileri @stop
@section('breadcrumb') Teslimat Bilgileri @stop	
@section('baslik') Teslimat Bilgileri   @stop

@section('sepet_yazi')
<div class="satinal">
	<div class="col-sm-12"> 

		<div class="panel panel-primary">
		  <div class="panel-heading">
		    <h3 class="panel-title">İşlem Özeti</h3>
		  </div>
		  <div class="panel-body">
		<?php $toplam=0; ?>
		@if(Session::has('sepet_odeme'))
		<div class="table-responsive table-bordered">
		  <table class="table">
		  	<tr style="background-color: #f9f9f9;">
		  		<th> # </th>
		  		<th> Ürün </th>
		  		<th> Birim Fiyat </th>
		  		<th> Miktar </th>
		  		<th> Tutar </th>
		  	</tr>
		  
		  	<?php $i=0;?>
		  	@foreach(Session::get('sepet_odeme') as $key => $sepet)
		  	<tr>
		  		<td> {{++$i}} </td>
		  		<td> {{ $sepet["urun_adi"] }}
		  		<td> {{ $sepet["birim_fiyat"] }} </td>
		  		<td> {{ $sepet["adet"] }} Adet </td>
		  		<td> {{ $sepet["toplam_fiyat"]  }} TL </td>
		  	</tr>

		  	<?php $toplam += $sepet["toplam_fiyat"]; ?>

			@endforeach
		  </table>
		</div>

		@else
		 	<div class="alert alert-danger" role="alert">
				Sepetinize henüz ürün eklememişsiniz. Buraya tıklayarak hemen alışveriş yapmaya başlayabilirsiniz.
			</div>
		@endif

		</div>
		<div class="panel-footer">
			<div class="col-sm-11 text-right"> <h4><b> Toplam Ödenecek Tutar : {{$toplam}} TL </b></h4> </div>
			<div class="col-sm-1"> </div>
			<div class="clearfix"></div>
		</div>
	</div>
				
{{ Form::open(['action'=>'ETicaretController@satinAlmayiTamamla']) }}


	<div class="panel panel-primary">
	  <div class="panel-heading">Kişisel Bilgiler</div>
	  <div class="panel-body">
	
		<div class="form-horizontal">
		  <div class="form-group">
		    <label  class="col-sm-2 control-label">Ad Soyad *</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="ad_soyad" value='@if(isset($dizi) && $dizi) {{$dizi["ad_soyad"]}} @endif' placeholder="Adınızı ve soyadınızı giriniz" required>
		    </div>
		  </div>

		  <div class="form-group">
		    <label  class="col-sm-2 control-label">E-Mail Adresi *</label>
		    <div class="col-sm-10">
		    @if(isset($dizi))
		      <input type="email" class="form-control" name="mail_adresi" placeholder="E-Posta adresinizi giriniz" value='@if(isset($dizi) && $dizi) {{$dizi["mail_adresi"]}} @endif' readonly>
		    @else
		      <input type="email" class="form-control" name="mail_adresi" placeholder="E-Posta adresinizi giriniz" value=''>
		    @endif
		    </div>
		  </div>
		</div>
		
	  </div>
	</div>

	<div class="panel panel-primary">
	  <div class="panel-heading">Fatura ve Kargo Bilgileri</div>
	  <div class="panel-body">

		<div class="col-sm-12">
			<div class="form-horizontal">
			  <div class="form-group">
			    <label  class="col-sm-2 control-label">TC Kimlik No</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="tckimlik" placeholder="Fatura isteyen müşterilerin kimlik numarasını girmesi gerekmektedir.">
			    </div>
			  </div>
			</div>
		</div>

		<div class="col-sm-12">
			<div class="form-horizontal">
				 <div class="form-group">
				   <label class="col-sm-2 control-label"> Ülke </label>
				   <div class="col-sm-10">
				      <input type="text" class="form-control" name="ulke" @if(isset($aldataFatura)) value="{{$aldataFatura['ulke']}}" @endif   placeholder="" required>
				   </div>
				 </div>
			</div>
		</div>

		<div class="col-sm-12">
			<div class="form-horizontal">
				 <div class="form-group">
				   <label class="col-sm-2 control-label"> Şehir </label>
				   <div class="col-sm-10">
				      <input type="text" class="form-control" name="sehir"  @if(isset($aldataFatura)) value="{{$aldataFatura['sehir']}}" @endif   placeholder="" required>
				   </div>
				 </div>
			</div>
		</div>



		<div class="col-sm-12">
			<div class="form-horizontal">
				 <div class="form-group">
				   <label class="col-sm-2 control-label"> Adres </label>
				   <div class="col-sm-10">
				      <input type="text" class="form-control" name="adres"  @if(isset($aldataFatura)) value="{{$aldataFatura['adres']}}" @endif   placeholder="" required>
				   </div>
				 </div>
			</div>
		</div>

		<div class="col-sm-12">
			<div class="form-horizontal">
				 <div class="form-group">
				   <label class="col-sm-2 control-label"> Telefon Numarası </label>
				   <div class="col-sm-10">
				      <input type="text" class="form-control" name="cep_telefonu" value='@if(isset($dizi) && $dizi) {{$dizi["cep_telefonu"]}} @endif'   placeholder="" required>
				   </div>
				 </div>
			</div>
		</div>

	<div class="clearfix"></div>
	
	<!--
	<div class="col-sm-12">
		<div class="form-horizontal">
			 <div class="form-group">
			   <label class="col-sm-2 control-label">   </label>
			   <div class="col-sm-10">
				<input type="checkbox" name="sozlesme" value="true" required> Kullanıcı Sözleşmesi
			   </div>
			 </div>
		</div>
	</div>
	-->
	<div class="col-sm-12">
		<div class="form-horizontal">
			 <div class="form-group">
			   <label class="col-sm-2 control-label">   </label>
			   <div class="col-sm-3">
				<button class="btn btn-primary"> Ödeme Seçeneklerini Göster </button>
			   </div>
			 </div>
		</div>
	</div>
	
	  </div>
	</div>
{{ Form::close() }}		

			</div>
	</div>

	<div class="bosluk10"></div>
	<div class="bosluk10"></div>

@stop