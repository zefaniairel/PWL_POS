<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
    // set validation
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'  => 'required',
            'password'  => 'required'
        ]);

        // if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // get crendentials from request
        $credentials = $request->only('username','password');

        // if auth failed
        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success'   => false,
                'message'   => 'Username atau Password Anda Salah'
            ],401);
        }

        // if auth succes
        return response()->json([
            'success'   => true,
            'user'      => auth()->guard('api')->user(),
            'token'     => $token
        ],200);
    }
}