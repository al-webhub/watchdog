<?php

namespace App\Http\Controllers\Pages;

use App\Classes\Parser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParsePageTextController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(['auth:api']);
    }

    public function __invoke(Request $request)
    {
        $exists = $this->fileExists($request->filename);
        if (!$exists) {
            return response()->json(['message' => 'Requested filename not found!'], '404');
        }
        $text = Parser::getAllEditableTags($request->filename, $request->search);
        return response()->json($text, 200);
    }

    private function fileExists($filename)
    {
        return $exists = Storage::disk('pages')->exists($filename);
    }
}
