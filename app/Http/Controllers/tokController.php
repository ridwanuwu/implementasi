<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class tokController extends Controller
{
    //
    public function index()
    {
        $lokasi_toko = DB::table('lokasi_toko')->get();
        $data = array(
            'menu' => 'geolocation',
            'lokasi_toko' => $lokasi_toko,
            'submenu' => '',
        );

        return view('toko/viewToko',$data); 
    }

    public function formToko()
    {
        $data = array(
            'menu' => 'geolocation',
            'submenu' => '',
        );

        return view('tokoform',$data); 
    }

    public function tambahToko(Request $post)
    {  
        DB::table('lokasi_toko')->insert([
            'barcode' => $post->barcode,
            'nama_toko' => $post->nama,
            'latitude' => $post->latitude,
            'longitude' => $post->longitude,
            'accuracy' => $post->accuracy,
        ]);

        // return redirect('/pegawai');
        return redirect('toko/kunjungan-toko');
    }

    public function scanner()
    {  
        $getFields = DB::table('lokasi_toko')->where('barcode', 12345)->first();
        $data = array(
            'menu' => 'kunjungan',
            'nama_toko' => $getFields,
            'submenu' => '',
        );    
       
        // return redirect('/pegawai');
        return view('tokoscan', $data);
    }

    public function getAllFields(Request $request)
    {
        try {
            $getFields = DB::table('lokasi_toko')->where('barcode', $request->scanned)->first();
            // here you could check for data and throw an exception if not found e.g.
            // if(!$getFields) {
            //     throw new \Exception('Data not found');
            // }
            return response()->json($getFields, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

}