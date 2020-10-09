<?php

namespace App\Http\Controllers\Website;

use App\Logic\Helper;
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
        if ($user->is_admin) {
            $websites = $this->adminData($request);
        } else {
            $websites = $this->userData($request);
        }

        return Helper::sendResponse($websites, 200);
    }

    private function adminData(Request $request)
    {
        if ($request->search) {
            $websites = Website::where('websites.url', 'LIKE', '%'.$request->search.'%')->orWhere('websites.name', 'LIKE', '%'.$request->search.'%');
        }  else {
            $websites = new Website();
        }

        $websites = $websites->with(['scans' => function($query) {
            $query->latest()->limit(1);
        }])->withCount('scans')->get();
        return $websites;
    }

    private function userData(Request $request)
    {
        $user = auth()->user();
        if ($request->search) {
            $websites =  $user->websites()->where('websites.url', 'LIKE', '%'.$request->search.'%')->orWhere('websites.name', 'LIKE', '%'.$request->search.'%');
        } else {
            $websites = $user->websites();
        }

        $websites = $websites->with(['scans' => function($query) {
            $query->latest()->limit(1);
        }])->withCount('scans')->get();

        return $websites;
    }
}
