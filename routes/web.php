<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'IndexController@index');
Route::get('/authors', 'IndexController@authors')->name('authors');
Route::get('/books', 'IndexController@books')->name('books');
Route::post('/paginate', 'IndexController@paginate');
Route::post('/send', 'IndexController@send');



Route::post('/booksPaginate', 'IndexController@booksPaginate');
