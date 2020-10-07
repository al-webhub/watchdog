<?php

namespace App\Http\Controllers\Scan;

use App\Http\Controllers\Controller;
use App\Logic\Helper;
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
        $website = $user->websites()->find($request->website_id);
        $format = 'd.m';
        $diff = Carbon::parse($request->range[0])->diffInDays(Carbon::parse($request->range[1]));
        if ($diff > 50) {
            $format = 'W-Y';
        }
        $scans = $website->scans()->whereBetween('created_at', [$request->range[0], $request->range[1]])->get()->groupBy(function($row) use ($format) {
            return Carbon::parse($row->created_at)->format($format);
        });
        $data = Helper::formatGraphOutput($scans, $format);
        return Helper::sendResponse($data);
    }
}
