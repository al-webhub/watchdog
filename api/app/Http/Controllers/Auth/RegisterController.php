<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\SignInController;
use App\User;

class RegisterController extends Controller
{
   public function __invoke(Request $request)
   {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:6'
        ]);
        User::create(request(['name', 'email', 'password']));
        $token = auth()->attempt($request->only('email','password'));
        return $token ? response()->json(['token' => $token]) : response(null, 401);
   }
}
