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
        $text = Parser::getAllEditableTags($request->filename, $request->search);
        return response()->json($text, 200);
    }
}
