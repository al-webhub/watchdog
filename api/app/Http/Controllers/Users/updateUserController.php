<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\User;
use App\Logic\Helper;
use Illuminate\Http\Request;

class updateUserController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(['auth:api']);
    }

    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$request->id.',id'
        ]);

        $user = User::find($request->id);
        if (!$user) {
            Helper::sendMessage('User with provided ID not found!', 404);
        }
        $user->email = $request->email;
        $user->name  = $request->name;
        $user->save();
        Helper::sendMessage('OK');
    }
}
