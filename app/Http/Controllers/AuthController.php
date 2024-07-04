<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\InscriptionRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Structure;
use App\Models\Personnel;

class AuthController extends Controller
{
    public function login()
    {
        return view('accueil');
    }


    public function verifylogin(LoginRequest $request)
    {
        $credits = $request->validated();
        if (Auth::attempt($credits)){
            $request->session()->regenerate();
            return redirect()->route('presentation');
        }

        return redirect()->back()->withErrors([
            'email' => 'Email peut être inccorect',
            'password' => 'Mot de passe peut être incorrect'
        ])->onlyInput('email','password');

    }

    public function signup(InscriptionRequest $request )
    {
        $results = $request->validated();
        $personnel = Personnel::where([
            'matricule' => $results['matricule'],
            'nom' => $results['nom'],
            'prenoms' => $results['prenom']
        ])->first();
        $user = User::create([
            'email' => $results['email'],
            'password' => $results['password'],
            'personnels_id' => $personnel->id
        ]);
        $request->session()->regenerate();
        return redirect()->route('layout.accueil');
    }
}
