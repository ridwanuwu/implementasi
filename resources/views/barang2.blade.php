@extends('Template/master')

@section('title','Beranda')

@section('css')
<!-- css tambahan -->
@endsection

@section('content')
<div class="row" style="">
    <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12">
        <div class="container">
            <div class="card" style="width:100%;min-height:400px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-12 col-xl-12 col-lg-12">
                        <div class="table-responsive">
                            <a href="{{ route('barang.create') }}" class="btn btn-md btn-success mb-3"><i class="far fa-plus-square"></i> TAMBAH DATA BARANG</a>
                            <a href="{{ url('cetak_barcode')}}" class="btn btn-md btn-info mb-3" target="_blank">CETAK PDF</a>
                                <table id="tables" class="table table-striped table-hover" style="width:100%">
                                <caption>List of Barang</caption>
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA</th>
                                            <th>BARCODE</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($barangs as $barang)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        
                                        @php
                                            $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                                        @endphp
                                        <td align="center"><img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($barang->barcode_kode, $generatorPNG::TYPE_CODE_128)) }}"><br>
                                        {{ $barang->barcode_kode }}
                                    
                                        </td>
                                                                             
                                        <td class="text-center">
                                        tidak ada aksi
                                    </td>
                                    </tr>

                                  @empty
                                      <div class="alert alert-danger">
                                          Data Barang belum Tersedia.
                                      </div>
                                  @endforelse
                                    </tbody>
                                    <tfoot class="thead-dark">
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA</th>
                                            <th>BARCODE</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </tfoot>
                                </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Script Datatables -->
<!-- @php
$generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
@endphp
<img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode('000005263635', $generatorPNG::TYPE_CODE_128)) }}"> -->
@endsection

@section('script')
<!-- script tambahan -->

@endsection