<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($sort = "asc")
    {
        if (strtolower($sort) != "desc") {
            $sort = "asc";
        }
        $type = "Buku";
        $fields = array(
            "Judul",
            "Penerbit",
            "Penulis",
            "Tahun Terbit",
            "ISBN",
            "Jenis Buku",
            "Link Akses",
            "Status Peminjaman"
        );
        $location = "books";
        $datas = DB::select('select *, IF(isEbook, "E-Book", "Physical Book") AS jenis_buku, ebookLink as link_akses, IF(isBorrowed, "Dipinjam", "Tersedia") AS status_peminjaman FROM books order by judul ' . strtoupper($sort));
        return view('general.display', compact('datas', 'sort', 'type', 'fields', 'location'));
    }

    public function addBook()
    {
        return view('librarian.create.book');
    }

    public function addBookProcess(Request $request)
    {
        DB::table('book_request')->insert([
            'librarianID' => Auth::user()->id,
            'judul' => $request->judul,
            'penerbit' => $request->penerbit,
            'penulis' => $request->penulis,
            'tahun_terbit' => $request->tahun_terbit,
            'ISBN' => $request->isbn,
            'isEbook' => $request->has('isEbook'),
            'ebookLink' => $request->has('isEbook') ? $request->ebookLink : null,
            'isBorrowed' => $request->has('isBorrowed'),
            'requestType' => "create",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        return redirect()->route('books')->with('success', 'Book added successfully!');
    }
}
