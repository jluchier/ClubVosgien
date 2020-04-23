<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Compterendu;
use App\Http\Requests\AttachmentsRequest;
use App\Http\Requests\CompterenduRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PhpParser\Node\Stmt\Return_;
use function GuzzleHttp\Promise\all;

class CompterendusController extends Controller
{

    public function index()
    {
        $compterendus = Compterendu::orderBy("created_at", "desc")->get();
        return view('Admin.Compterendus.index', compact(['compterendus']));
    }


    public function create()
    {
        $CR = new Compterendu();
        $url = route("compterendus.store");
        $method = "post";
        //$Attachment = attachment::pluck("name", "id");

        return view('Admin.Compterendus.edit', compact(["CR", "url", "method"]));
    }


    public function store(CompterenduRequest $request)
    {
        Compterendu::insert([
            "title" => $request->get("title"),
            "content" => $request->get("content"),
        ]);
        return redirect(route("compterendus.index"))->with("success", "Compte rendu  ajouté avec succès");
    }


    public function edit($id)
    {
        $CR=Compterendu::findorfail($id);
        $url = route("compterendus.update", $CR->id);
        $method = "put";
        return view('Admin.Compterendus.edit', compact(["CR", "url", "method"]));
    }


    public function update(CompterenduRequest $request, $id)
    {
        $CR=Compterendu::findorfail($id);
        //$CR->update($request->all());
        $CR->title = $request->get('title');
        $CR->content = $request->get('content');

        $CR->save();
        return redirect()->route('compterendus.index')->with('success', 'Compte rendu modifié');
    }


    public function destroy($id)
    {
        Compterendu::destroy($id);
        return redirect(route("compterendus.index"))->with("success", "Compte rendu supprimé");
    }

}
