<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Index()
    {
        return redirect(route("articles.index"));
    }

    public function editUsers(Request $request){
        if ($request->has("privilege"))
        {
            if ( $request->get("privilege") == 'Tous')
            {
                $users = User::all();
            }
            else
            {
                $users = User::where("privilege", $request->get("privilege"))->get();
            }
        }
        else
        {
            $users = User::all();
        }

        $url = route("inscriptionsUpdate");
        $method = "get";

        return view('Admin.inscriptions', compact(["users", "url", "method"]));
    }

    public function updateUsers(Request $request){
        $user = User::findorfail($request->user);
        $user->privilege = $request->get("privilege");


        $user->save();
        return redirect(route("inscriptions"));
    }
}
