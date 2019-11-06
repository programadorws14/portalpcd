<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginController extends Controller
{
    public function index()
    {   
        if(Auth::check()){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login.index');
    }

    public function store(request $request)
    {   

        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = $request->except('_token');
        $admin = Admin::whereEmail($data['email'])->first();

        if (Auth::check() || $admin && Hash::check($data['password'], $admin->password)) {
            Auth::guard('admin')->attempt($data);
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('admin.login');
        }
    }
    
    public function sair()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
