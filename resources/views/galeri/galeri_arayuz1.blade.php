@extends('galeri.galeri_tema')
@section('desc') Galeri @stop
@section('sayfatitle') Galeri @stop
@section('breadcrumb') Bizden Kareler @stop
@section('baslik') Bizden Kareler @stop

<!-- Sistemdeki kategorilere ait tüm resimlerin gösterimi arayüzde -->

@section('galeri_menu_baslik') Bizden Kareler @stop
@section('galeri_menu')
<ul>
@foreach($galeri as $menu)
    <li><i style="color: gray;" class="glyphicon glyphicon-chevron-right"></i> <a href='{{ asset("$menu->sayfa_linki") }}'>{{$menu->sayfa_adi}}</a></li>
@endforeach
<li><i style="color: gray;" class="glyphicon glyphicon-chevron-right"></i> <a href='{{ asset("galeri") }}'>Tüm Resimler</a></li>
</ul>
@stop

@if(isset($galeri['0']))
    @section('galeri_yazi_baslik') <h2>Galeri</h2> @stop
    @section('galeri_yazi')

        <div class='list-group gallery'>
        @foreach($galeri as $key => $icerik)
            @foreach($resimler as $resim)
                @if(($icerik->id)==($resim->r_kategori_id))
                    <div class='col-sm-6 col-xs-6 col-md-4 col-lg-4'>
                        <a class="thumbnail fancybox" rel="ligthbox" title="{{$icerik->sayfa_adi}}" href='{{ asset("img/urunler/$resim->r_resim") }}'>
                            <img class="img-responsive" style="height: 200px;" alt="" src='{{ asset("img/urunler/$resim->r_resim") }}' />
                            <div class='text-center'>
                                <small class='text-muted'><h5 style="color:black;">{{$icerik->sayfa_adi}}</h5></small>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        @if(($key+1)%3==0) <div class="clearfix"></div> @endif
        @endforeach
        </div>
    {{$resimler}}
    @stop
@else
@section('galeri_yazi') <br /> <br /> <i class="fa fa-info-circle"></i> Bu sayfaya henüz görsel yüklenmemiş.
@stop
@endif