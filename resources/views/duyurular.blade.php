@extends('master_icerik')
	@section('desc') Mavi Forex Duyurular @stop
	@section('sayfatitle') Mavi Forex Duyurular @stop
	@section('mi_breadcrumb')<li class="active">Duyurular</li>	@stop	
	@section('mi_baslik') Duyurular @stop
	@section('mi_icerik')
	<div class="alert alert-info"> <i class="glyphicon glyphicon-ok-sign"></i> Üzerinde beyaz büyütecin yer aldığı mavi butona tıklayarak her bir duyuru için, duyuru detaylarını görebilirsiniz. </div>
	{!! $xcrud->render() !!}
<style type="text/css">
table tbody td {
    color: black;
}
</style>
@stop
