@extends('eticaret.eticaret_arayuz')

@section('desc') Teslimat Bilgileri @stop
@section('sayfatitle') Teslimat Bilgileri @stop
@section('breadcrumb') Teslimat Bilgileri @stop	
@section('baslik') Teslimat Bilgileri   @stop

@section('sepet_yazi')


<div class="well">
<h4><i class="fa fa-money"></i> <b> Para Puan Bakiyeniz : {{$puan}} TL </b></h4> <small>
* Her 50 TL'lik alışverişlerinizde hesabınıza 0.5 para puan eklenir. Puanların kullanımı için alt limit 200 TL'dir. </small>
</div>


@stop