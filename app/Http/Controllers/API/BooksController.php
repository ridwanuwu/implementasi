<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Book::all();
        return response()->json(Book::all(),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'menu' => 'book',
            'submenu' => '',
        );

        return view('book/insertBook',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book;
        $book->name = $request->name;
        $book->author = $request->author;
        $book->save();

        return response()->json([
            "message" => "Book record created",
            "data" => $book
        ], 201);
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
        $book = DB::table('books')->where('id', $id)->get();

        $data = array(
            'menu' => 'book',
            'book' => $book,
            'submenu' => ''
           
        );
        return view('book/editBook',$data);
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
        $cek_book = Book::firstWhere('id',$id);
            if($cek_book){
                $book = Book::find($id);
                $book->name = $request->name;
                $book->author = $request->author;
                $book->save();
                return response()->json([
                    "message" => "Book record updated",
                     "data" => $book
                ],200);
            } else {
                return response()->json([
                    "message" => "Book ID not found!"
                ],404);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return response()->json([
            "message" => "Book record deleted"
        ]);
    }

    public function book()
    {
        $url = 'localhost:8081/api/books';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        curl_setopt($ch, CURLOPT_TIMEOUT, 300);
        $server_output = curl_exec($ch);
        curl_close ($ch);
        $arrVal = json_decode($server_output, true);

        // $arrVal["menu"] = "book";
        // $arrVal["submenu"] = "";
        // $arrVal["name"] = "judul";
        // $arrVal["author"] = "artis";
        $data = array(
            'menu' => 'book',
            'book' => $arrVal,
            'submenu' => '',
        );

        // dd($data);

        return view('book/viewBook',$data); 
    }

    public function tambahBook(Request $request)
    {  
        $url = 'localhost:8081/api/books';
        $ch = curl_init();
        $data=array(
            'name' => $request->name,
            'author' => $request->author,
        );
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        curl_setopt($ch, CURLOPT_TIMEOUT, 300);
        $server_output = curl_exec($ch);
        curl_close ($ch);
        $arrVal = json_decode($server_output, true);

        return redirect('/book');
    }

    public function updateBook(Request $request, $id)
    {  
        $url = "localhost:8081/api/books/$id";
        $ch = curl_init();
        $data=array(
            'name' => $request->name,
            'author' => $request->author,
        );
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        curl_setopt($ch, CURLOPT_TIMEOUT, 300);
        $server_output = curl_exec($ch);
        curl_close ($ch);
        $arrVal = json_decode($server_output, true);
        // var_dump($data);

        return redirect('/book');
    }
    
    public function hapus($id)
    {
        $url="localhost:8081/api/books/$id";
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        curl_close($curl);
        // var_dump($id);

	    return redirect('/book');
    }

}