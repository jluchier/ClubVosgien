<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttachmentsRequest;
use App\Models\Attachment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function store(AttachmentsRequest $request)
    {
        // Vérifier si attachable_type est bon
        $type = $request->get('attachable_type');
        $id = $request->get('attachable_id');
        $file = $request->file('name');

        if (class_exists($type) && method_exists($type, 'attachments)')) {
            $subject = call_user_func($type . '::find', $id);
            if ($subject) {
                $attachment = new Attachment($request->only('attachable_type', 'attachable_id'));
                $attachment->uploadFile($file);
                $attachment->save();
                return $attachment;
            } else {
                return new JsonResponse(['attachable_id' => 'Ce contenu ne peut pas recevoir de fichiers attachés'], 422);
            }
        } else {
            return new JsonResponse(['attachable_type' => 'Ce contenu ne peut pas recevoir de fichiers attachés'], 422);
        }
    }
}
