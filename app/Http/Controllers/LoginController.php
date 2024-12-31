<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
return view('auth.login');
    }

    public function store()
    {
        $attribut=request()->validate([
            'email' =>["required",'min:3'],
            'password' =>['required','min:3']
        ]);
 
       if(!Auth::attempt($attribut)){
        throw  ValidationException::withMessages([
            "email"  =>"sorry the email or password is not macth"
        ]);
       }
       request()->session()->regenerate();
        return redirect("/"); 
    }

    public function destroy()
    {
Auth::logout();
return redirect("/"); 
    }
}
