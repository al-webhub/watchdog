<?php

namespace App\Http\Controllers\Scan;

use App\Helpers\Helper;
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
       $scans = $website->scans()->latest()->orderBy('id', 'DESC')->take(48)->get();

       foreach ($scans as &$scan) {
           $data['labels'][] = Carbon::parse($scan->created_at)->format('H:i');
           $data['desktop'][] = $scan->score_desktop;
           $data['mobile'][] = $scan->score_mobile;
       }
       return Helper::sendResponse($data);
    }
}
