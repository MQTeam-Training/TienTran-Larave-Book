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
    function AddBook(){
         return DB::table('book')->insert(array(
            array('namebook' => 'book6', 'author' => 'tientv','description'=>'tientv vs Book6','publication_date'=>'2020-05-11'),
            array('namebook' => 'book7', 'author' => 'hoangha','description'=>'hoangha vs Book7','publication_date'=>'2020-06-11'),
        ));
    }
}
