<?php

namespace App\Http\Controllers;

use App\User;
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
            $users = User::where("privilege", $request->get("privilege"))->get();
            // if ($user = null){
            //     $user = User::where("privilege", 'Inscrit')->first();
            // }
            // dd($user);
        }
        else
        {
            $users = User::all();
        }
        //dd($request);
        // $users = User::all();
        $url = route("inscriptionsUpdate");
        $method = "get";

        $urlShowPrivilege = route("showUsersByPrivilege");

        return view('Admin.inscriptions', compact(["users", "url", "method", "urlShowPrivilege"]));
    }

    public function updateUsers(Request $request){
        $user = User::findorfail($request->user);
        if (($request->get("privilege"))=== '0') {
            $user->privilege = "A valider";
        }
        elseif (($request->get("privilege"))=== '1') {
            $user->privilege = "Banni";
        }
        elseif (($request->get("privilege"))=== '2') {
            $user->privilege = "Inscrit";
        }        
        else {
            $user->privilege = "Admin";
        }

        $user->save();
        return redirect(route("inscriptions"));
    }

    public function showUsersByPrivilege(Request $request){
        //dd($request->get("value"));
 
        if (($request->get("value"))=== 'AV') {
            $value = "A valider";
        }
        else $value = "Inscrit" ;       

dd($value);
        return view('Admin.inscriptions', compact("value"));;
        }





}
