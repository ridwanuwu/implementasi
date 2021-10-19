<!-- 
<style>
    br {
   display: block;
   margin: 5px 0;
}
</style>
    @forelse ($barangs as $barang)
                    <br>
                    <br>
                    <hr>
                    <center>{!! DNS1D::getBarcodeHTML($barang->idbarang, "C128",2,22) !!}<center><br>
                    <center>{{ $barang->idbarang }}<center>
                    <center>{{ $barang->nama_barang }}<center>
                
                    @empty
                    <div class="alert alert-danger">
                        Data Barang belum Tersedia.
                    </div>
    @endforelse  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cetak Barcode</title>

    <style>
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <table width="100%">
        <tr>
            @foreach ($barangs as $produk)
            <?php
                      $number = $produk->idbarang;
                      $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                      $barcode = $generator->getBarcode($number, $generator::TYPE_CODE_128);
                      ?>
                  <td>
                    {!! $barcode !!}
                    {{ $produk->idbarang }}
                    <br>
                    {{ $produk->nama_barang }}
                    </br>
                </td>
                @if ($no++ % 5 == 0)
                    </tr><tr>
                @endif
            @endforeach
        </tr>
    </table>
</body>
</html>