<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Files;

class UpdateFileContentsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function __invoke(Request $request)
    {
        $result = Files::ReplaceFileContent($request->filename, $request->contents);
        if ($result) {
            $lastmodified = Files::getLastModifiedDate($request->filename);
            return response()->json(['message' => $lastmodified], 200);
        }
    }
}
