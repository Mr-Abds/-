<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
return view('auth.register');
    }
    public function store()
    {
      $attribut=request()->validate([
            'first_name' =>["required",'min:3'],
            'last_name' =>["required",'min:3'],
            'email' =>["required",'min:3'],
            'password' =>['required','min:3','confirmed']
        ]);
   $user=User::create($attribut);
        Auth::login($user);
        return redirect("/"); 
    }
}
