@extends('Template.master')

@section('title','Tambah Customer 2')

@section('content')
<div class="card">
    <div class="card-body">
        <h1 align="center">TAMBAH CUSTOMER 2 </h1>
    </div>
    <div class="card-body">
		<form action="/tambahCustomer2/store2" method="post">
		{{ csrf_field() }}
            <div class="form-group row">
			    <label class="col-2 col-form-label">ID</label>
                <div class="col-md-6">
                    <input type="text" name="id" class="form-control" required="required"   placeholder=". . ."> 
                </div>
			</div>
							
			<div class="form-group row">
			    <label class="col-2 col-form-label">Nama</label>
                <div class="col-md-6">
                    <input type="text" name="nama" class="form-control" required="required"         placeholder=". . ."> 
                </div>
			</div>
							
            <div class="form-group row">
			    <label class="col-2 col-form-label">Alamat</label>
                <div class="col-md-6">
                    <input type="text" name="alamat" class="form-control" required="required"   placeholder=". . ."> 
                </div>
			</div>

			<div class="form-group row">
			    <label class="col-2 col-form-label">Provinsi</label>
                <div class="col-md-6">
                    <select name="ec_provinces" class="form-control" placeholder=". . .">
			        @foreach ($ec_provinces as $key => $value)<option value="{{ $key }}">{{ $value }}</option>@endforeach</select></br>
                </div>
			</div>
							
            <div class="form-group row">
                <label class="col-2 col-form-label">Kota</label>
                <div class="col-md-6">
                    <select name="ec_cities" class="form-control">
                        <option value="">== Pilih Provinsi Dulu ==</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2 col-form-label">Kecamatan</label>
                <div class="col-md-6">
                    <select name="ec_districts" class="form-control">
                        <option value="">== Pilih Kota Dulu ==</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2 col-form-label">Kelurahan</label>
                <div class="col-md-6">
                    <select name="ec_subdistricts" class="form-control">
                        <option value="">== Pilih Kecamatan Dulu ==</option>
                    </select>
                </div>
            </div>

							
			<div class="form-group">
                <input type="submit" class="btn btn-success" value="Simpan Data">
			</div>
							
		</form>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function ()
        {
                jQuery('select[name="ec_provinces"]').on('change',function(){
                   var prov_id = jQuery(this).val();
                   if(prov_id)
                   {
                      jQuery.ajax({
                         url : 'tambahCustomer/getcities/' +prov_id,
                         type : "GET",
                         dataType : "json",
                         success:function(data)
                         {
                            console.log(data);
                            jQuery('select[name="ec_cities"]').empty();
                            jQuery.each(data, function(key,value){
                               $('select[name="ec_cities"]').append('<option value="'+ key +'">'+ value +'</    option>');
                            });
                         }
                      });
                   }
                   else
                   {
                      $('select[name="ec_cities"]').empty();
                   }
                });
        });

        jQuery(document).ready(function ()
        {
                jQuery('select[name="ec_cities"]').on('change',function(){
                   var city_id = jQuery(this).val();
                   if(city_id)
                   {
                      jQuery.ajax({
                         url : 'tambahCustomer/getdistricts/' +city_id,
                         type : "GET",
                         dataType : "json",
                         success:function(data)
                         {
                            console.log(data);
                            jQuery('select[name="ec_districts"]').empty();
                            jQuery.each(data, function(key,value){
                               $('select[name="ec_districts"]').append('<option value="'+ key +'">'+ value +'</    option>');
                            });
                         }
                      });
                   }
                   else
                   {
                      $('select[name="ec_districts"]').empty();
                   }
                });
        });

        jQuery(document).ready(function ()
        {
                jQuery('select[name="ec_districts"]').on('change',function(){
                   var dis_id = jQuery(this).val();
                   if(dis_id)
                   {
                      jQuery.ajax({
                         url : 'tambahCustomer/getsubdistricts/' +dis_id,
                         type : "GET",
                         dataType : "json",
                         success:function(data)
                         {
                            console.log(data);
                            jQuery('select[name="ec_subdistricts"]').empty();
                            jQuery.each(data, function(key,value){
                               $('select[name="ec_subdistricts"]').append('<option value="'+ key +'">'+ value +'</    option>');
                            });
                         }
                      });
                   }
                   else
                   {
                      $('select[name="ec_subdistricts"]').empty();
                   }
                });
        });
    </script>
</div>
@endsection