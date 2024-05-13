<?php

namespace App\Http\Controllers;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


class BookController extends Controller
{
    //
    public function index(): View
    {
        $books = Books::latest()->paginate(5);

        return view('books.index', compact('books'));
    }

    public function create(): View
    {
        return view('books.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'cover_buku' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'kode_buku' => 'required|min:5|max:5',
            'judul_buku' => 'required',
            'kategori_buku' => 'required',
            'stok_buku' => 'required',
            'tahun_buku' => 'required',
        ]);

        $image = $request->file('cover_buku');
        $image->storeAs('public/books', $image->hashName());

        Books::create([
            'cover_buku' => $image->hashName(),
            'kode_buku' => $request->kode_buku,
            'judul_buku' => $request->judul_buku,
            'kategori_buku' => $request->kategori_buku,
            'stok_buku' => $request->stok_buku,
            'tahun_buku' => $request->tahun_buku,

        ]);

        return redirect()->route('books.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $book = Books::findOrFail($id);

        //delete image
        Storage::delete('public/books/'. $book->cover_buku);

        //delete post
        $book->delete();

        //redirect to index
        return redirect()->route('books.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
  
}
