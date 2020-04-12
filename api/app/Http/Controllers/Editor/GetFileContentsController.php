<?php

namespace App\Http\Controllers\Editor;

use App\Classes\Files;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetFileContentsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function __invoke(Request $request)
    {
        $contents = Files::getFile($request->filename);
        return response()->json($contents, 200);
    }
}
