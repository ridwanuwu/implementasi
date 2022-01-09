<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Book;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get data from table posts
        $book = Book::latest()->get();

        //make response JSON
        return response()->json([
        'success' => true,
        'message' => 'List Data Post',
        'data' => $book // <-- data post ], 200);
        ], 200);
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
        $book = new Book;
        $book->name = $request->name;
        $book->author = $request->author;
        $book->save();

        return response()->json([
            "messege" => "Book record created"
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
        //find book by ID
        $book = Book::findOrfail($id);

        //make response JSON
        return response()->json([
        'success' => true,
        'message' => 'Detail Data Buku',
        'data' => $book
        ], 200);
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
    public function update(Request $request, Book $book)
    {
         //set validation
        $validator = Validator::make($request->all(), [
            'name'   => 'required',
            'author' => 'required',
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find book by ID
        $book = Book::findOrFail($book->id);

        if($book) {

            //update book
            $book->update([
                'name'     => $request->name,
                'author'   => $request->author
            ]);

            return response()->json([
                'success' => true,
                'message' => 'book Updated',
                'data'    => $book  
            ], 200);

        }

        //data book not found
        return response()->json([
            'success' => false,
            'message' => 'book Not Found',
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //find book by ID
        $book = book::findOrfail($id);

        if($book) {

            //delete book
            $book->delete();

            return response()->json([
                'success' => true,
                'message' => 'Book Deleted',
            ], 200);

        }

        //data book not found
        return response()->json([
            'success' => false,
            'message' => 'Book Not Found',
        ], 404);
    }
}
