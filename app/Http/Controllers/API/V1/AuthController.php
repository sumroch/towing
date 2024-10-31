<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function authentication(Request $request)
    {
        $request->validate([
            'username'  => 'required',
            'password'  => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $token = $request->user()->createToken('PAT')->plainTextToken;

            return response()->json([
                'status' => 'success',
                'code'  => '200',
                'data'  => [
                    'id'        => $request->user()->id,
                    'token'     => $token,
                    'name'      => $request->user()->name,
                    'username'  => $request->user()->username,
                    'email'     => $request->user()->email,
                    'telephone' => $request->user()->telephone,
                    'store_id'  => $request->user()->store_id,
                    'role'      => $request->user()->roles[0]->name,
                ],
            ]);
        }

        throw ValidationException::withMessages([
            'username' => ['The provided credentials are incorrect.'],
            'password' => ['The provided credentials are incorrect.'],
        ]);
    }

    public function logout(Request $request)
    {
        return $this->apiResponseSuccess($request->user()->currentAccessToken()->delete());
    }

    public function me()
    {
        return response()->json(Auth::user());
    }
}
