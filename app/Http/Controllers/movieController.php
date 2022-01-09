<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class movieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data='';
        return view('api-movie.movie-upload',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('movie-img'); 
        $fileName = time().'-'.$file->getClientOriginalName(); 
        $file->move('img',$fileName);
        $arrInsert = array( 
            'nama' => $request->input('nama'),
            'sutradara' => $request->input('sutradara'), 
            'produksi' => $request->input('produksi'), 
            'sinopsis' => $request->input('sinopsis'), 
            'file_name' => $fileName, 
            'status' => $request->input('status') 
        ); 
        DB::table('movies')->insert($arrInsert); 
        return redirect()->back()->with('status', 'upload Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
