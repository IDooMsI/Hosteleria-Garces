<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
        return view('auth.passwords.reset');
    }

   public function resetPassword(Request $request)
   {
        $this->validator($request->all())->validate();

        User::where('email', $request['email'])->update([
            'password' => Hash::make($request['password'])
        ]);
        
       return view('auth.login')->with('notice','La contraseña se cambio correctamente');
   }

    public function validator($request)
    {
        return Validator::make($request, [
            'email' => 'required|exists:users,email',
            'password' => 'required|confirmed|min:8',
        ]);
    }
}
