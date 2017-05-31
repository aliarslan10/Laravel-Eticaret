@extends('admin.master')
@section('admin_header')
 <section class="content-header">
          <h1>
            Toplu Mail Gönderimi
            <small>Kontrol Paneli</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa </a></li>
            <li class="active">Toplu Mail Gönderimi</li>
          </ol>
        </section>
@stop
@section('admin_content')
	{!! $xcrud->render('edit',1) !!}
	
@if (session('durum'))
    <div class="alert alert-success">
        {{ session('durum') }}
    </div>
@endif

{!! Form::open(['action'=>'AdminController@topluMailGonder']) !!}
	{!! Form::submit('Maili Tüm Üyelere Gönder') !!}
{!! Form::close() !!}

@stop
