<?php

namespace App\Http\Controllers\Users;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class getUsersController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(['auth:api']);
    }

    public function __invoke(Request $request)
    {
        if (auth()->user()->is_admin !== 1) {
           return Helper::sendMessage('Permission denied', 403);
        }
        $search = $request->search;
        if (!$search) {
            $users = User::take(10)->get();
        } else {
            $users = User::query()
                ->whereLike('name', $search)
                ->whereLike('email', $search)
                ->take(10)->get();
        }
        return Helper::sendResponse($users);
    }
}
