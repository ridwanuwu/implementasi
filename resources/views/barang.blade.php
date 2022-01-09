@extends('Template.master')

@section('title', 'Data Barang')

@section('content')
<div class="card">
    <div class="card-body">
        <h1 align="center">Data Barang</h1>
    </div>
    <div class="card-body">
        <table class="table table-bordered" border="2" align="center">
            <tr>
                <td>ID Barang</td>
                <td>Nama Barang</td>
                <td>Barcode</td>
            </tr>
            @foreach($barangs as $bar)
            <tr>
                <td>{{ $bar->id_barang }}</td>
                <td>{{ $bar->nama }}</td>
                @php
                $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                @endphp
                <td align="center"><img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($barangs->barcode_kode, $generatorPNG::TYPE_CODE_128)) }}"><br>
                {{ $barangs->barcode_kode }}
            </tr>

            @endforeach
        </table>
    </div>
    {{ $customer->links() }}
</div>
@endsection