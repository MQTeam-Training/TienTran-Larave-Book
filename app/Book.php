<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Book extends Model
{
    protected $table='book';
    function getAll(){
        $book= DB::table('book')
            ->select('*')
            ->get();
        return $book;
    }
    function GetBookById($id){
        $bookId= DB::table('book')
            ->where('id','=',$id)
            ->get();
        return $bookId;
    }
    function CountBook(){
        return DB::table('book')->count();
    }
    function getLimit($page,$limit){
        $book= DB::table('book')
            ->select('*')
            ->offset($limit*($page-1))
            ->limit($limit)
            ->get();
        return $book;
    }
    function addBook($data){
        $book = new Book();
        $book->namebook= $data->namebook;
        $book->author= $data->author;
        $book->description= $data->description;
        $book->publication_date= $data->publication_date;
        $book->save();
//
//         return DB::table('book')->insert([
//             ['namebook' => $data->namebook, 'author' => $data->author,'description'=>$data->description,'publication_date'=>$data->publication_date],
//         ]);
    }
}
