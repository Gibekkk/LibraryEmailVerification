<?php

namespace App\Http\Controllers;

use App\Models\Newspaper;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewspaperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($sort = "asc")
    {
        if (strtolower($sort) != "desc") {
            $sort = "asc";
        }
        $type = "Koran";
        $fields = array(
            "Name",
            "Publication Date",
            "Publisher",
            "Language",
            "Lokasi",
        );
        $location = "newspapers";
        $datas = DB::select('SELECT *, IF(created_at < created_at + INTERVAL 7 DAY, "Gudang", "Pajangan") AS lokasi FROM newspapers order by name ' . strtoupper($sort));
        return view('general.display', compact('datas', 'sort', 'type', 'fields', 'location'));
    }

    public function addNewspaper()
    {
        return view('librarian.create.newspaper');
    }

    public function addNewspaperProcess(Request $request)
    {
        DB::table('newspaper_request')->insert([
            'librarianID' => Auth::user()->id,
            'name' => $request->name,
            'publication_date' => $request->publication_date,
            'publisher' => $request->publisher,
            'language' => $request->language,
            'requestType' => "create",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        return redirect()->route('newspapers')->with('success', 'Newspaper request added successfully!');
    }
}
