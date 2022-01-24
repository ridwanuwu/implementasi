@extends('Template.master')

@section('title','Input book')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
<!-- Default box -->
<div class="card">    
  <div class="card-header">
	  <h3 class="card-title"><strong>Daftar Buku</strong></h3>
	  <div class="card-tools">
		  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
			<i class="fas fa-minus"></i></button>
		  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
			<i class="fas fa-times"></i></button>
	  </div>
  </div>

  
	@if(session()->has('success'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
	{{ session()->get('success') }}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	</div>
	@endif 

	@if(session()->has('failed'))
	<div class="alert alert-danger" role="alert">
	{{ session()->get('failed') }}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	</div>
	@endif 

  <div class="card-body">
		<div class="card">
			<div class="card-header">
				<a href="/book/insertBook">
				<button type="button" class="btn btn-info float-right" style="float: right;"><i class="fas fa-plus"></i>  Tambah Data Buku</button>
				</a>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th style="text-align:center">Nama Buku</th>
						<th style="text-align:center">Author</th>
						<th style="text-align:center" width="10%">Aksi</th>
					</tr>
					</thead>
					<tbody>
					@foreach($book as $data)
					<tr>
						<td>{{ $data["name"] }}</td>
						<td>{{ $data["author"] }}</td>
						<td>
							<a href='/book/editBook/{{ $data["id"] }}'>
								<button type="button" class="btn btn-dark"><i class="fas fa-edit"></i> Edit</button>
							</a>
							<form action='/book/hapus/{{ $data["id"] }}' method="post">
								<button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i> Hapus</button>
								<input type="hidden" name="_method" value="delete" />
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
							</form>
						</td>             
					</tr>
					@endforeach
					</tbody>
					<tfoot>
					<!-- <tr>
					<th>NIS_NIP</th>
					<th>nama_anggota</th>
					<th>tahun_masuk</th>
					<th>kelas</th>
					<th>username_anggota</th>
					<th>password_anggota</th>
					</tr> -->
					</tfoot>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
	<!-- <a href="/LHP/insert_lhp"><b>Tambah Data LHP</b></a> -->
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->

@endsection


@section('custom_script')
<!-- DataTables -->
<script src="{{asset ('asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script>
  $(function () {
	$("#example1").DataTable({
	  "responsive": true,
	  "autoWidth": false,
	});
  });
</script>
@endsection