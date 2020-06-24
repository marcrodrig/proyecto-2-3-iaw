<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function edit(User $user) {
        return view('users.edit', compact('user'));
    }

    public function update(User $user) {
        $validatedAttributes = request()->validate([
            'username' => ['string', 'max:30', Rule::unique('users')->ignore($user), 'alpha_dash'],
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
            'avatar' => ['mimes:jpeg,bmp,png']
        ]);
        $actualizaAvatar = request()->has('avatar');
        if ($actualizaAvatar) {
            // Store en storage/app/public, link con public/storage
            $file = request()->file('avatar');
            $filename = $file->getClientOriginalName();
            $file->storeAs($filename,'');
            $validatedAttributes['avatar'] = $filename;
        }
        $validatedAttributes['password'] = Hash::make($validatedAttributes['password']);
            
        $user->update($validatedAttributes);
        
        return redirect($user->path());
    }
}
