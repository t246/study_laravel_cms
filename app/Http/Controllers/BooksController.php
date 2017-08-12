<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;
use Validator;

class BooksController extends Controller
{
    public function index() {
        $books = Book::orderBy('created_at', 'asc')->paginate(3);
        return view('books', [
            'books' => $books
        ]);
    }

    public function edit(Book $books)
    {
        //{books}id 値を取得 => Book $books id 値の1レコード取得
        return view('booksedit', [
            'book' => $books,
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'item_name' => 'required|min:3|max:255',
            'item_number' => 'required|min:1|max:3',
            'item_amount' => 'required|max:6',
            'published' => 'required',
        ]);

        if($validator->fails()) {
            return redirect('/')->withInput()->withErrors($validator);
        }

        $books = Book::find($request->id);
        $books->item_name = $request->item_name;
        $books->item_number = $request->item_number;
        $books->item_amount = $request->item_amount;
        $books->published = $request->published;
        $books->save();

        return redirect('/');
    }
    //
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_name' => 'required|max:255',
        ]);

        if($validator->fails()) {
            return redirect('/')->withInput()->withErrors($validator);
        }

        $books = new Book;
        $books->item_name = $request->item_name;
        $books->item_number = $request->item_number;
        $books->item_amount = $request->item_amount;
        $books->published = $request->published;
        $books->save();
        return redirect('/');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/');
    }
}
