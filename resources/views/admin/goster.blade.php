@extends('admin.master')

@section('admin_header')

@stop

@section('admin_content')

{!! $xcrud->render() !!}

@if(isset($xcrud_alt_urun))
	{!! $xcrud_alt_urun->render() !!}
@endif
  
@if(isset($banner))
	{!! $banner->render() !!}
@endif
  
@stop