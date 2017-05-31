@extends('kullanici.kullanici_paneli_arayuz')

@if(Session::has('giris_kullanici'))
@section('desc') Bilgilerim @stop
@section('sayfatitle') Bilgilerim @stop
@section('breadcrumb') Bilgilerim @stop	
@section('baslik') Bilgilerim   @stop

@section('kullanici_yazi')
	{{-- $deger --}}
	{!! $xcrud->render('edit',$id) !!}
@stop

@endif