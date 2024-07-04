<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidatePersonnelRequest;
use App\Http\Requests\SearchPersonnelRequest;
use App\Models\Personnel;
use App\Models\structure;
use App\Models\Demande;
use App\Models\User;
use App\Models\Admin;
use Barryvdh\DomPDF\Facade\Pdf;

class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employes = Personnel::with('structure')->paginate(20);
        return view('backend.personnel.index', [
            'employes' => $employes
        ]);

    }

    public function demande()
    {
        $demandes = Demande::paginate('16');
        $validates = Demande::where('statut', 'Approuvé')->with('typedemande')->paginate(16);
        $attentes = Demande::where('statut', 'En attente')->with('personne')->paginate(16);
        $echecs = Demande::where('statut', 'Rejeté')->paginate(16);
        //dd($validates)->first();
        return view('backend.personnel.demande', [
            'demandes' => $demandes,
            'validates' => $validates,
            'attentes' => $attentes,
            'echecs' => $echecs
        ]);
    }

    public function zindex()
    {
        $structures = Structure::all()->count();
        $employes = Personnel::all()->count();
        $demandes = Demande::all()->count();
        $admin = Admin::all()->count();
        return view('backend.dashboard', [
            'structures' => $structures,
            'employes' => $employes,
            'demandes' => $demandes,
            'admin' => $admin
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ValidatePersonnelRequest $request)
    {
        $data = $request->validated();
        $structure = Structure::where('designation', $data['structure'])->first();
        Personnel::create([
            'matricule' => $data['matricule'],
            'nom' => $data['nom'],
            'prenoms' => $data['prenom'],
            'corps' => $data['corps'],
            'structures_id' => $structure->id
        ]);
        return redirect()->route('dashboard.personnel.index')->with('success', 'Nouveau personnel ajouté avec succès');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Personnel $employe)
    {
        return view('backend.personnel.edit', [
            'structures' => $structures = Structure::all(),
            'employe' => $employe
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(SearchPersonnelRequest $request)
    {
        $request->flash();
        $query = Personnel::query();

        if ($matricule = $request->validated('searchmat')){
            $query = $query->where('matricule', 'like', "%$matricule%");
        }
        if ($nom = $request->validated('searchname')){
            $query = $query->where('nom', 'like', "%$nom%");
        }
        if ($struct = $request->validated('searchstruct')){
            $structure = Structure::where('designation', $struct)->first();
            $query = $query->where('structures_id', '=', "$structure->id");
        }

        $employes = Personnel::paginate(20);
        return view('backend.personnel.index', [
            'employes' => $query->paginate(20)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personnel $employe)
    {
        return view('backend.personnel.edit', [
            'structures' => $structures = Structure::all(),
            'employe' => $employe
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidatePersonnelRequest $request, Personnel $employe)
    {
        $data = $request->validated();
        $structure = Structure::where('designation', $data['structure'])->first();
        Personnel::where('id', $employe->id)->update([
            'matricule' => $data['matricule'],
            'nom' => $data['nom'],
            'prenoms' => $data['prenom'],
            'corps' => $data['corps'],
            'structures_id' => $structure->id
        ]);
        return redirect()->route('dashboard.personnel.index')->with('success', 'La modification a été effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $personnel = Personnel::findorFail($id);
        $personnel->delete();
        return redirect()->route('dashboard.personnel.index')->with('success', 'Le personnel a parfaitement été supprimé');
    }

    public function pdf()
    {
        $personnels = Personnel::with('structure')->get(); // récupèrez tous les personnels

        $pdf = PDF::loadView('backend.pdf.listepersonnel', ['personnels' => $personnels]); // charge la vue et passe les personnels à la vue

        return $pdf->download('Liste_personnel.pdf'); // télécharge le PDF
    }
}
