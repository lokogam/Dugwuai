<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\PasswordValidationRules;

use Illuminate\Support\Facades\Validator;


class cambiaPasswordController 
// implements UpdatesUserPasswords 
extends Controller 

{

    use PasswordValidationRules;

    public function index()
    {
        return view('profile.actulisapassword',);
    }

    public function store( Request $request)
    {
        $user = auth()->user();
    
        $input= $request->except('_token');
        

        Validator::make($input, [
            'current_password' => ['required', 'string'],
            'password' => $this->passwordRules(),
        ])->after(function ($validator) use ($user, $input) {
            if (! isset($input['current_password']) || ! Hash::check($input['current_password'], $user->password)) {
                $validator->errors()->add('current_password', __('The provided password does not match your current password.'));
            }
        })->validateWithBag('updatePassword');

        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();

        return view('profile.actulisapassword');
        // return response()->json($input);
    }
}
