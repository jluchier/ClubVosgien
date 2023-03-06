<?php

namespace App\Http\Controllers;

use App\Models\Compterendu;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function index($id)
    {
        $CR = Compterendu::findorfail($id);
        $file = "storage/" . $CR->path;
        $realChemin = '/' . $file;
        return view('displayPdf', compact(["realChemin", "CR"]));
    }
}
