@extends('master_icerik')
		@section('desc') Arşiv @stop
		@section('sayfatitle') Arşiv @stop
		@section('mi_breadcrumb')<li class="active">Arşiv</li>	@stop	
		@section('mi_baslik') Arşiv @stop
		@section('mi_icerik')
		
		
		<link rel="stylesheet" href="{{ asset('datepicker/css/bootstrap-datepicker.min.css') }}">
		<script type="text/javascript" src="{{ asset('datepicker/js/bootstrap-datepicker.min.js') }}"></script>
		<div class="col-sm-9">
		{{ Form::open(['action'=>'SabitSayfalarController@arsiv', 'method'=>'POST']) }}
        <input type="text" name="baslangic" placeholder="Arşiv Başlangıç Tarihi Seç" class="tarih_sec">
        <input type="text" name="bitis" placeholder="Arşiv Bitiş Tarihi Seç" class="tarih_sec">
		 <button class="btn btn-primary col-sm-12" style="background-color:#0a2349;"> <i class="glyphicon glyphicon-search"> </i> Seçili Tarih Aralığındaki Analizleri Göster </button>
		{{ Form::close() }}
		<br />
		<br />
				
<script type="text/javascript">
$(document).ready(function () {
        $('.tarih_sec').datepicker({
			format: "yyyy-mm-dd",
			weekStart: 1,
			language: "tr",
			forceParse: false,
			autoclose: true,
			todayHighlight: true
        });
});
</script>


{{-- ++++++++++++++++++++++++++++++ Son Yazılar ve Devamını Oku Linkleri ++++++++++++++++++++++++++++++ --}}
		@if(($arsivDurum)=="goster")
		@foreach($arsiv as $key => $icerik)
			<div class="col-sm-12"> <h3 style="border-bottom:3px dashed #e8e8e8; font-size:20px;" > <a target="_blank" href='{{ asset("analiz/$icerik->sayfa_linki") }}'> {{$icerik->baslik}} </a> </h3></div>
			<div class="col-sm-4"> <img style="max-height:100px; width:100%;" src="@if(($icerik->resim_linki)==null) img/gorsel-hazirlaniyor.jpg @else img/blog/{{$icerik->resim_linki}} @endif" alt="{{$icerik->resim_linki}}" title="{{$icerik->resim_linki}}"></div>
			<div class="col-sm-8">
				<div class="col-sm-12 row" style="min-height:50px;">
					<?php
						 $yazi = strip_tags($icerik->icerik); //html öğelerini ayıklar
						 $uzunluk = strlen($yazi);
						 $sinir = 350;

						 if ($uzunluk > $sinir)
						 {
						 	$icerik->icerik = substr($yazi,0,$sinir).".....";
						 }
					 ?>
					   	<p> <?=strip_tags($icerik->icerik)?> </p>
				</div>
				<div class="col-sm-12" style="text-align:right;"> <a target="_blank" href='{{ asset("analiz/$icerik->sayfa_linki") }}'> Tamamını Gör >> </a> </div>
			</div>
			<div class="clearfix"></div><br/><br/>
		@endforeach
		@if(!isset($arsiv[0]))
			<div class="alert alert-danger"><i class="glyphicon glyphicon-remove"></i> <b>Belirttiğiniz tarih aralığı ile ilgili analiz bulunamadı.</b></div>
		@endif
		@endif
		{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
		
		@if(($arsivDurum)=="hata")
			<div class="alert alert-danger"><i class="glyphicon glyphicon-remove"></i><b> Hata : Lütfen geçerli bir tarih aralığı seçin.<div class="bosluk10"></div>
			Almış olduğunuz hatanın olası sebepleri : </b><br/>
			1) Başlangıç tarihi bitiş tarihinden büyük olamaz. <br />
			2) Tarih kutucukları boş olamaz. <br />
			</div>
		@endif
		{{-- ++++++++++++++++++++++++++++++ Son Yazılar ve Devamını Oku Linklerinin Yanındaki Sidebar ++++++++++++++++++++++++++++++ --}}
		</div>
		<div class="col-sm-3 sagsidebar">
		<div class="col-sm-12 sidebarbaslik"> Üyelik İşlemleri </div>
		<div class="col-sm-12 sabityanmenuicerik">
		@if(!Session::has('giris_kullanici'))
			<i class="glyphicon glyphicon-ok-sign"></i><a href='{{ asset("kayit-ol") }}'> Ücretsiz Üye Ol </a>  &nbsp; &nbsp;
            <i class="glyphicon glyphicon-log-in"></i><a href='{{ asset("giris-yap") }}'> Giriş Yap</a>
            @else 
            <i class="glyphicon glyphicon-user"></i><a href='{{ asset("kullanici-paneli") }}'> Kullanıcı Paneli</a> &nbsp;   
            <i class="glyphicon glyphicon-log-out"></i><a href='{{ asset("cikis") }}'> Çıkış Yap </a>
        @endif
		</div>

			<div class="col-sm-12 sidebarbaslik"> Son Analizler </div>
			<div class="col-sm-12 sabityanmenuicerik">
				<ul style="text-align:left">
				@foreach($blogSonIceriklerMenu as $key => $icerik)
					<li><i class="glyphicon glyphicon-signal"></i> <a href='{{ asset("analiz/$icerik->sayfa_linki") }}'>{{$icerik->baslik}}</a> </li>
				@endforeach
				</ul>
			</div>

			<div class="col-sm-12 sidebarbaslik"> Reklam Alanı </div>
			<div class="col-sm-12 sabityanmenuicerik">
				<a rel="nofollow" target="_blank" href="#"><img src="{{ asset('img/ckova.jpg') }}"/></a>
			</div>
		</div>
		{{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
@stop
