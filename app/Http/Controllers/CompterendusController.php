<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttachmentsRequest;
use App\Http\Requests\CompterenduRequest;
use App\Models\Compterendu;
use App\Models\Attachment;
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
        $attachment = new Attachment();
        $CR = new Compterendu();
        $CR = $CR->attachables();
        dd($CR);
        $attachment = $attachment->attachable();
        $url = route("compterendus.store");
        $method = "post";
        return view('Admin.Compterendus.edit', compact(["CR", "url", "method", "attachment"]));
    }


    public function store(CompterenduRequest $request)
    {
        $file = $request->get('files');
        Compterendu::insert([
            "title" => $request->get("title"),
            "content" => $request->get("content"),
        ]);
        return redirect(route("compterendus.index"))->with("success", "Compte rendu  ajouté avec succès");
    }


    public function edit($id)
    {
        $CR = Compterendu::findorfail($id);
        $url = route("compterendus.update", $CR->id);
        $method = "put";
        return view('Admin.Compterendus.edit', compact(["CR", "url", "method"]));
    }


    public function update(CompterenduRequest $request, $id)
    {
        $CR = Compterendu::findorfail($id);
        //$CR->update($request->all());
        $CR->title = $request->get('title');
        $CR->content = $request->get('content');

        $CR->save();
        return redirect()->route('compterendus.index')->with('success', 'Le compte rendu a bien été modifié');
    }


    public function destroy($id)
    {
        Compterendu::destroy($id);
        return redirect(route("compterendus.index"))->with("success", "Compte rendu supprimé");
    }
}
