@extends('komponen-layout/master')

@section('title','Uploud movie')

@section('css')
<!-- css internal place -->

@endsection

@section('konten')
<!-- Content Body place -->
<div class="container">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Tambah Uploud Movie</h3>
        </div>
              <!-- /.card-header -->
        <div class="card-body">
            @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
            @endif
            <form action="{{ url('/uploud-movie') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama Movie</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama Movie" name="nama" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sutradara">Sutradara</label>
                            <input type="text" class="form-control" id="sutradara" placeholder="Nama Sutradara" name="sutradara" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="produksi">Produksi</label>
                            <input type="text" class="form-control" id="produksi" placeholder="Nama Produksi" name="produksi" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sinopsis">Sinopsis</label>
                            <input type="text" class="form-control" id="sinopsis" placeholder="Sipnosis" name="sinopsis" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label>status</label>
                          <select class="form-control select2" id="provinsi" name="status" required style="width: 50%;" required>
                            <option selected="selected" value=""s>Select Status</option>
                            <option value="2">Coming soon</option>
                            <option value="1">Now Playing</option>
                            <option value="0">Popular</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="filemovie">Uploud image movie</label>
                            <input type="file" class="form-control-file" id="filemovie" name="movie-img">
                        </div>
                    </div>
                    <div class="col-md-6" >
                        <input type="submit" class="btn btn-primary" value="Simpan Data">
                    </div>
                    <!-- </div> -->
            </form>
        </div>
        <!-- /.row -->
    </div>
</div>
@endsection

@section('script')
<!-- script internal place -->

@endsection