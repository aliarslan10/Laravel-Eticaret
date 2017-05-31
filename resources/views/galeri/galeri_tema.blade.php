@extends('master')
@section('content')

<!-- galeri_tema ve galeri_arayuz Özel CSS -->
<link href="{{ asset('css/galeri.css') }}" rel="stylesheet">

<script type="text/javascript" src="{{ asset('fancybox/lib/jquery.mousewheel-3.0.6.pack.js') }}"></script>
<link rel="stylesheet" href="{{ asset('fancybox/source/jquery.fancybox.css?v=2.1.5') }}" type="text/css" media="screen" />
<script type="text/javascript" src="{{ asset('fancybox/source/jquery.fancybox.pack.js?v=2.1.5') }}"></script>
<link rel="stylesheet" href="{{ asset('fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5') }}" type="text/css" media="screen" />
<script type="text/javascript" src="{{ asset('fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5') }}"></script>
<script type="text/javascript" src="{{ asset('fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6') }}"></script>
<link rel="stylesheet" href="{{ asset('fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7') }}" type="text/css" media="screen" />
<script type="text/javascript" src="{{ asset('fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7') }}"></script>

<script type="text/javascript">
	$(document).ready(function(){
	    //FANCYBOX
	    //https://github.com/fancyapps/fancyBox
	    $(".fancybox").fancybox({
	    	openEffect: "none",
	    	closeEffect: "none"
	    });
	});
</script>

<div class="breadcrumb">
  <div class="container">
    <a href="{{asset('/')}}">Anasayfa</a>
    <i class="glyphicon glyphicon-chevron-right"></i> <a href="{{asset('/galeri')}}">Galeri</a>
	<i class="glyphicon glyphicon-chevron-right"></i> @yield('breadcrumb')
</div>
</div>

<div class="icerik">
<div class="container">
	<div class="col-sm-9 yazialani">
		<div class="col-sm-12 yazibaslik">
	  		@yield('galeri_yazi_baslik')
		</div>
		<div class="col-sm-12 yazi">
	  		@yield('galeri_yazi')
		</div>
	</div>

	<div class="col-sm-3 menualanimobil">
	<div class="menualani">
		<div class="menubaslik">
	  		<h3> @yield('galeri_menu_baslik') </h3>
		</div>
		<div class="menu">
	  		@yield('galeri_menu')
		</div>
	</div>
	</div>
</div>
</div>

@stop