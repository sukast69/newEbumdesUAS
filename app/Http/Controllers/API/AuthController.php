<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !\Hash::check($request->password, $user->password)) {
            return \response()->json([
                'message' => 'Unauthorized'],
                401);
        }

        $token = $user()->createToken('token_name')->plainTextToken;

        return \response()->json([
            'message' => 'succses',
            'user' => $user,
            'token' => $token],
            200);
    }
}