<?php

namespace App\Http\Controllers\Website;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Website;
use Illuminate\Database\Eloquent\Builder;
class getWebsitesController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(['auth:api']);
    }

    public function __invoke(Request $request)
    {
        $user = auth()->user();
        //
        $search = $request->search;
        if ($search) {
            $websites =  $user->websites()->where('websites.url', 'LIKE', '%'.$search.'%')->orWhere('websites.name', 'LIKE', '%'.$search.'%')->get();
        } else {
            $websites = $user->websites()->get();
        }
        return Helper::sendResponse($websites, 200);
    }
}
