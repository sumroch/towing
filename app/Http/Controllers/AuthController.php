<?php

namespace App\Http\Controllers;

use App\Domain\MasterData\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

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
                'token' => $token,
                'data'  => [
                    'id'        => $request->user()->id,
                    'name'      => $request->user()->name,
                    'username'  => $request->user()->username,
                    'email'     => $request->user()->email,
                    'telephone' => $request->user()->telephone,
                    'role'      => $request->user()->roles[0]->name,
                ],
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json('berhasil');
    }

    public function me()
    {
        return response()->json(Auth::user());
    }
}