<?php

namespace App\Http\Controllers;

use App\Domain\MasterData\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function authentication(Request $request)
    {
        $request->validate([
            'username'  => 'required',
            'password'  => 'required'
        ]);

        $user = User::where('username', $request->username)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect'],
            ]);
        }

        return $this->apiResponseSuccess($user->createToken('user login')->plainTextToken);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json('berhasil');
    }

    public function me(Request $request)
    {
        return response()->json(Auth::user());
    }
}
