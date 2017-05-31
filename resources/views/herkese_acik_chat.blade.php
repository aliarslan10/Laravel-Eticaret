@extends('master_icerik')
		@section('desc') Mavi Forex Sohbet ve Strateji Odası @stop
		@section('sayfatitle') Mavi Forex Sohbet ve Strateji Odası @stop
		@section('mi_breadcrumb')<li class="active"> Mavi Forex Sohbet ve Strateji Odası </li>	@stop	
		@section('mi_baslik') Mavi Forex Sohbet ve Strateji Odası @stop
		@section('mi_icerik')
<div class="col-sm-9">
  <div class="col-sm-12">
  	<div class="alert alert-info">Bu sohbet odası herkese açıktır. Forex ile ilgili güncel istatistik sohbetlerinin yapıldığı sohbet odalarımızı görüntüleyebilmek için sitemize ücretsiz üye olabilirsiniz. </div>
	{{-- controller mantığı desktop sürümü pasif <div class="alert alert-success hidden-lg hidden-md hidden-sm"><a href="{{ asset('chat_desktop/forex-sohbet-ve-strateji') }}"><center> Masaüstü Sürüm </center></a></div> --}}
  </div>
  <!-- CHAT -->
  <div class="col-sm-12" style="margin-bottom:-30px">
	<iframe width="100%" height="475px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" allowtransparency="true" src="https://chatroll.com/embed/chat/mavi-forex-strateji-ve-sohbet-odas?id=kTT2PhxsQD4&platform=html"></iframe><br/><div style="font-size:0.9em;text-align:center;"></div>
	</div>
	<div class="col-sm-11" style="z-index:1; height:20px; background-color:white;"> </div>
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

		<div class="col-sm-12 sidebarbaslik">Reklam Alanı
		</div>
		<div class="col-sm-12 sabityanmenuicerik">
			<a rel="nofollow" target="_blank" href="#"><img src="{{ asset('img/ckova.jpg') }}"/></a>
		</div>
</div>
@stop