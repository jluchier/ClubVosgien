<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    public function Delete($id)
    {
        $attach = Attachment::FindOrFail($id);
        Storage::disk('public')->delete("CompteRendusFile/".$attach->name);
        $attach->delete();
        return redirect(url()->previous())->with('success', 'Le pdf est supprimé');
    }
}
