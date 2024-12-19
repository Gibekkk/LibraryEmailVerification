<?php

namespace App\Http\Controllers;

use App\Models\Journals;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($sort = "asc")
    {
        if(strtolower($sort) != "desc"){
            $sort = "asc";
        }
        $type = "Jurnal";
        $fields = array(
            "Judul",
            "Penerbit",
            "Penulis",
            "Tahun Terbit",
            "ISBN"
        );
        $location = "journals";
        $datas = DB::select('select * from journals order by judul '.strtoupper($sort));
        return view('general.display', compact('datas', 'sort', 'type', 'fields', 'location'));
    }

    public function addJournal()
    {
        return view('librarian.create.journal');
    }

    public function addJournalProcess(Request $request)
    {
        DB::table('journal_request')->insert([
            'librarianID' => Auth::user()->id,
            'judul' => $request->judul,
            'penerbit' => $request->penerbit,
            'penulis' => $request->penulis,
            'tahun_terbit' => $request->tahun_terbit,
            'isbn' => $request->isbn,
            'requestType' => "create",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        return redirect()->route('journals')->with('success', 'Journal added successfully!');
    }
}
