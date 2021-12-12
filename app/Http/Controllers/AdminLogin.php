<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Session;

class AdminLogin extends Controller
{
    public function adminCrediential(Request $request)

    {

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            Session::put('client','');
            return \redirect()->route('admin')->with('success','Login as admin');
        }else{
            return \back()->withInput($request->only('email'))->with('error','Crediential does not matched in our records');

        }


    }

    public function adminregister(Request $request)

    {

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);


    }




}
