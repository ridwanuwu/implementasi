<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BarangController extends Controller
{
    public function index()
    {
        $barang = DB::table('barang')->get();
        $data = array(
            'menu' => 'Barcode',
            'barang' => $barang,
            'submenu' => '',
        );

        return view('barang/viewBarang',$data); 
    }

    public function scanner()
    {
        $data = array(
            'menu' => 'scanner',
            'submenu' => '',
        );

        return view('barang/scanner',$data); 
    }

    public function formBarang()
    {
        $data = array(
            'menu' => 'Barcode',
            'submenu' => '',
        );

        return view('barang/formBarang',$data); 
    }

    public function tambahBarang(Request $post)
    {  
        DB::table('barang')->insert([
            'id_barang' => $post->id,
            'nama' => $post->nama,
        ]);

        // return redirect('/pegawai');
        return redirect('/barang');
    }
    
}
