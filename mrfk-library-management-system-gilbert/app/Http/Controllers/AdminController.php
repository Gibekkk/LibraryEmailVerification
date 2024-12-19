<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function requests($collectionType)
    {
        $fields = array(
            "Request Type",
            "Librarian Username",
        );
        $datas = DB::select('select '.$collectionType.'_request.id as req_id, '.$collectionType.'_request.requestType as request_type, users.username as librarian_username from '.$collectionType.'_request inner join users on '.$collectionType.'_request.librarianID = users.id where users.level = "librarian" and users.isDeleted = 0');
        return view('admin.requests', compact('datas', 'fields', 'collectionType'));
    }

    public function declineRequest(Request $request, $collectionType)
    {
        DB::table($collectionType.'_request')->delete($request->req_id);
        return Redirect::to('/requests/'.$collectionType);
    }
    public function approveRequest(Request $request, $collectionType)
    {
        $requestDetail = DB::select('select '.$collectionType.'_request.id as req_id, '.$collectionType.'_request.requestType as request_type, users.username as librarian_username from '.$collectionType.'_request inner join users on '.$collectionType.'_request.librarianID = users.id where users.level = "librarian" and not users.isDeleted and '.$collectionType.'_request.id = "'.$request->req_id.'"')[0];
        $requestQuery = DB::select('select * from '.$collectionType.'_request where '.$collectionType.'_request.id = "'.$request->req_id.'"')[0];
        if($collectionType == "book"){
            if($requestDetail->request_type == "create"){
                DB::table('books')->insert([
                    'judul' => $requestQuery->judul,
                    'penerbit' => $requestQuery->penerbit,
                    'penulis' => $requestQuery->penulis,
                    'tahun_terbit' => $requestQuery->tahun_terbit,
                    'ISBN' => $requestQuery->isbn,
                    'isEbook' => $requestQuery->isEbook,
                    'ebookLink' => $requestQuery->ebookLink,
                    'isBorrowed' => false,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]);
            }
        } else if($collectionType == "fyp"){
            if($requestDetail->request_type == "create"){
                DB::table('final_year_projects')->insert([
                    'title' => $requestQuery->title,
                    'student_name' => $requestQuery->student_name,
                    'supervisor' => $requestQuery->supervisor,
                    'submission_year' => $requestQuery->submission_year,
                    'abstract' => $requestQuery->abstract,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]);
            }
        } else if($collectionType == "journal"){
            if($requestDetail->request_type == "create"){
                DB::table('journals')->insert([
                    'judul' => $requestQuery->judul,
                    'penerbit' => $requestQuery->penerbit,
                    'penulis' => $requestQuery->penulis,
                    'tahun_terbit' => $requestQuery->tahun_terbit,
                    'ISBN' => $requestQuery->isbn,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]);
            }
        } else if($collectionType == "cds"){
            if($requestDetail->request_type == "create"){
                DB::table('cds')->insert([
                    'title' => $requestQuery->title,
                    'artist' => $requestQuery->artist,
                    'publisher' => $requestQuery->publisher,
                    'release_year' => $requestQuery->release_year,
                    'genre' => $requestQuery->genre,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]);
            }
        } else{
            DB::table('newspapers')->insert([
                'name' => $requestQuery->name,
                'publication_date' => $requestQuery->publication_date,
                'publisher' => $requestQuery->publisher,
                'language' => $requestQuery->language,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
        DB::table('users')->where([['id', '=', $requestQuery->librarianID], ['isDeleted', '!=', true], ['level', '=', 'librarian']])->update(['last_update' => \Carbon\Carbon::now()]);
        DB::table($collectionType.'_request')->delete($request->req_id);
        return Redirect::to('/requests/'.$collectionType);
    }
    public function librarians()
    {
        $fields = array(
            "Name",
            "Username",
        );
        $datas = DB::select('select name, username, id, isDeleted from users where level="librarian"');
        return view('admin.librarians', compact('datas', 'fields'));
    }
    public function removeLibrarian(Request $request)
    {
        $librarianID = $request->librarianID;
        $confirmLibrarian = count(DB::select('select username from users where level="librarian" and id="'.$librarianID.'" and isDeleted = 0')) > 0 ? true : false;
        if ($confirmLibrarian) {
            DB::table('users')->where([['id', '=', $librarianID], ['isDeleted', '!=', true], ['level', '=', 'librarian']])->update(['isDeleted'=>true]);
        }
        return Redirect::to('/librarians');
    }

    public function addLibrarian()
    {
        return view('admin.addLibrarian');
    }

    public function addLibrarianProcess(Request $request)
    {
        $name = $request->name;
        $username = $request->username;
        $password = $request->password;
        $password_confirmation = $request->password_confirmation;

        if($password_confirmation == $password){
            $usernameAvailable = count(DB::select('select username from users where username = "'.$username.'"')) > 0 ? false : true;
            if($usernameAvailable){
                User::factory()->create([
                    'name' => $name,
                    'username' => $username,
                    "level" => "librarian",
                    "password" => Hash::make($password),
                ]);
            }
        }
        return Redirect::to('/librarians');
    }
}
