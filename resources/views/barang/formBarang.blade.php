@extends('Template/master')

@section('title','Data Barang')

@section("content")
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Title</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">
    <form method="post" action="/barang/tambahBarang" enctype="multipart/form-data">
      <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
      <div class="container">
        <div class="form-group">
          <label for="id">ID</label>
          <input type="text" name="id" class="form-control">
        </div>
        <div class="form-group">
          <label for="nama">Nama Barang</label>
          <input type="text" name="nama" class="form-control">
        </div>
        <div class="col-md-12 text-center">
            <br/>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </div>
    </form>
  </div>

</div>
<!-- /.card -->
@endsection
