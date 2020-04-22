<?php

namespace App\Http\Controllers\Images;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Parser;

class ParsePageImagesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function __invoke(Request $request)
    {
        $images = Parser::getImages($request->filename);
        return response()->json($images, 200);
    }
}
