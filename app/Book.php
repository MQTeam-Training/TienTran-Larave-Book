<?php

namespace App;

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
}
