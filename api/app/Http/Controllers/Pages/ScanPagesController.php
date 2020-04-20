<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScanPagesController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(['auth:api']);
    }

    public function __invoke(Request $request)
    {
        $pages = Storage::disk('pages')->files('/');
        $onlyhtml = array_filter($pages, static function($str){
            return strpos($str, '.html') !== 0;
        });
        return response()->json(['pages' => $onlyhtml], 200);
    }
}
