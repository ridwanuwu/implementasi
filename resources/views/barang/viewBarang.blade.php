@extends('Template/master')

@section('title','Data Barang')

@section("css")
<!-- DataTables -->
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet" />
@endsection


@section("content")
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Barang</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">
    <div style="height: 70px;">
      <!-- <a href="/generate-pdf">
				<button type="button" class="btn btn-warning float-left" style="float: left;  margin: 5px"><i class="fas fa-print"></i>  Cetak</button>
      </a>  -->
      <a href="/barang/formBarang">
        <button type="button" class="btn btn-info float-right" style="float: right; margin: 5px"><i class="fas fa-plus"></i>  Tambah Data Barang</button>
      </a>

      <form action="" method="">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        <label for="">kolom</label>
        <input type = "number" id="col" min="1" max="5" value ="1">
        <label for="">baris</label>
        <input type = "number" id="row" min="1" max="7" value ="1">
      </form>
      <button id="generate" type="button" class="btn btn-secondary float-left" style="float: left; margin: 5px"><i class="fas fa-file-download"></i>  Cetak</button>
    </div>
    <div>
      <form id="frm-example" action="/generate-pdf" method="POST">
      <table id="example" class="display" cellspacing="0" width="100">
          <thead>
              <tr>
                <th><input name="select_all" value="" id="example-select-all" type="checkbox" /></th>
                <th style="text-align:center">ID</th>
                <th style="text-align:center">Nama</th>
                <th style="text-align:center">TimeStamp</th>
                <th style="text-align:center">Barcode</th>
              </tr>
          </thead>
          <tbody>
          @php
              $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
          @endphp
          @foreach($barang as $data)
              <tr>
                  <td>{{ $data->id_barang }}</td>
                  <td>{{ $data->id_barang }}</td>
                  <td>{{ $data->nama }}</td>
                  <td>{{ $data->timestamp }}</td>
                  <td style="text-align:center">
                    <img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($data->id_barang, $generatorPNG::TYPE_CODE_128)) }}"><br>
                    {{ $data->nama }}
                  </td>
              </tr>
          @endforeach
          </tbody>
          <tfoot>
              <!-- <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>TimeStamp</th>
                  <th>Barcode</th>
              </tr> -->
          </tfoot>
      </table>
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection

@section("script")
<script src="{{asset ('asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function (){   
   var table = $('#example').DataTable({
    "responsive": true,
	  "autoWidth": false,  
    'columnDefs': [{
         'targets': 0,
         'searchable':false,
         'orderable':false,
         'className': 'dt-body-center',
         'render': function (data, type, full, meta){
             return '<input type="checkbox" name="check" value="' 
                + $('<div/>').text(data).html() + '">';
         }
      }],
      'order': [1, 'asc']
      
   });

   // Handle click on "Select all" control
   $('#example-select-all').on('click', function(){
      // Check/uncheck all checkboxes in the table
      var rows = table.rows({ 'search': 'applied' }).nodes();
      $('input[type="checkbox"]', rows).prop('checked', this.checked);
   });

   // Handle click on checkbox to set state of "Select all" control
   $('#example tbody').on('change', 'input[type="checkbox"]', function(){
      // If checkbox is not checked
      if(!this.checked){
         var el = $('#example-select-all').get(0);
         // If "Select all" control is checked and has 'indeterminate' property
         if(el && el.checked && ('indeterminate' in el)){
            // Set visual state of "Select all" control 
            // as 'indeterminate'
            el.indeterminate = true;
         }
      }
   });

       
       //3bisa---------------------------------
   $('#generate').on('click', function(e){
      var favorite = [];
      var row =  Number(document.getElementById("row").value);
      var col =  Number(document.getElementById("col").value);
      $.each($("input[name='check']:checked"), function(){
          favorite.push($(this).val());
      });
      parameter= "/"+ favorite.join()+"/"+col+"/"+row;
      url= "{{url('cetakpdf')}}";
      document.location.href=url+parameter;
      
      e.preventDefault(); 
   });


});
</script>

@endsection