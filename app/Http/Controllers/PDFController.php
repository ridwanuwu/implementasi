<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $dataa = $request->id_barang;
        $datab = explode(",", $dataa);
        $barang = DB::table('barang')->whereIn('id_barang', $datab)->get();
        $no = 1;
        $x = 1;
        $col = $request->col;
        $row = $request->row;
        $panjang=(($row-1)*5)+($col-1);
        $data = array(
            'menu' => 'Barcode',
            'barang' => $barang,
            'no' => $no,
            'x' => $x,
            'col' => $col,
            'row' => $row,
            'panjang' => $panjang,
            'submenu' => '',
        );
          
        // var_dump($dataa);
        // return response()->json($dataa, 200);

        $customPaper = array(0,0,611.7,469.47);
        return PDF::loadView('myPDF', $data)->setPaper('a5', 'landscape')->stream('barcode.pdf');
    }
}