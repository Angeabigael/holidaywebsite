<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidatePersonnelRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Personnel;
use App\Models\structure;

class PersonnelController extends Controller
{
    public function index()
    {
        $structures = Structure::all();
        return view('frontend.presentation', [
            'structures' => $structures
        ]);
    }

    public function validate(ValidatePersonnelRequest $request)
    {
        $data = $request->validated();
        $structure = Structure::where('designation', $data['structure'])->first();

        if(!$structure){
            return back()->withErrors(['structure' => 'La structure spécifiée est introuvable']);
        }

        $personnel = Personnel::where([
            'matricule' => $data['matricule'],
            'nom' => $data['nom'],
            'prenoms' => $data['prenom'],
            'corps' => $data['corps'],
            'structures_id' => $structure->id
        ])->first();

        $user = Auth::user();
        if ($personnel and (($user->personnels_id) === ($personnel->id))){
            Session::put('personnels_id', $personnel->id);
            return redirect()->route('layout.accueil');
        }else{
            return back()->withErrors(['matricule' => 'Informations non valides']);
        }

    }
}
