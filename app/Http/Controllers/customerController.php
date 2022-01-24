<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ec_subdistricts;
use App\ec_districts;
use App\ec_cities;
use App\ec_provinces;
use App\customer;
use Illuminate\Support\Facades\Http;

class customerController extends Controller
{
    public function indexDataCust(){
        //mengambil data dari tabel customer
        // $customer = DB::table('customer')->paginate(10);
        $customer = customer::paginate(10);
        $ec_subdistricts = ec_subdistricts::all();
        $ec_districts = ec_districts::all();
        $ec_cities = ec_cities::all();
        $ec_provinces = ec_provinces::all();
        $response = Http::get('https://apicybercampus.unair.ac.id/api/tele/coba2');
        // Http::dd()->get('https://apicybercampus.unair.ac.id/api/tele/coba2');
        $response = json_decode($response);
        // dd($response);
        //mengirim data ke view table
        return view('dataCustomer',
        compact('customer'),
        compact('ec_subdistricts'),
        compact('ec_districts'),
        compact('ec_cities'),
        compact('ec_provinces'));
    }

    public function tambahCustomer1()
	{
		$ec_provinces = DB::table('ec_provinces')->pluck("prov_name","prov_id");
		return view('tambahCustomer1',compact('ec_provinces'));
	}

    public function tambahCustomer2()
	{
		$ec_provinces = DB::table('ec_provinces')->pluck("prov_name","prov_id");
		return view('tambahCustomer2',compact('ec_provinces'));
	}

    public function getCities($id) 
    {        
        $ec_cities = DB::table("ec_cities")->where("prov_id",$id)->pluck("city_name","city_id");
        return json_encode($ec_cities);
    }
    public function getDistricts($id) 
    {        
        $ec_districts = DB::table("ec_districts")->where("city_id",$id)->pluck("dis_name","dis_id");
        return json_encode($ec_districts);
    }
    public function getSubdistricts($id) 
    {        
        $ec_subdistricts = DB::table("ec_subdistricts")->where("dis_id",$id)->pluck("subdis_name","subdis_id");
        return json_encode($ec_subdistricts);
    }

    public function store1(Request $request)
{
	// insert data ke table
	DB::table('customer')->insert([
		'id_customer' => $request->id,
		'nama' => $request->nama,
		'alamat' => $request->alamat,
		'id_kel' => $request->ec_subdistricts,
        'foto' => $request->image
	]);
	// alihkan halaman ke halaman
	return redirect('/tambahCust1');
 
}
public function store2(Request $request)
{
    $img =  $request->get('image');
    $folderPath = "uploads/";
    $image_parts = explode(";base64,", $img);

    foreach ($image_parts as $key => $image){
        $image_base64 = base64_decode($image);
    }

    $fileName = uniqid() . '.png';
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);

    // insert data ke table
	DB::table('customer')->insert([
		'id_customer' => $request->id,
		'nama' => $request->nama,
		'alamat' => $request->alamat,
		'id_kel' => $request->ec_subdistricts,
        'file_path' => $fileName
    ]);
    
    return redirect('/tambahCust2')->with('success', 'Data submitted Successfully');
 
}

// public function store2(Request $request)
// {
// 	// insert data ke table
// 	DB::table('customer')->insert([
// 		'id_customer' => $request->id,
// 		'nama' => $request->nama,
// 		'alamat' => $request->alamat,
// 		'id_kel' => $request->ec_subdistricts
// 	]);
// 	// alihkan halaman ke halaman
// 	return redirect('/tambahCust2');
 
// }

}
