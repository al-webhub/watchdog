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
        $date = Carbon::today()->subDays(29);
        $scans = $website->scans()->whereBetween('created_at', [$request->range[0], $request->range[1]])->get()->groupBy(function($row) {
            return Carbon::parse($row->created_at)->format('W');
        });

        $data = Helper::formatGraphOutput($scans);
        return Helper::sendResponse($data);
    }
}
