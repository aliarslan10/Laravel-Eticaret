<!DOCTYPE html>
<html lang="tr-TR" itemscope="" itemtype="http://schema.org/WebSite"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title> @yield('sayfatitle') - LARAVEL E-TİCARET</title>
	
    <!-- SEO -->
    <meta name="author" content="LARAVEL E-TİCARET">
    <meta name="description" itemprop="description" content="@yield('desc')LARAVEL E-TİCARET"/>
	<link rel="canonical" href="{{Request::fullUrl()}}">
  
    <!-- Mobil Site -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <!-- Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="#">    
    <!-- Favicon-->
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    
    <!-- JS -->
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Özelleştirmeler -->
    <link href="{{ asset('css/genel.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tasarim1.css') }}" rel="stylesheet">

    <!-- FONTS -->
    <!-- <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" /> -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Exo" />

</head>
<body>

  <div class="headerust">
  <div class="container">
		<div class="col-sm-4">
			<ul class="list-inline  uyeislemleri">
				<li><a href="{{'/'}}"> <i class="fa fa-home"></i> Anasayfa </a></li>
				<li><a href="{{'urunlerimiz'}}"> <i class="fa fa-table"></i> Ürünlerimiz </a></li>
				<li><a href='{{ asset("sik-sorulan-sorular") }}'> <i class="fa fa-book"></i> Müşteri Hizmetleri </a></li>
			</ul>
		</div>
		
		<div class="col-sm-4 text-center">
            
		</div>
        <div class="col-sm-4 col-xs-12">
        @if(Session::has('giris_kullanici'))
        <ul class="list-inline pull-right uyeislemleri row">
            <li><a href='{{ asset("sepetim") }}' data-toggle="modal"><i class="fa fa-shopping-cart hidden-sm"> </i> Sepetim <b>(<span id="cartcount">{{ count(Session::get('sepet')) }}</span>)</b> </a></li>
        @foreach(Session::get('giris_kullanici') as $kullanici)
            <li><a href="kullanici-paneli"><i class="glyphicon glyphicon-user"> </i> <i>Hoşgeldiniz Sayın,</i> <b>{{$kullanici->ad_soyad}}</b> </a></li>
        @endforeach
        </ul>
        @else
        <ul class="list-inline pull-right uyeislemleri">
            <li><a href='{{ asset("kayit-ol") }}'><i class="fa fa-user-plus hidden-sm"> </i> Üye Ol</a></li>
            <li><a href='{{ asset("giris-yap") }}'> <i class="fa fa-sign-in  hidden-sm"> </i> Üye Girişi</a></li>
            <li><a href='{{ asset("sepetim") }}' data-toggle="modal"><i class="fa fa-shopping-cart  hidden-sm"> </i> Sepetim <b>(<span id="cartcount">{{ count(Session::get('sepet')) }}</span>)</b> </a></li>
        </ul>
        @endif
        </div>
    </div>
	</div>
	
	<div class="clearfix"></div>
	
	<div class="logoalani">
	<div class="container">
		<div class="col-sm-4">
            <a href='{{ asset("/") }}'>
                <img class="logo" src="{{ asset('img/logo.jpg') }}">
            </a>
		</div>
		<div class="col-sm-4">
		</div>
		<div class="col-sm-4">
			<div class="bosluk20"></div>
			{{ Form::open(['url'=>'urun-arama']) }}
			{{ Form::text('keywordstosearch','',array('placeholder'=>'Ne Aramıştınız?','class'=>'searchInput')) }}
			{{ Form::submit('Ara',array('class'=>'searchButton')) }}
			{{ Form::close() }}
		</div>
	</div>
	</div>


	<div class="clearfix"></div>
 
    <nav class="navbar navbar-default">
    <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Açılır Menü</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
                  @foreach($menuler as $urun_kategori)
                    @if($urun_kategori->menudeki_yeri == 'Sol')
                      @if(($urun_kategori->kategori_id) ==  '3')
                      <li>
                       <center class="hidden"><img width="50" height="50" src='{{ asset("img/icon/$urun_kategori->icon") }}'></center>
                       <a href='{{ asset("$urun_kategori->sayfa_linki") }}'>{{$urun_kategori->sayfa_adi}} </a>
                      </li>
                      @endif
                    @endif             
                  @endforeach
                </ul>
            </div>
      </div>
    </nav>

	<div class="clearfix"></div>
	
