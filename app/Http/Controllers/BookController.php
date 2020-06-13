<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = new Book();
        if (request()->has('page') && request()->has('limit')) {
            $pageNumber = request()->page;
            $limitNumber = request()->limit;
            return response()->json($books->getLimit($pageNumber, $limitNumber));
        } else {
            return response()->json($books->getAll());
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book();
        $books = $book->addBook($request);
        return response()->json(['status'=>'success','mess'=>$request->all()],Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $books = new Book();
        return response()->json($books->GetBookById($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $book = Book::findOrFail($id);
        $book->namebook =$request->namebook;
        $book->author =$request->author;
        $book->description =$request->description;
        $book->publication_date =$request->publication_date;
        $book->save();
        return response()->json(['status'=>'success'],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book=Book::findOrFail($id);
        $book->delete();
        return response()->json("xoa thanh cong");
    }

    public function getAllBook()
    {
        $allbooks = new Book();
        return response()->json($allbooks->CountBook());
    }

}
