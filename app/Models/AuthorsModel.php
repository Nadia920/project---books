<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AuthorsModel extends Model
{
    protected $table = 'authors';

    public function books()
    {
        return $this->hasMany(BooksModel::class, 'authors_id');
    }
}
