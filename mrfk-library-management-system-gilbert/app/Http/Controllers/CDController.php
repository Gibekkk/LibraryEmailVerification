<?php

namespace App\Http\Controllers;

use App\Models\CD;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($sort = "asc")
    {
        if (strtolower($sort) != "desc") {
            $sort = "asc";
        }
        $type = "CD";
        $fields = array(
            "Title",
            "Artist",
            "Publisher",
            "Release Year",
            "Genre"
        );
        $location = "cds";
        $datas = DB::select('select * from cds order by title '.strtoupper($sort));
        return view('general.display', compact('datas', 'sort', 'type', 'fields', 'location'));
    }

    public function addCD()
    {
        return view('librarian.create.cds');
    }

    public function addCdProcess(Request $request)
{
    DB::table('cds_request')->insert([
        'librarianID' => Auth::user()->id,
        'title' => $request->title,
        'artist' => $request->artist,
        'publisher' => $request->publisher,
        'release_year' => $request->release_year,
        'genre' => $request->genre,
        'requestType' => "create",
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ]);

    // Redirect to the CDs list page with a success message
    return redirect()->route('cds')->with('success', 'CD added successfully!');
}
}
