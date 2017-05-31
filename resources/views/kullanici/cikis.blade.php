@extends('kullanici.kullanici_paneli_arayuz')
@section('desc') Çıkış @stop
@section('sayfatitle') Kullanıcı Çıkışı @stop
@section('mi_breadcrumb') <li> Çıkış </li> @stop
@section('mi_icerik')

@section('erisim_engeli')
<div class="clearfix"></div>
	<div class="container">
		<div class="col-sm-7">
			<div class="alert alert-success">
				Çıkış işlemin başarılı. Anasayfaya yönlendiriliyorsunuz...
				<?php header("Refresh:2; url=/") ?>
			</div>
		</div>
	</div>

<div class="bosluk100"></div>
<div class="bosluk10"></div>
<div class="bosluk10"></div>
<br />
<br />
@stop