<?php

namespace App\Http\Controllers\Website;

use App\Logic\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class deleteWebsiteController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(['auth:api']);
    }

    public function __invoke(Request $request)
    {
        $user = auth()->user();
        $user->websites()->where('id', '=', $request->id)->delete();
        Helper::sendMessage('OK');
    }
}
