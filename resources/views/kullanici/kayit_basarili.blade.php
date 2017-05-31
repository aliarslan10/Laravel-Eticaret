@extends('master_icerik')
@section('desc') Kullanıcı Kaydı @stop
@section('sayfatitle') Kayıt Başarılı @stop
@section('mi_breadcrumb') <li> Kayıt Sayfası </li> @stop
@section('mi_icerik')
	<div class="container">
		<div class="col-sm-9">
			<div class="alert alert-success" role="alert">
				Üyeliğiniz başarıyla oluşturuldu. Mail adresiniz ve şifrenizle sisteme giriş yapabilirsiniz. <br />
				<a href="{{ asset('giris-yap') }}"> Giriş yapmak için buraya tıklayınız. </a>
			</div>
		</div>
	</div>
<div class="bosluk100"></div>
<div class="bosluk100"></div>
<br />
<br />
@stop