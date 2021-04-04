<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserRegisterResource;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; 
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiAuthController extends Controller
{
    public function register (RegisterRequest $request) {
        $request['password']=Hash::make($request['password']);
        $request['remember_token'] = Str::random(10);
        $user = User::create($request->toArray());
        $user->attachRole('user');
        $user['token'] = $user->createToken('Laravel Password Grant Client')->accessToken;
        return response()->json([
            'status' => 'success',
            'data'   => new UserRegisterResource($user)
        ], 200);
    } // end of Register User

    public function login (LoginRequest $request) {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $user['token'] = $user->createToken('Laravel Password Grant Client')->accessToken;
                return response()->json([
                    'status' => 'success',
                    'data'   => new UserResource($user),
                ], 200);
            } else {
                return response()->json([
                    'status' => 'success',
                    "message" => "user or password is not correct"
                ], 422);
            }
        } else {
            return response()->json([
                'status' => 'success',
                "message" =>'user or password is not correct'
            ], 422);
        }
    } //end of login

    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    } //end of logout

} // end of AuthController
