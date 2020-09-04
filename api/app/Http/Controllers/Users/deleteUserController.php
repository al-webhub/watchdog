<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class deleteUserController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(['auth:api']);
    }

    public function __invoke(Request $request)
    {
        if (!$request->has('id')) {
            return response()->json('User ID must be provided', 400);
        }
        $user = User::find($request->id);
        if (!$user) {
             return response()->json('User with provided ID not found!', 404);
        }
        $user->delete();
        return response()->json('OK', 200);
    }
}
