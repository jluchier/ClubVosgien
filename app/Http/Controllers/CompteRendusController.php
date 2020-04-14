<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Compterendu;
use App\Http\Requests\AttachmentsRequest;
use App\Http\Requests\CompteRenduRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PhpParser\Node\Stmt\Return_;
use function GuzzleHttp\Promise\all;

class CompteRendusController extends Controller
{

    public function index()
    {
        $compteRendus = Compterendu::orderBy("created_at", "desc")->get();
        return view('Admin.CompteRendus.index', compact(['compteRendus']));

     // return redirect(route("construction", ["page" => "compteRendus"]));
    }


    public function create()
    {
        $CR = new Compterendu();
        $url = route("compteRendus.store");
        $method = "post";
        //$Attachment = attachment::pluck("name", "id");

        return view("Admin.CompteRendus.edit", compact(["CR", "url", "method"]));
    }


    public function store(Compterendu $request)
    {
        Compterendu::insert([
            "title" => $request->get("title"),
            "content" => $request->get("content"),
        ]);
        dd($request);
        return redirect(route("compteRendus.index"))->with("success", "Compte rendu  ajouté avec succès");
    }


    public function edit(Compterendu $CR)
    {
        $url = route("compteRendus.update", $CR->id);
        $method = "put";
        return view('Admin.CompteRendus.edit', compact(["CR", "url", "method"]));
    }


    public function update(CompteRenduRequest $request, Compterendu $CR)
    {
        //$CR->update($request->all());
        $CR->title = $request->get('title');
        $CR->content = $request->get('content');

        $CR->save();
        return redirect()->route('CompteRendus.edit',['id' => $CR->id])->with('success', 'Compte rendu modifié');
    }


    public function destroy(Compterendu $CR)
    {
        Compterendu::destroy($CR->id);

        return redirect(route("compteRendus.index"))->with("success", "Compte rendu supprimé");
    }
/*    public function compteRendus(){
        return view('CompteRendus.edit');
        //return redirect(route("construction", ["page" => "compteRendus"]));
    }*/


}
