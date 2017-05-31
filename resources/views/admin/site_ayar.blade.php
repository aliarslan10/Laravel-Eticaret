@extends('admin.master')

@section('admin_header')

@stop

@section('admin_content')

<div class="well"> <i class="fa fa-info-circle"></i> Sosyal medya kutucuklarından herhangi birini boş bırakırsanız, sitedeki ilgili sosyal medya ikonu da otomatik olarak gizlenir. </div>

{!!$xcrud->render('edit', 1)!!}
  
@stop