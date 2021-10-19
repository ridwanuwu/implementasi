<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Picqer\Barcode;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Picqer\Barcode\BarcodeGeneratorJPG;
use App\Barang;
use PDF;


class BarangController extends Controller
{
    //
    public function index()
    {
        //
        $barangs = Barang::all();
        return view('barang', compact('barangs'));
    }

    // public function cetak_pdf()
    // {
    // 	// $pegawai = Pegawai::all();
    //     $barangs = Barang::all();
    //     $no = 1;
    //     $pdf = PDF::loadview('barang_cetak',['barangs'=>$barangs])->setPaper('A4','potrait');
    //     return $pdf->stream();
    // }

    public function cetak_pdf()
    {
    	// $pegawai = Pegawai::all();
        $barangs = Barang::all();
        $no = 1;
        $pdf = PDF::loadview('barang_cetak',compact('barangs','no'))->setPaper('A4','landscape');
        return $pdf->stream();
    }
}
