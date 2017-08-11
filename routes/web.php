<?php

use App\Book;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('books');
    //return view('welcome');
});

Route::post('/books', function(Request $request) {
    //
});

Route::delete('/book/{book}', function(Book $book) {
    //
});

Route::post('/book', function(Request $request) {
    $validator = Validator::make($request->all(), [
        'item_name' => 'require|max:255',
    ]);

    if($validation->fails()) {
        return redirect('/')->withInput()->withErrors($validator);
    }

    $books = new Book;
    $book->item_name = $request->item_name;
    $book->item_number = '1';
    $book->item_amount = '1000';
    $book->published = '2017-03-07 00:00:00';
    $book->save();
    return redirect('/');
});
