@extends('admin.master')
@section('admin_header')
 <section class="content-header">
          <h1>
            Sayfa Yönetimi
            <small>Kontrol Paneli</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa </a></li>
            <li class="active">Sayfa Yönetimi</li>
          </ol>
        </section>
@stop

@section('admin_content')
  {!! $xcrudsayfa->render() !!}
@stop