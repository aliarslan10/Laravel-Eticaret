@extends('kullanici.master_kullanici_paneli')
@section('desc') Site Yöneticisine Mesaj At @stop
@section('sayfatitle') Mesaj At @stop
@section('mi_breadcrumb') <li> Site Yöneticisine Mesaj At </li> @stop
@section('kp_content')
	 {{-- $deger --}}
	 {!! $xcrud->render() !!}
	 {!! $xcrud2->render() !!}
@stop