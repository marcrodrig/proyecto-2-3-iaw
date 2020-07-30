<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Response;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller {

    public function login(Request $request) {

		$request->validate([
			'email' => 'required|email',
			'password' => 'required',
		]);
	
		$user = User::where('email', $request->email)->first();
	
		if (! $user || ! Hash::check($request->password, $user->password)) {
			throw ValidationException::withMessages([
				'email' => ['The provided credentials are incorrect.'],
			]);
		}
		$token =  $user->createToken('api_token')->plainTextToken;
		return response()->json(['user' =>  $user, 'access_token' => $token, 'status_code' => 200]);
	}
  
	public function logoutAPI(Request $request) {
		// Revoke all tokens...
		$request->user()->tokens()->delete();
		return response()->json(['message' => 'Logout exitoso.']);
	}

}
