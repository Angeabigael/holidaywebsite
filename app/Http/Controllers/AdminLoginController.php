<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

   /* public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }*/

    public function showLoginForm()
    {
        return view('backend.admin.login');
    }

    public function login(AdminLoginRequest $request)
    {
        // Tentative de connexion
        $credentials = $request->validated();
        if (Auth::guard('admin')->attempt(['name' => $credentials['name'], 'password' => $credentials['password']])) {
            // Redirection vers le dashboard admin
            return redirect()->intended(route('dashboard'));
        }

        // Redirection en cas d'échec
        return redirect()->back()->withErrors(['name' => 'Informations invalides'])->onlyInput('name');
    }

    public function logout()
    {
        Auth::guaed('admin')->logout();
        return redirect()->route('admin.login');
    }


}
