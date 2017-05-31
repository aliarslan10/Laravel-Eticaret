@extends('kullanici.kullanici_tema')

@section('desc') Kayıt Ol @stop
@section('sayfatitle') Kayıt Ol @stop
@section('breadcrumb') Kayıt Ol @stop	
@section('baslik') Kayıt   @stop


@section('kullanici_menu_baslik') Kullanıcı Menüsü @stop
@section('kullanici_menu')
	<ul>
	  <li><i style="color: gray;" class="glyphicon glyphicon-chevron-right"></i> <a href="#"> asdsad </a></li>

	</ul>
@stop


@section('kullanici_yazi')

<link rel="stylesheet" href="{{ asset('css/kp.css') }}"/>
	@if(Session::has('giris_kullanici'))

<nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="background-color: black;">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav">
            	<li><a style="background-color:#444;" href="{{asset('kullanici-paneli')}}"><i class="glyphicon glyphicon-home"></i></a></li>
                <li><a href="{{ asset('kullanici-bilgileri') }}">Hesap Ayarları</a></li>
                <li><a href="{{ asset('chat-odalari') }}"> ### </a></li>
					{{-- <li><a href="{{ asset('analizler') }}">Analizler</a></li> --}}
                <li><a href="{{ asset('mesaj-at') }}">Destek Paneli</a></li>
                <li><a href="{{ asset('cikis') }}">Çıkış Yap</a></li>
            </ul>
        </div>
    </div>
</nav>

<div style="min-height:150px;">
    @yield('kp_content')
</div>
	@else
	<div class="bosluk30"></div>
	<div class="bosluk20"></div>
	<div class="col-sm-4">
		<div class="alert alert-info"> <b> Üye Ol </b><br /><div class="bosluk10"></div>
		Kullanıcı panelini ve kullanıcılara özel strateji odalarını sadece üyelerimiz görüntüleyebilir. Ücretsiz üye olmak için 
		<a href="{{asset('kayit-ol')}}"><u>buraya tıklayınız.</u><br /></a>
		</div>
	</div>
	<div class="col-sm-4"> 
		<div class="alert alert-warning"><b>Giriş Yap </b><div class="bosluk10"></div>Sistemimizde daha önceden üyeliğiniz varsa 
			<a href="{{ asset('giris-yap') }}"><u>buraya tıklayarak</u></a> üye girişi yapabilirsiniz.
			<div class="bosluk10"></div><div class="bosluk10"></div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="alert alert-success">  <b> Herkese Açık Strateji ve Sohbet Odasına Git </b><div class="bosluk10"></div>
		<a href="{{asset('chat/forex-sohbet-ve-strateji')}}"><u>Buraya tıklayarak</u></a>  herkese açık olan strateji odamızı kullanabilirsiniz.
		<div class="bosluk20"></div>
		</div>
	</div>
	<div class="bosluk30"></div><div class="bosluk30"></div><div class="bosluk30"></div>
	<div class="bosluk30"></div><div class="bosluk30"></div>
	@endif
 @stop

