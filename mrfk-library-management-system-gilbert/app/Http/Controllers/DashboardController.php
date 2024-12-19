<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::id()){
            $userLevel = Auth::user()->level;
            switch($userLevel){
                case "admin":
                    return view("admin.dashboard");
                case "librarian":
                    return view("librarian.dashboard");
            }
        }
        return view("welcome");
    }
}
