@extends('master')
@section('desc'){{$ayarlar->description}} @stop
@section('sayfatitle') {{$ayarlar->title}} @stop
@section('content_homepage')

    <script src="sliderengine/amazingslider.js"></script>
    <link rel="stylesheet" type="text/css" href="sliderengine/amazingslider-1.css">
    <script src="sliderengine/initslider-1.js"></script>

    <style>
    .amazingslider-nav-1{
        top: 90% !important;
    }
    </style>
    <!-- Insert to your webpage where you want to display the slider -->
  
        <div class="sliderustalan"></div>
        <div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:100%;margin:0px auto 40px;">
            <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
                <ul class="amazingslider-slides" style="display:none;">
                @foreach($sliders as $key=>$slider)
                @if(($slider->durum) == '1' && ($slider->tur) == 'Manset')
                    @if($slider->link) <a href="{{$slider->link}}"> <li><img src='{{ asset("img/slider/$slider->slider_resim_url") }}' alt="{{$slider->slider_icerik}}"  title="{{$slider->slider_adi}}" /></li> </a>
                    @else <li><img  src='{{ asset("img/slider/$slider->slider_resim_url") }}' alt="{{$slider->slider_icerik}}"  title="{{$slider->slider_adi}}" /></li> @endif
                @endif
                @endforeach
                </ul>
            </div>
        </div>
    <!-- slider code is over -->

    <!-- BEGIN OF THE CAMPAIGN  CODE -->

    <div class="urunlerimiz">
        <div class="container"> <?php $key=0 ?>
        @foreach($sliders as $slider)
        @if(($slider->tur) == 'Banner' && ($slider->durum) == '1') <?php $key++; ?>
        <a href="{{$slider->link}}">
          <div class="col-md-4 col-sm-4" > 
              <div class="urunadi pull-right"  style="position: relative;"> {{$slider->slider_adi}} </div>
              <div class="urun">
			  @if($slider->slider_resim_url)
			  <img style="width:100%; height:250px;" src='{{ asset("img/banner/$slider->slider_resim_url") }}'> </div>
			  @else
			  <img style="width:100%; height:250px;" src='{{ asset("img/gorsel-hazirlaniyor.png") }}'> </div>
			  @endif
              <div class="clearfix"></div>
          </div>
        </a>
        @if($key%3==0) <div class="clearfix"></div> @endif
        @endif
        @endforeach
        </div>
    </div>

    <!-- END OF THE CAMPAIGN  CODE -->



    <div class="clearfix"></div>

    <div class="firsat-urunu">
        <div class="container">
            <div class="col-sm-2 text-center"> </div>
            <div class="col-sm-8 text-center"> <img width="100%" src="{{ asset('img/urunlerimiz.png') }}"> </div>
            <div class="col-sm-2 text-center"> </div>
        </div>
	</div>
	
    <div class="clearfix"></div>
    <div class="bosluk20"></div>
	
	<div class="urunlerimiz">
        <div class="container"> <?php $key=0 ?>
        @foreach($menuler as $kategori)
        @if(($kategori->kategori_id) == '3' && $kategori->menudeki_yeri == 'Sol' && $kategori->anasayfada_goster == '1') <?php $key++; ?>
        <a href="{{$kategori->sayfa_linki}}">
          <div class="col-md-6 col-sm-6" >
			<div class="urunv1">
			  @if($kategori->icon)
              <img style="width:100%; height:300px;" src='{{ asset("img/icon/$kategori->icon") }}'>
			  @else
              <center><img style="height:300px;" src='{{ asset("img/hazirlaniyor.png") }}'></center>
			  @endif
              <div class="urunv1ad"  style="position: relative;"><i class="glyphicon glyphicon-th-large"></i> {{$kategori->sayfa_adi}} </div>
              <div class="clearfix"></div>
			</div>
          </div>
        </a>
        @if($key%2==0) <div class="clearfix"></div> @endif
        @endif
        @endforeach
        </div>
    </div>	

    <div class="clearfix"></div>
@stop