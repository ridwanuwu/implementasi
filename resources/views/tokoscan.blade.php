@extends('Template.master')

@section("custom_css")
<!-- <link href="{{asset ('asset/scan/css/bootstrap.min.css')}}" rel="stylesheet"> -->
<!-- <link href="{{asset ('asset/scan/css/style.css')}}" rel="stylesheet"> -->

<!-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" > -->

<!-- <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet"> -->
@endsection

@section("content")
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Pindai Lokasi toko</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">
    <div class="container" id="QR-Code">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="navbar-form navbar-right">
                    <select class="form-control" id="camera-select"></select>
                    <div class="form-group">
                      <br/>
                        <!-- <input id="image-url" type="text" class="form-control" placeholder="Image url"> -->
                        <button title="Decode Image" class="btn btn-default btn-sm" id="decode-img" type="button" data-toggle="tooltip"><span class="fas fa-upload"></span></button>
                        <button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip"><span class="far fa-image"></span></button>
                        <button title="Play" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip"><span class="fas fa-play"></span></button>
                        <button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button" data-toggle="tooltip"><span class="fas fa-pause"></span></button>
                        <button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip"><span class="fas fa-stop"></span></button>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-6">
                    <div class="well" style="position: relative;display: inline-block;">
                        <canvas style="border: 1px solid grey;" width="320" height="240" id="webcodecam-canvas"></canvas>
                        <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                    </div>
                    <!-- <div class="well" style="width: 100%;">
                        <label id="zoom-value" width="100">Zoom: 2</label>
                        <input id="zoom" onchange="Page.changeZoom();" type="range" min="10" max="30" value="20">
                        <label id="brightness-value" width="100">Brightness: 0</label>
                        <input id="brightness" onchange="Page.changeBrightness();" type="range" min="0" max="128" value="0">
                        <label id="contrast-value" width="100">Contrast: 0</label>
                        <input id="contrast" onchange="Page.changeContrast();" type="range" min="0" max="64" value="0">
                        <label id="threshold-value" width="100">Threshold: 0</label>
                        <input id="threshold" onchange="Page.changeThreshold();" type="range" min="0" max="512" value="0">
                        <label id="sharpness-value" width="100">Sharpness: off</label>
                        <input id="sharpness" onchange="Page.changeSharpness();" type="checkbox">
                        <label id="grayscale-value" width="100">grayscale: off</label>
                        <input id="grayscale" onchange="Page.changeGrayscale();" type="checkbox">
                        <br>
                        <label id="flipVertical-value" width="100">Flip Vertical: off</label>
                        <input id="flipVertical" onchange="Page.changeVertical();" type="checkbox">
                        <label id="flipHorizontal-value" width="100">Flip Horizontal: off</label>
                        <input id="flipHorizontal" onchange="Page.changeHorizontal();" type="checkbox">
                    </div> -->
                </div>
                <div class="col-md-6">
                    <div class="thumbnail" id="result">
                        <div class="well" style="overflow: hidden;">
                            <img width="320" height="240" id="scanned-img" src="">
                        </div>
                        <div class="caption">
                            <h1>Result</h1>
                            <p id="scanned-QR"></p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <!-- Footer -->
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->
<div class="row">
    <div class="col-lg-6">
    <div class="card card-primary card-outline">
        <div class="card-header">
        <h5 class="m-0">Lokasi Toko</h5>
        </div>
        <div class="card-body">
          <form method="post" action="/toko/tambahToko" enctype="multipart/form-data">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
            <div class="container">
              <!-- <div class="form-group">
                <label for="barcode">Barcode</label>
                <textarea type="text" name="barcode" class="form-control" id="scanned-QR"></textarea>
              </div> -->
              <div class="form-group">
                <label for="nama_toko">Nama Toko</label>
                <input type="text" name="nama_toko" class="form-control" id="nama_toko" disabled>
              </div>
              <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="text" name="latitude" class="form-control" id="latitude" disabled>
              </div>
              <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="text" name="longitude" class="form-control" id="longitude" disabled>
              </div>
              <div class="form-group">
                <label for="accuracy">Accuracy</label>
                <input type="text" name="accuracy" class="form-control" id="accuracy" disabled>
              </div>
            </div>
          </form>
        </div>
    </div>
    </div>
    <!-- /.col-md-6 -->

    <div class="col-lg-6">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="m-0">Hasil Kunjungan</h5>
        </div>
        <div class="card-body">
          <!-- <button class="btn btn-primary" onclick="getLocation()">Try It</button> -->
          <p id="demo"></p>
          <p id="demo2"></p>
        </div>
      </div>
    </div>
    <!-- /.col-md-6 -->
