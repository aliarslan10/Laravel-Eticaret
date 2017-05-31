@extends('kullanici.kullanici_tema')

@section('desc') Kullanıcı Menüsü @stop
@section('sayfatitle') Kullanıcı Menüsü @stop
@section('breadcrumb') Kullanıcı Menüsü @stop	
@section('baslik') Kullanıcı Menüsü   @stop


@if(Session::has('giris_kullanici'))

	@section('kullanici_menu_baslik') Hoşgeldiniz Sayın, @stop
	
	@section('kullanici_menu')
	@foreach(Session::get('giris_kullanici') as $kullanici)
		<h4> {{$kullanici->ad_soyad}} </h4> <hr>
	@endforeach
	<ul>
	  <li> <i style="color: gray;" class="glyphicon glyphicon-user"> </i> <a href="{{ asset('bilgilerim') }}"> Üye İşlemleri </a></li>
	  <li> <i style="color: gray;" class="glyphicon glyphicon-shopping-cart"> </i> <a href="{{ asset('sepetim') }}"> Alışveriş Sepetim </a></li>
	  <li> <i style="color: gray;" class="glyphicon glyphicon-file"></i> <a href="{{ asset('siparislerim') }}"> Siparişlerim </a></li>
	  <li> <i style="color: gray;" class="glyphicon glyphicon-gift"> </i> <a href="{{ asset('puanlarim') }}"> Puanlarım </a></li>
	  <li> <i style="color: gray;" class="glyphicon glyphicon-log-out"> </i> <a href="{{ asset('cikis') }}"> Çıkış Yap </a></li>
	</ul>
	@stop


	@section('kullanici_yazi')

	<link rel="stylesheet" href="{{ asset('css/kullanici.css') }}"/>

	<div class="myBody">
	    <div class="myList">
	        <h4>  <i style="color: gray;" class="glyphicon glyphicon-check"> </i> <a href="{{ asset('bilgilerim') }}">Üye Bilgilerim</a></h4>
	        <p>Profilinizi buradan güncelleyebilirsiniz.</p>
	    </div>
	    <div class="myList">
	        <h4><i style="color: gray;" class="glyphicon glyphicon-check"> </i> <a href="{{ asset('sepetim') }}">Alışveriş Sepetim</a></h4>
	        <p>Alışveriş sepetinizi görüntüleyebilirsiniz.</p>
	    </div>
	    <div class="myList">
	        <h4><i style="color: gray;" class="glyphicon glyphicon-check"> </i> <a href="{{ asset('siparislerim') }}">Siparişlerim</a></h4>
	        <p>Sipariş detaylarınızı görebilirsiniz.</p>
	    </div>
	    <div class="myList">
	        <h4><i style="color: gray;" class="glyphicon glyphicon-check"> </i> <a href="{{ asset('puanlarim') }}">Puanlarım</a></h4>
	        <p>Bu alandan favori ürünlerini ve çeklerinizi görebilirsiniz.</p>
	    </div>
	    <div class="myList">
	        <h4><i style="color: gray;" class="glyphicon glyphicon-check"> </i> <a href="{{ asset('cikis') }}">Çıkış Yap</a></h4>
	        <p>Buraya tıklayarak güvenli bir şekilde sistemden çıkış yapabilirsiniz.</p>
	    </div>
	</div>	

	</div>
	@stop

@else

	@section('erisim_engeli')
		<div class="col-sm-4">
			<div class="alert alert-info"> <b> Ücretsiz Kayıt Ol </b><br /><div class="bosluk10"></div> Kullanıcı panelini sadece üyelerimiz görüntüleyebilir. Kayıt olmak için 
			<a href="{{asset('kayit-ol')}}"><u>buraya tıklayınız.</u><br /></a> <center> <h1><i class="glyphicon glyphicon-plus-sign"></i></h1> </center>
			</div>
		</div>
		<div class="col-sm-4"> 
			<div class="alert alert-warning"><b>Giriş Yap </b><div class="bosluk10"></div>Sistemimizde daha önceden üyeliğiniz varsa 
				<a href="{{ asset('giris-yap') }}"><u>buraya tıklayarak</u></a> üye girişi yapabilirsiniz. <center> <h1><i class="glyphicon glyphicon-ok-sign"></i></h1> </center>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="alert alert-success">  <b> Alışverişe Devam Et! </b><div class="bosluk10"></div>
			<a href="{{asset('urunlerimiz')}}"><u>Buraya tıklayarak</u></a>  sistemimize kayıt olmadan alışverişinize devam edebilirsiniz.
			<center> <h1><i class="glyphicon glyphicon-shopping-cart"></i></h1> </center>
			</div>
		</div>
	@stop
@endif

