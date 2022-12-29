<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Http\Controllers\CloudinaryStorage;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('book.index', [
            'books' => Book::all(),
            'categories' => Category::get()
        ]);
    }

    public function store(BookRequest $request)
    {
        // $image = $request->file('image');
        // $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
        $tes = Book::create([
            // 'image' => $result,
            'title' => $request->title,
            'isbn' => $request->isbn,
            'category_id' => $request->category_id,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'publicationYear' => $request->publicationYear,
            'stock' => $request->stock,
        ]);
        
        return back()->with('success', 'Tambah Data Berhasil 😃');
    }

    public function show($id)
    {
        return view('book.show', [
            'book' => Book::where('id', $id)->first(),
            'categories' => Category::get(),
        ]);
    }
    public function edit($id)
    {
        return view('book.edit', [
            'book' => Book::where('id', $id)->first(),
            'categories' => Category::get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        // $image = $request->file('image');
        // $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
        Book::where('id', $id)->update([
            // 'image' => $request->image,
            'title' => $request->title,
            'isbn' => $request->isbn,
            'category_id' => $request->category_id,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'publicationYear' => $request->publicationYear,
            'stock' => $request->stock,
        ]);
        // dd($book);
        return redirect('book')->with('success', 'Update Data Berhasil 🤩');

    }
    public function destroy($id)
    {           
        // CloudinaryStorage::delete($book->image);
        Book::where('id', $id)->delete();

        return redirect('book')->with('success', 'Hapus Data Berhasil 😎');
    }
}