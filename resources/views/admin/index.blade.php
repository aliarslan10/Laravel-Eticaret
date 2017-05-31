@extends('admin.master')

@section('admin_header')
 <section class="content-header">
          <h1>
            Kontrol Paneli
            <small>Kontrol Paneli</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa </a></li>
            <li class="active">Kontrol Paneli</li>
          </ol>
  </section>
@stop
@section('admin_content')

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Ziyaretçi Mesajları</a></li>
    <!-- <li><a data-toggle="tab" href="#menu1">İş Başvurusunda Bulunanlar</a></li> -->
    <li><a data-toggle="tab" href="#menu2">E-Bülten Kayıtları</a></li>
  <!--  <li><a data-toggle="tab" href="#menu3"></a></li> -->
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      {!! $xcrudiletisimformumesajlari->render() !!}
    </div>
    <div id="menu1" class="tab-pane fade">
      {!! $xcrudisbasvurusu->render() !!}
    </div>
    <div id="menu2" class="tab-pane fade">
      {!! $xcrud->render() !!}
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>

@stop