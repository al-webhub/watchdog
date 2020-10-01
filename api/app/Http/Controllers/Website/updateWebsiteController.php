<?php

namespace App\Http\Controllers\Website;

use App\Logic\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class updateWebsiteController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(['auth:api']);
    }

    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required'
        ]);

        $user = auth()->user();
        $website = $user->websites()->where('id', '=', $request->id)->get()->first();
        if ($request->toggle) {
            $website->active = !$website->active;
        } else {
            $website->name = $request->name;
            $website->url  = $request->url;
        }
        $website->save();
        return Helper::sendMessage('OK');
    }
}
