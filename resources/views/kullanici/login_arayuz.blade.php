@extends('kullanici.uye_ol_giris_yap_tema')

@section('desc') Giriş Yap @stop
@section('sayfatitle') Giriş Yap @stop
@section('breadcrumb') Giriş Yap @stop	
@section('baslik') Giriş Yap   @stop


@section('kullanici_menu_baslik') Ürünlerimiz @stop


@section('kullanici_menu')
	<ul>
	@foreach($ssayfa_menu as $menu)
	  <li><i style="color: gray;" class="glyphicon glyphicon-chevron-right"></i> <a href="{{ asset($menu->sayfa_linki) }}">{{$menu->sayfa_adi}}</a></li>
	@endforeach
	</ul>
@stop


@section('kullanici_yazi')

<div class="clearfix"></div>

<div class="col-sm-12">
	<div class="panel panel-info">
		@if(session('bilgi_eposta_kayitli'))
		<div class="panel-heading"><b> {{ session('bilgi_eposta_kayitli') }} </b></div>
		<div class="panel-body" style="padding-top: 0; margin-top: 0; padding: 10px; font-size: 16px; ">
			Belirttiğiniz <b>{{session('bilgi_eposta')}}</b> mail adresi sistemimizde kayıtlıdır. Alışverişe devam etmek için lütfen giriş yapınız.
			Şifrenizi hatırlamıyorsanız, şifremi unuttum yaparak yeni bir şifre talebinde bulunabilirsiniz veya buraya tıklayıp, farklı bir mail adresi belirterek alışverişe devam edebilirsiniz.
			İyi alışverişler.
		</div>
		@elseif(session('bilgi_login_error'))
		<div class="panel-heading"> Hatalı Giriş Denemesi </div>
		<div class="panel-body" style="padding-top: 0; margin-top: 0; padding: 10px; font-size: 16px; ">
		{{session('bilgi_login_error')}}
		</div>
		@else
		<div class="panel-heading">Ücretsiz Kayıt Ol</div>
		<div class="panel-body" style="padding-top: 10px; margin-top: 0;">
			<h5>  <i class="fa fa-plus-circle"></i> Henüz sitemize üye değilseniz, <a href='{{ asset("kayit-ol") }}'>buraya tıklayarak</a> ücretsiz kayıt olabilirsiniz.</h5>
		</div>
		@endif
	</div>
</div>

<div class="clearfix"></div>
@if(!Session::has('giris_kullanici'))
<div class="col-sm-12">
            <div class="panel panel-default panel-primary">
			  <div class="panel-heading">
			    <h3 class="panel-title"> Giriş Yap </h3>
			  </div>
			  <div class="panel-body">

				<div class="form-group">
				{{ Form::open(['action'=>'KullaniciController@girisYap']) }}
					<div class="form-horizontal">
						 <div class="form-group">
						   <label class="col-sm-4 col-xs-12 control-label"> E-Posta Adresiniz * </label>
						   <div class="col-sm-8 col-xs-12">
							  {{ Form::text('mail_adresi','',array('required' => 'required','class' => 'form-control')) }}
						   </div>
						 </div>
					</div>

					<div class="form-horizontal">
						 <div class="form-group">
						   <label class="col-sm-4 col-xs-12 control-label"> Kullanıcı Şifreniz * </label>
						   <div class="col-sm-8 col-xs-12">
						      {{ Form::password('sifre', array('class' => 'form-control')) }}
						   </div>
						 </div>
					</div>

					<div class="form-horizontal">
						 <div class="form-group">
						    <label class="col-sm-4 col-xs-12 control-label"> </label>
						   <div class="col-sm-8 col-xs-12">
						   <button class="btn btn-success col-sm-6 col-xs-12">  <div class="glyphicon glyphicon-ok"> </div> Giriş Yap </button>
						   <label class="col-sm-5 col-xs-12 control-label"> <a href="#"> <!-- Şifremi Unuttum --> </a></label>
						   </div>
						 </div>
					</div>
				{{ Form::close() }}
	            </div>

	  </div>
	</div>
</div>
@else
<div class="alert alert-info" role="alert"> Kullanıcı paneline yönlendiriliyorsunuz. </div>
<?php header("Refresh:1; url=kullanici-paneli");?> 
@endif

@stop
