<?php

namespace App\Http\Controllers\Scan;

use App\Http\Controllers\Controller;
use App\Logic\Helper;
use App\Scan;
use App\Website;
use Carbon\Carbon;
use Illuminate\Http\Request;

class getMonthlyController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(['auth:api']);
    }

    public function __invoke(Request $request)
    {
        $user = auth()->user();
        if ($user->is_admin) {
            $website = Website::find($request->website_id);
        } else {
            $website = $user->websites()->find($request->website_id);
        }

        $date = Carbon::today()->subDays(29);
        $scans = $website->scans()->where('created_at', '>=', $date)->get()->groupBy(function($row) {
            return Carbon::parse($row->created_at)->format('d.m');
        });

        $data = Helper::formatGraphOutput($scans);
        return Helper::sendResponse($data);
    }
}
