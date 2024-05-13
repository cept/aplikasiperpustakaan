<?php

namespace App\Http\Controllers;
use App\Models\Peminjam;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PeminjamController extends Controller
{
    public function index(): View
    {
        $peminjams = Peminjam::latest()->paginate(5);

        return view('peminjam.index', compact('peminjams'));
    }

    public function create(): View
    {
        $books = Books::all();
        return view('peminjam.create', compact('books'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'nokontak' => 'required',
            'tanggal' => 'required',
            'id_buku' => 'required',
            'jumlah_buku' => 'required',
        ]);

        Peminjam::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nokontak' => $request->nokontak,
            'tanggal' => $request->tanggal,
            'id_buku' => $request->id_buku,
            'jumlah_buku' => $request->jumlah_buku,
        ]);

        return redirect()->route('peminjam.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $peminjam = Peminjam::findOrFail($id);


        //delete post
        $peminjam->delete();

        //redirect to index
        return redirect()->route('peminjam.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
