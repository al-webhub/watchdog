<?php

namespace App\Http\Controllers\Settings\Profile;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateProfileController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(['auth:api']);
    }

    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'name'  => 'required|min:5|max:64|alpha_num',
            'password' => 'required'
        ]);
        $message = 'Username has been changed!';
        $user = User::where('email', $request->email)->get()->first();
        $user->name = $request->name;
        if ($user) {
            if (!Hash::check($request->password, $user->password)) {
                // Password check failed
                return response()->json(['errors' => ['password' => 'Wrong current password']],422);
            }
        }
        if (isset($request->newpassword)) {
            $this->validate($request, [
                'newpassword' => 'min:5|max:32|alpha_num'
            ]);
            $user->password = Hash::make($request->newpassword);
            $message = "Password has been changed! Please log in";
            auth()->logout();
        }
        $user->save();
        return response()->json(['message' => $message], 200);

    }
}
