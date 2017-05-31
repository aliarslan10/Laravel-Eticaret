@extends('eticaret.eticaret_tema')

@section('desc') Kullanıcı Menüsü @stop
@section('sayfatitle') Kullanıcı Menüsü @stop
@section('breadcrumb') Kullanıcı Menüsü @stop	
@section('baslik') Kullanıcı Menüsü   @stop

@if(Session::has('giris_kullanici'))

	@section('sepet_menu_baslik') Hoşgeldiniz Sayın, @stop
	
	@section('sepet_menu')
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
@else
	@section('sepet_menu')
		Kullanıcı Girişi Yap.
	@stop
@endif