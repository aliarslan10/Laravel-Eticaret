@extends('kullanici.uye_ol_giris_yap_tema')

@section('desc') Kayıt Ol @stop
@section('sayfatitle') Kayıt Ol @stop
@section('breadcrumb') Kayıt Ol @stop	
@section('baslik') Kayıt   @stop


@section('kullanici_menu_baslik') Ürünlerimiz @stop


@section('kullanici_menu')
	<ul>
	@foreach($ssayfa_menu as $menu)
	  <li><i style="color: gray;" class="glyphicon glyphicon-chevron-right"></i> <a href="{{ asset($menu->sayfa_linki) }}">{{$menu->sayfa_adi}}</a></li>
	@endforeach
	</ul>
@stop


@section('kullanici_yazi')
@if(!Session::has('giris_kullanici'))
	@if(isset($xcrud))
		{!! $xcrud->render('create') !!}
	@else
	<div class="clearfix"></div>
    <div class="panel panel-default panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title"> Ücretsiz Kayıt Ol </h3>
	  </div>
	  <div class="panel-body">
		<div class="form-group">

	{{ Form::open(['action'=>'KullaniciController@kayitOl']) }}
              
	<div class="form-horizontal">
		 <div class="form-group">
		   <label class="col-sm-4 col-xs-12 control-label"> E-Posta Adresiniz * </label>
		   <div class="col-sm-8 col-xs-12">
			  {{ Form::email('mail_adresi','',array('class'=>'form-control', 'id'=>'inputEmail', 'placeholder'=>'Email Adresi', 'data-error'=>'Mail adresi hatalı!', 'required'=>'required')) }}
		   </div>
		 </div>
	</div>

	<div class="form-horizontal">
		 <div class="form-group">
		   <label class="col-sm-4 col-xs-12 control-label"> Kullanıcı Şifreniz * </label>
		   <div class="col-sm-8 col-xs-12">
			  {{ Form::password('sifre',array('class'=>'form-control', 'placeholder'=>'Bir şifre belirleyin', 'required'=>'required')) }}
		   </div>
		 </div>
	</div>

	<div class="form-horizontal">
		 <div class="form-group">
		   <label class="col-sm-4 col-xs-12 control-label"> Adınız ve Soyadınız * </label>
		   <div class="col-sm-8 col-xs-12">
			  {{ Form::text('ad_soyad', '', array('class'=>'form-control', 'placeholder'=>'Ad Soyad', 'required'=>'required')) }}
		   </div>
		 </div>
	</div>
	
	
	<div class="form-horizontal">
		 <div class="form-group">
		   <label class="col-sm-4 col-xs-12 control-label"> Cinsiyetiniz * </label>
		   <div class="col-sm-8 col-xs-12">
			  {{ Form::select('cinsiyet', ['1'=>'Bay', '2'=>'Bayan'], '1', array('class'=>'form-control', 'required'=>'required')) }}
		   </div>
		 </div>
	</div>

	
	<div class="form-horizontal">
		 <div class="form-group">
		   <label class="col-sm-4 col-xs-12 control-label"> Telefon Numaranız * </label>
		   <div class="col-sm-8 col-xs-12">
			  {{ Form::text('cep_telefonu', '', array('class'=>'form-control', 'placeholder'=>'Telefon Numaranız', 'required'=>'required')) }}
		   </div>
		 </div>
	</div>

	<div class="form-horizontal">
		 <div class="form-group">
		   <label class="col-sm-4 col-xs-12 control-label"></label>
		   <div class="col-sm-8 col-xs-12">
			  <div class="row col-sm-12">
				{{ Form::checkbox('sozlesme','', array('class'=>'form-control', 'required'=>'required')) }} <a> Üyelik sözleşmesini</a></u> okudum ve kabul ediyorum.
			</div>
		   </div>
		 </div>
	</div>


	<div class="form-horizontal">
		 <div class="form-group">
		    <label class="col-sm-4 col-xs-12 control-label">  </label>
		   <div class="col-sm-4 col-xs-12">
		    <button class="btn btn-success col-sm-12">  <div class="glyphicon glyphicon-ok-circle"> </div> Kayıt </button>
		   </div>
		 </div>
	</div>
	{{ Form::close() }}

            </div>

	  @if(($bilgi) != null) 
	  <div class="alert alert-danger"> <i style="font-size: 20px; top: 5px;" class="glyphicon glyphicon-info-sign"></i><b> {{ $bilgi }} (<a href="{{ asset('giris-yap') }}">Giriş Yap </a> |  <a href="#" onClick="test()"> Şifremi Unuttum </a>) </b>
      </div>
	  @endif            
	  </div>
	</div>
	@endif
	
	<script>
		function test() { alert("Modül henüz aktif değil.") }
	</script>

@else
<div class="alert alert-info" role="alert">
 	Zaten sistemimize üyesiniz. Kullanıcı paneline yönlendiriliyorsunuz.
</div>
<?php header("Refresh:2; url=kullanici-paneli");?> 

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header sozlesmemetni"> <b> Üyelik Sözleşmesi</b> </div>
      <p class="sozlesmemetni">
      * Güncellenecek. </p>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Kapat</button>
      </div>
    </div>
  </div>
</div>
@endif
@stop