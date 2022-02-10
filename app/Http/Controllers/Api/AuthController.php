<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        if(!Auth::attempt($request->all(['email', 'password']))) {
            return response()->json([
                'error' => 'Incorrect credentials'
            ], 401);
        }

        return response()->json([
            'access_token' => Auth::user()->createToken('tokens')->plainTextToken
        ]);

//        $user = User::where('email', $request->input('email'))->first();
//        dump($user->password, Hash::check($request->input('password'), $user->password));
//        if($user && Hash::check($request->input('password'), $user->password)) {
//            return response()->json([
//                'access_token' => $user->createToken('tokens')->plainTextToken
//            ]);
//        }
//        return response()->json([
//            'error' => '!!!!'
//        ], 404);

    }

    public function register(Request $request) {
        $data = [
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'name' => $request->input('name')
            // 'api_token' => Hash::make('sha256', bcrypt($request->input('password')))
        ];
        $user = User::create($data);
        return response()->json([
            'access_token' => $user->createToken('tokens')->plainTextToken
        ]);
    }

    public function logout() {
//        DB::table('personal_access_tokens')
//            ->where('tokenable_id', Auth::id())
//            ->delete();
        Auth::user()->tokens()->delete();
        Auth::logout();
        return response()->json([
            'message' => 'Bye!'
        ]);

    }
}
