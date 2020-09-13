<?php

namespace App\Http\Controllers\Website;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Rules\DomainValidation;
use Illuminate\Http\Request;
use App\Website;

class addWebsiteController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(['auth:api']);
    }

    public function __invoke(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required|unique:websites'
        ]);
        $request->validate([
            'name' => ['required'],
            'url'  => ['required', 'unique:websites', new DomainValidation()]
        ]);


        $website = new Website();
        $website->name = $request->name;
        $website->url  = $request->url;
        $website->user_id = $user->id;
        $website->save();
        Helper::sendMessage('OK');
    }
}
