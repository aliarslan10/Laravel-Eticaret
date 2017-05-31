@extends('urunler.urunler_tema')
@section('menu_baslik') Ürünlerimiz @stop

@section('menu')
<ul>
@foreach($urunler_menu as $menu)
	<li><i class="glyphicon glyphicon-chevron-right"></i> <a href='{{ asset("$menu->sayfa_linki") }}'>{{$menu->sayfa_adi}}</a></li>
@endforeach
	<li><i class="glyphicon glyphicon-chevron-right"></i> <a href='{{ asset("urunlerimiz") }}'>TÜM ÜRÜNLERİMİZ</a></li>
</ul>
@stop

@if(isset($tumurunler['0']))
@if(isset($sayfaicerik))
	@section('yazi_baslik') <h2 style="margin:10px 0 20px 0;"> Fırsat Ürünleri </h2> @stop
	@section('breadcrumb') Fırsat Ürünleri @stop
	@section('sayfatitle') Fırsat Ürünleri @stop
@elseif(isset($aramakelimesi))
	@section('yazi_baslik') <h2 style="margin:10px 0 20px 0;"> "{{$aramakelimesi}}" kelimesi için arama sonuçları </h2> @stop
	@section('breadcrumb') Arama Sonuçları @stop
	@section('sayfatitle')  {{$aramakelimesi}} kelimesi için Arama Sonuçları @stop
@else
	@section('yazi_baslik') <h2 style="margin:10px 0 20px 0;"> Tüm Ürünlerimiz </h2> @stop
	@section('breadcrumb')Tüm Ürünlerimiz @stop	
	@section('sayfatitle') Ürünlerimiz @stop
	@section('desc') Ürünlerimiz @stop
@endif
@section('yazi')   
   <div class="firsat-urunu">
        <div class="container">
            <div class="row">
                <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">

                    <?php $sayac=0; ?>

                    @foreach($tumurunler as $key=>$firsaturunu)
                    @if($firsaturunu->firsat_urunu && isset($firsaturunu->firsat_urunu))
                    @if($sayac==0)  <div class="item active"> <div class="row"> <!-- There are 4 active item. Begining of active item. -->  @endif 
                    @if($sayac==4)  <div class="item"> <div class="row"> @endif
                    
                     <a href='{{ asset("$firsaturunu->sayfa_linki") }}' style="color:black;">
                        <div class="col-sm-3">
                            <div class="col-item"  style="border: 1px solid black;">
                                <div class="photo">
                                @if($firsaturunu->resim_linki)
                                    <img style="width: 100%; height: 220px; overflow: hidden;" src='{{ asset("img/urunler/$firsaturunu->resim_linki") }}' class="img-responsive" alt="" />
                                @else
                                    <img src='http://placehold.it/350x260' class="img-responsive" alt="" />
                                @endif
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-12">
                                            <h5 style="text-align: center; font-weight: bold; font-size: 16px; padding-bottom: 10px;">{{$firsaturunu->sayfa_adi}}</h5>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                        <p class="btn-add">
                                            <i class="fa fa-shopping-cart"></i><a href="javascript:;" productcode="{{$firsaturunu->urun_id}}" productname="{{$firsaturunu->sayfa_adi}}" id="{{$key}}" class="hidden-sm addtocartbutton" style="color: #0d5bbc; font-weight: bold;">SEPETE EKLE <meta name="csrf-token" content="{!! Session::token() !!}"> </a></p>
                                        <p class="btn-details">
                                            <del style="color:red;">{{$firsaturunu->fiyat}} TL</del> <b style="font-size:16px; color:black;">{{$firsaturunu->indirimli_fiyat}} TL</b>
                                        </p>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>


                    @if($sayac==3)  </div></div> <!-- There are 4 active item. End of active item. -->  @endif 
                    <?php $sayac++; ?>
                    
                    @endif
                    @endforeach
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@else
@section('yazi') <br/>  <div class="alert alert-danger"><i class="fa fa-info-circle"></i> Aradığınız içerik sitede mevcut değil. </div> @stop
@endif