<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksModel extends Model
{
    protected $table = 'books';

    public static function getAuthorsWithBooks(){

        return self::query()
        ->join('authors', 'books.authors_id', '=', 'authors.id')
        ->get();
    }

    public static function getAuthorsWithBooksWithLimit($limit){

        return self::query()
        ->join('authors', 'books.authors_id', '=', 'authors.id')
        ->limit($limit)
        ->get();
    }
}
