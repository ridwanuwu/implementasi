@extends('Template.master')

@section('title','Input excel')

@section('content')

<!-- Default box -->
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Edit Book</h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fas fa-times"></i></button>
		</div>
	</div>
	<div class="card-body">

		<form action='/book/updateBook/{{$book[0]->id}}' method="post">  
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			</select><br>
			ID : <input type="text" class="form-control" name="id" value="{{$book[0]->id}}" readonly><br>
			Nama Buku: <input type="text" class="form-control" name="name" value="{{$book[0]->name}}"><br>
			Author : <input type="text" class="form-control" name="author" value="{{$book[0]->author}}"><br>

			<br><br>
			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
	<!-- /.card-body -->
	
	<!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection