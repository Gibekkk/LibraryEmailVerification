<?php

namespace App\Http\Controllers;

use App\Models\FinalYearProject;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinalYearProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($sort = "asc")
    {
        if (strtolower($sort) != "desc") {
            $sort = "asc";
        }
        $type = "FYP";
        $fields = array(
            "Title",
            "Student Name",
            "Supervisor",
            "Submission Year",
            "Abstract"
        );
        $location = "final_year_projects";
        $datas = DB::select('select * from final_year_projects order by title ' . strtoupper($sort));
        return view('general.display', compact('datas', 'sort', 'type', 'fields', 'location'));
    }

    public function addFyp()
    {
        return view('librarian.create.fyps');
    }

    public function addFypProcess(Request $request)
    {
        DB::table('fyp_request')->insert([
            'librarianID' => Auth::user()->id,
            'title' => $request->title,
            'student_name' => $request->student_name,
            'supervisor' => $request->supervisor,
            'submission_year' => $request->submission_year,
            'abstract' => $request->abstract,
            'requestType' => "create",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        return redirect()->route('final_year_projects')->with('success', 'FYP added successfully!');
    }
}
