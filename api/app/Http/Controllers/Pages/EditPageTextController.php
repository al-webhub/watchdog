<?php

namespace App\Http\Controllers\Pages;

use App\Classes\Files;
use App\Classes\Parser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditPageTextController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function __invoke(Request $request)
    {
        $file = Files::getFile($request->filename);
        $html = Parser::EditHtml($request->oldvalue, $request->value, $file);
        return Files::ReplaceFileContent($request->filename, $html);
    }
}
