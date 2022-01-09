@extends('Template.master')

@section("content")
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Tambah Data Toko</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">
    <form method="post" action="/toko/tambahToko" enctype="multipart/form-data">
      <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
      <div class="container">
        <div class="form-group">
          <label for="barcode">Barcode</label>
          <input type="text" name="barcode" class="form-control">
        </div>
        <div class="form-group">
          <label for="nama">Nama Toko</label>
          <input type="text" name="nama" class="form-control">
        </div>
        <div class="form-group">
          <label for="latitude">Latitude</label>
          <input type="text" name="latitude" class="form-control" id="lat" value="">
        </div>
        <div class="form-group">
          <label for="longitude">Longitude</label>
          <input type="text" name="longitude" class="form-control" id="lon" value="">
        </div>
        <div class="form-group">
          <label for="accuracy">Accuracy</label>
          <input type="text" name="accuracy" class="form-control" id="acc" value="">
        </div>
        <div class="col-md-12 text-center">
            <br/>
            <button type="submit" class="btn btn-secondary" style="float: right">Submit</button>
        </div>
      </div>
    </form>
    <button class="btn btn-warning" onclick="getLocation()"  style="float: left">Set Titik Lokasi</button>
    <p id="demo"></p>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection

@section("script")
<script>
var x = document.getElementById("demo")
// var x = document.getElementById("lat");
// var y = document.getElementById("lon");
// var z = document.getElementById("accuracy");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  document.getElementById("lat").value = position.coords.latitude;
  document.getElementById("lon").value = position.coords.longitude;
  document.getElementById("acc").value = position.coords.accuracy;
}
</script>
@endsection