<?php

namespace App\Http\Controllers\Scan;

use App\Http\Controllers\Controller;
use App\Logic\Helper;
use App\Website;
use Carbon\Carbon;
use Illuminate\Http\Request;

class getRangeController extends Controller
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
        $format = 'd.m';
        $diff = Carbon::parse($request->range[0])->diffInDays(Carbon::parse($request->range[1]));
        if ($diff > 50) {
            $format = 'W-Y';
        }
        $start_date = Carbon::parse($request->range[0]);
        $end_date = Carbon::parse($request->range[1]);
        if ($request->range[0] == $request->range[1]) {
            $format = 'H';
            $start_date = Carbon::parse($request->range[0]);
            $end_date = Carbon::parse($request->range[1])->addHours(23)->addMinutes(59)->addSeconds(59);
        }
        $scans = $website->scans()->whereBetween('created_at', [$start_date, $end_date])->get()->groupBy(function($row) use ($format) {
            return Carbon::parse($row->created_at)->format($format);
        });
        $data = Helper::formatGraphOutput($scans, $format);
        return Helper::sendResponse($data);
    }
}
