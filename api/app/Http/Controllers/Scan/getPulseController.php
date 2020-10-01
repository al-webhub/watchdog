<?php

namespace App\Http\Controllers\Scan;

use App\Logic\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Scan;
use Illuminate\Support\Carbon;
class getPulseController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(['auth:api']);
    }

    public function __invoke(Request $request)
    {
       $website_id = $request->website_id;
       // TODO  Some validation
       $user = auth()->user();
       $website = $user->websites()->find($website_id);
       $scans = $website->scans()->latest()->orderBy('id', 'DESC')->take(50)->get();

       $scans = $scans->reverse();
       foreach ($scans as &$scan) {
           $data['labels'][] = Carbon::parse($scan->created_at)->format('H:i');
           $data['desktop'][] = $scan->score_desktop;
           $data['mobile'][] = $scan->score_mobile;
           $data['fcp_mobile'][] = $scan->fcp_mobile;
           $data['fcp_desktop'][] = $scan->fcp_desktop;
           $data['tti_mobile'][] = $scan->tti_mobile;
           $data['tti_desktop'][] = $scan->tti_desktop;
           $data['si_mobile'][] = $scan->si_mobile;
           $data['si_desktop'][] = $scan->si_desktop;
           $data['fcpu_idle_mobile'][] = $scan->fcpu_idle_mobile;
           $data['fcpu_idle_desktop'][] = $scan->fcpu_idle_desktop;
           $data['ttfb_mobile'][] = $scan->ttfb_mobile;
           $data['ttfb_desktop'][] = $scan->ttfb_desktop;
       }
       return Helper::sendResponse($data);
    }
}