@yield('content')
@yield('content_homepage')

    <div class="footerback">
        <div class="container">
            <div class="col-sm-3">
                <div class="bosluk20"></div>
                <div class="fbaslik">LARAVEL E-TİCARET</div>
                <div class="icerikline"></div>
                <div class="flist">
                    <ul class="footermenu" id="">
                    <li class=""><a href="{{asset('/')}}"><span class=""></span>Anasayfa</a></li>
                    <li class=""><a href="{{asset('hakkimizda')}}"><span class=""></span>Hakkımızda</a></li>
                    <li class=""><a href="{{asset('urunlerimiz')}}"><span class=""></span>Ürünlerimiz</a></li>
                    <li class=""><a href="{{asset('musteri-temsilcisi')}}"><span class=""></span>Müşteri Temsilcisi</a></li>
                    <li class=""><a href="{{asset('iletisim')}}"><span class=""></span>İletişim</a></li>
                    </ul>
                </div>
                <div class="bosluk50"></div>
            </div>
            <div class="col-sm-3">
            <div class="bosluk20"></div>
                <div class="fbaslik">Sipariş</div>
                <div class="icerikline"></div>
                <div class="flist">
                   <ul class="footermenu" id="">
                    <li class=""><a href="{{asset('sik-sorulan-sorular')}}"><span class=""></span>Sık Sorulan Sorular</a></li>
                    <li class=""><a href="{{asset('mesafeli-satis-sozlesmesi')}}"><span class=""></span>Mesafeli Satış Sözleşmesi</a></li>
                    <li class=""><a href="{{asset('iade-ve-iptal-islemleri')}}"><span class=""></span>İade ve İptal İşlemleri</a></li>
                    <li class=""><a href="{{asset('gizlilik-ve-guvenlik')}}"><span class=""></span>Gizlilik ve Güvenlik</a></li>
                    <li class=""><a href="{{asset('odeme-secenekleri')}}"><span class=""></span>Ödeme Seçenekleri</a></li>
                    </ul>
                </div>
                <div class="bosluk50"></div>
            </div>
            <div class="col-sm-3">
            <div class="bosluk20"></div>
                <div class="flist">
                    <div class="fbaslik">Üye Menüsü</div>
                    <div class="icerikline"></div>
                    <ul class="footermenu" id="">
                        <li class=""><a href="{{asset('kayit-ol')}}"><span class=""></span>Üye Ol</a></li>
                        <li class=""><a href="{{asset('giris-yap')}}"><span class=""></span>Giriş Yap</a></li>
                        <li class=""><a href="{{asset('kullanici-paneli')}}"><span class=""></span>Hesabım</a></li>
                        <li class=""><a href="{{asset('sepetim')}}"><span class=""></span>Sepet</a></li>
                        <li class=""><a href="{{asset('siparislerim')}}"><span class=""></span>Sipariş Takibi</a></li>
                    </ul>
                </div>
                <div class="bosluk50"></div>
            </div>
            <div class="col-sm-3">
            <div class="bosluk20"></div>
                <div class="flist">
                    <div class="fbaslik">Sipariş ve Sorularınız İçin</div>
                    <div class="icerikline"></div>
                    <ul class="footermenu">
                        <li>
                        <h3 style="margin-top:5px;"> {{ $ayarlar->enust_bilgi }}  </h3>
                        <h4 class="socialmedia"> 
							<a target="_blank" href="{{ $ayarlar->facebook }}"> <i class="fa fa-facebook fa-2x"></i> </a>
							<a target="_blank" href="{{ $ayarlar->twitter }}"> <i  class="fa fa-twitter fa-2x"></i>  </a>
							<a target="_blank" href="{{ $ayarlar->instagram }}"> <i class="fa fa-instagram fa-2x"></i></a>
							<a data-toggle="tooltip" data-placement="top" title="WhatsApp Sipariş Numaramız 0(542) 547 76 77"> 
							<i class="fa fa-whatsapp fa-2x"></i></a>
						</h4>
                        </li>
						<div class="clearfix"></div>
						<div class="bosluk20"></div>
                        <li>
						<div class="bosluk20"></div>
						<div class="clearfix"></div>
                        <div class="announcements hidden-xs">
                        {{ Form::open(['action'=>'AnasayfaController@ebulten']) }}
						{{ Form::email('eposta', '', array('class'=>'announcementsInput', 'placeholder'=>'e-mail listemize abone olun')) }}
						{{ Form::submit('Kaydet', array('class'=>'announcementsButton')) }}                  
						{{ Form::close() }}
                        </div>
                        </li>
                    </ul>
                </div>
                <div class="bosluk100"></div>
                <div class="bosluk50"></div>
            </div>
        </div>
        <div class="clearfix"></div>
        
         <div class="footerinfo">
                <div class="container">
                    <div class="col-sm-4">
                     <div class="bosluk10"></div>
                            <b> Copyright 2017 © LARAVEL E-TİCARET ALİ ARSLAN ® Tüm Hakları Saklıdır.
                    </div>
					<div class="col-sm-6"><img width="100%" src='{{ asset("img/allcards.png") }}'></div>
                    <div class="col-sm-2">
                        <div class="pull-right">
                            <div class="imza">
								LARAVEL E-TİCARET ALİ ARSLAN
                            </div>
                        </div>
                    </div>
                </div>
        </div>       
    </div>

    <div class="clearfix"></div>
    
    <!-- SEPET JS -->
    <script type="text/javascript" src="{{ asset('js/jquerysession.js') }}"></script>
    <script type="text/javascript" src="{{-- asset('js/sepet.js') --}}"></script>


    <style type="text/css">
      .sepetBildirimi{
        display: none; margin: 0px auto; position: fixed; z-index: 1031; bottom: 1%; left: 20px;
      }
    </style>

    <div data-notify="container" class="col-xs-11 col-sm-3 alert alert-success animated fadeInDown sepetBildirimi" role="alert">
      <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 10px; z-index: 1035;"> × Kapat</button>
      <span data-notify="icon" class="glyphicon glyphicon-warning-sign"></span> <span data-notify="title"><b> Sepetinize bir ürün eklediniz. </b></span>
      <span data-notify="message">
      <div class="bosluk10"></div>
      <div id="bildirimsepeti"></div>
      <div class="bosluk10"></div>
      <a href="{{asset('sepetim')}}"> <button> Tüm Sepeti Görüntüle </button> </a>
      </span>
      <a href="#" target="_blank" data-notify="url"></a>
    </div>
    <!-- SEPET JS SON -->
    <script>
	$(document).ready(function(){
	  $('[data-toggle="tooltip"]').tooltip();
	})	
	</script>
	<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58dca1a8894c6339"></script> 
    </body>
</html>