@extends('iletisim.iletisim_tema1')
@section('desc') İletişim @stop
@section('sayfatitle') İletişim @stop
@section('breadcrumb') İletişim @stop 
@section('baslik') İletişim   @stop

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyArYy8P8l1dSCKC6QY5yfafrHAFaesK1hA"></script>

@section('iletisim_sol_icerik')
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
@foreach($bilgiler as $key=>$iletisim)
  <div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="test">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#{{$key}}" aria-expanded="false" aria-controls="{{$key}}">
          {{$iletisim->sube}}
        </a>
      </h4>
    </div>
    <div id="{{$key}}" class="panel-collapse collapse @if($key=='0') in @endif" role="tabpanel" aria-labelledby="test">
      <div class="panel-body">
      <table border="0" width="100%">
      @if($iletisim->telefon1) 
        <tr>
          <th><i style="    font-weight: 700;" class="fa fa-1x fa-phone"></i></th>
          <td>{{$iletisim->telefon1}}</td>
        </tr>
      @endif  
      @if($iletisim->telefon2) 
        <tr>
          <th><i class="glyphicon glyphicon-phone"></i></th>
          <td>{{$iletisim->telefon2}}</td>
        </tr>
      @endif
      @if($iletisim->fax) 
        <tr>
          <th><i class="fa fa-1x fa-fax"></i></th>
          <td>{{$iletisim->fax}}</td>
        </tr>
      @endif  
      @if($iletisim->mail1) 
        <tr>
          <th><i class="fa fa-envelope"></i></th>
          <td>{{$iletisim->mail1}}</td>
        </tr>
      @endif
      @if($iletisim->mail2) 
        <tr>
          <th><i class="fa fa-envelope"></i></th>
          <td>{{$iletisim->mail2}}</td>
        </tr>
      @endif
      @if($iletisim->adres)
        <tr>
          <th><i class="fa fa-map-marker"></i></th>
          <td>{{$iletisim->adres}}</td>
        </tr>
      @endif             
      </table>  
     </div>
    </div>
  </div>

@endforeach

<br />
<b> Konumumuz : </b><br />

 <div id="map" style="width: 100%; height: 300px;"></div>

  <script type="text/javascript">
    var locations = [
    @foreach ($koordinatlar as $key => $value)
      ['{{$value[0]}}', {{$value[1]}}, {{$value[2]}}, {{$value[3]}}],
    @endforeach
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: new google.maps.LatLng(36.7022842,36.16132210000001), // Centered Hatay! For TURKEY = 38.963745, 35.243322
      mapTypeId: google.maps.MapTypeId.ROADMAP // ROADMAP(yol haritası), SATELLITE(uydu), HYBRID(hibrit), TERRAIN (arazi)  >> HYBRID = ROADMAP + SATELLITE <<
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>

</div>
@stop

@section('iletisim_sag_icerik') 

<div class="panel panel-primary">
  <div class="panel-heading">
    <h4 class="panel-title"> İletişim Formu </h4>
       </div>
  <div class="panel-body">
  {!! $xcrud->render('create') !!} 
  </div>
</div>
@stop