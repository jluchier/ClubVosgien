<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttachmentsRequest;
use App\Models\Attachment;
use App\Models\Compterendu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function store(AttachmentsRequest $request, $id)
    {
        // Vérifier si attachable_type est bon

        $CR=Compterendu::findorfail($id);

        foreach($request->file('files') as $file)
        {
            $attachment = new Attachment();

            $storedFile = $file->storePubliclyAs('CompteRendusFile', $file->getClientOriginalName(), 'public');
            $attachment->name = basename($storedFile);

            $CR->attachables()->save($attachment);
        }

        return redirect()->route('compterendus.edit', $CR->id);
    }
}