</div>
    
@endsection

@section("script")
<!-- <script type="text/javascript" src="{{ asset('asset/js/filereader.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/js/qrcodelib.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/js/webcodecamjs.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/js/main.js') }}"></script> -->

<script type="text/javascript" src="{{asset('AdminLTE/dist/js/filereader.js') }}"></script>
<script type="text/javascript" src="{{asset('AdminLTE/dist/js/qrcodelib.js') }}"></script>
<script type="text/javascript" src="{{asset('AdminLTE/dist/js/webcodecamjs.js') }}"></script>
<script type="text/javascript" src="{{asset('AdminLTE/dist/js/main.js') }}"></script>

<!-- <script type="text/javascript" src="js/filereader.js"></script>
        <script type="text/javascript" src="js/qrcodelib.js"></script>
        <script type="text/javascript" src="js/webcodecamjs.js"></script>
        <script type="text/javascript" src="js/main.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

$('#scanned-QR').bind('input propertychange', function() {
  alert("hasil scan");
});

$("#scanned-QR").hover(function(e){
// alert($(this).val());
var scanned = $(this).val();
$.ajax({
    type: "GET",
    url: "{{route('getAllFields')}}",
    data: {'scanned':scanned},
    dataType: 'json',
    success : function(data) {
        $('#nama_toko').val(data.nama_toko); 
        $('#latitude').val(data.latitude); 
        $('#longitude').val(data.longitude);
        $('#accuracy').val(data.accuracy);
    },
    error: function(response) {
        alert(response.responseJSON.message);
    }
  });
});

</script>

<script>
var x = document.getElementById("demo");
var y = document.getElementById("demo2");

function getLocation(data) {
  if (navigator.geolocation) {
    // navigator.geolocation.getCurrentPosition(showPosition);
    navigator.geolocation.getCurrentPosition(position => {
      x.innerHTML = "Latitude: " + position.coords.latitude + 
      "<br>Longitude: " + position.coords.longitude +
      "<br>Accuracy: " + position.coords.accuracy;
      d = getDistanceFromLatLonInKm(data.latitude,data.longitude,position.coords.latitude,position.coords.longitude);
      // d = 1749.649374864356;
      let rataAcc = (data.accuracy + position.coords.accuracy)/2;
      if(d <= rataAcc){
        y.innerHTML = "Jarak antara titik awal dan titik kunjungan : " + d + "<br>Anda telah melakukan kunjungan";
      }else{
        alert("Anda tidak berada dalam toko\nJarak : " + d + "\nRata-rata Accuracy : " + rataAcc);
      }
    });

  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude +
  "<br>Accuracy: " + position.coords.accuracy;
}

function hasilscan(code){
  $.ajax({
      type: "GET",
      url: "{{route('getAllFields')}}",
      data: {'scanned':code},
      dataType: 'json',
      success : function(data) {
          $('#nama_toko').val(data.nama_toko); 
          $('#latitude').val(data.latitude); 
          $('#longitude').val(data.longitude);
          $('#accuracy').val(data.accuracy);
          getLocation(data);
      },
      error: function(response) {
          alert(response.responseJSON.message);
      }
    });
}

function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
  var R = 6371; // Radius of the earth in km
  var dLat = deg2rad(lat2-lat1); // deg2rad below
  var dLon = deg2rad(lon2-lon1); 
  var a = 
    Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
    Math.sin(dLon/2) * Math.sin(dLon/2)
    ; 
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
  var d = R * c; // Distance in km
  return d;
}

function deg2rad(deg) {
  return deg * (Math.PI/180)
}
</script>

@endsection