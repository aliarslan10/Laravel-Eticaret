@extends('master')
@section('content')

<!-- iletisim_tema ve iletisim_arayuz Özel CSS -->
<link href="{{ asset('css/iletisim.css') }}" rel="stylesheet">

<div class="breadcrumb">
  <div class="container">
    <a href="{{asset('/')}}">Anasayfa</a>
	<i class="glyphicon glyphicon-chevron-right"></i> @yield('breadcrumb')
</div>
</div>

<div class="icerik">
<div class="container">
	<div class="col-sm-6 yazialani">
		<div class="col-sm-12 yazibaslik">
	  		@yield('iletisim_sol_baslik')
		</div>
		<div class="col-sm-12 yazi">
	  		@yield('iletisim_sol_icerik')
		</div>
	</div>

	<div class="col-sm-6 menualanimobil">
	<div class="menualani">
		<div class="menubaslik">
	  		 @yield('iletisim_sag_baslik') 
		</div>
		<div class="menu">
	  		@yield('iletisim_sag_icerik')
		</div>
	</div>
	</div>
</div>
</div>

@stop