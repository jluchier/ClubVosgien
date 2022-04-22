<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttachmentsRequest;
use App\Http\Requests\CompterenduRequest;
use App\Models\Attachment;
use App\Models\Compterendu;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PhpParser\Node\Stmt\Return_;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Storage;

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

        return view('Admin.Compterendus.edit', compact(["CR", "url", "method"]));
    }


    public function store(CompterenduRequest $request)
    {
        $CR = Compterendu::create([
            "title" => $request->get("title"),
            "content" => $request->get("content"),
        ]);

        if ($request->has('files')) {
            foreach ($request->file('files') as $file) {
                $attachment = new Attachment();

                $storedFile = $file->storePubliclyAs('CompteRendusFile', $file->getClientOriginalName(), 'public');
                $attachment->name = basename($storedFile);


                if (Attachment::where('name', $attachment->name)->exists() == false) {
                    $CR->attachables()->save($attachment);
                } else {
                    $errors[] = "Le fichier " . $attachment->name . " existe déjà";
                }
            }
        }

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
        $CR->title = $request->get('title');
        $CR->content = $request->get('content');

        $errors = [];

        if ($request->has('files')) {
            foreach ($request->file('files') as $file) {
                $attachment = new Attachment();


                $storedFile = $file->storePubliclyAs('CompteRendusFile', $file->getClientOriginalName(), 'public');

                $attachment->name = basename($storedFile);

                if (Attachment::where('name', $attachment->name)->exists() == false) {
                    $CR->attachables()->save($attachment);
                } else {
                    $errors[] = "Le fichier " . $attachment->name . " existe déjà";
                }
            }
        }

        $CR->save();

        return redirect()->route('compterendus.index')->with('success', 'Compte rendu modifié')->withErrors($errors);
    }


    public function destroy($id)
    {
        $cr = Compterendu::findOrfail($id);
        foreach ($cr->attachables()->get() as $attachable) {
            Storage::disk('public')->delete("CompteRendusFile/" . $attachable->name);
            $attachable->delete();
        }
        $cr->delete();
        return redirect(route("compterendus.index"))->with("success", "Compte rendu supprimé");
    }
}
