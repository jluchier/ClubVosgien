<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Index()
    {
        return redirect(route("articles.index"));
    }

    public function editUsers(Request $request){
        if ($request->has("privilege"))
        {
            $users = User::where("privilege", $request->get("privilege"))->get();
        }
        else
        {
            $users = User::all();
        }

        return view('Admin.inscriptions', compact(["users"]));
    }
}
