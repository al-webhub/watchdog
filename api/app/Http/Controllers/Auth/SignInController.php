<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignInController extends Controller
{
    public function __invoke(Request $request)
    {
        $token = auth()->attempt($request->only('email','password'));
        return $token ? response()->json(['token' => $token]) : response(null, 401);
    }
}
