@extends('Template.master')

@section('title', 'Data Barang')

@section('content')
<a href="{{ route('print')}}" class="btn btn-md btn-info mb-3" target="_blank">CETAK PDF</a>
<div class="card">
    <div class="card-body">
        <h1 align="center">Data Barang</h1>
    </div>
    <div class="card-body">
        <table class="table table-bordered" border="2" align="center">
            <tr>
                <td>no</td>
                <td>ID Barang</td>
                <td>Nama Barang</td>
                <td>Timestamp</td>
                <!-- <td>Barcode</td> -->
            </tr>
            @foreach($barangs as $bar)
            <tr>
                <td align="center">
                    {!! DNS1D::getBarcodeHTML($bar->idbarang, "C128",2,22) !!}
                    <p align="center">{{$bar->idbarang}}
                        <br>
                    {{$bar->nama_barang}}</p>
                </td>
                <td>{{ $bar->nama_barang }}</td>
                <td>{{ $bar->timestamp }}</td>
            </tr>

            @endforeach
        </table>
    </div>

</div>
@endsection