<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnel;
use App\Models\SoldeConge;
use App\Models\Structure;
use App\Models\Demande;
use App\Http\Requests\SearchSoldeRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Options;

class SoldeController extends Controller
{
    public function index()
    {
        $soldes = SoldeConge::with('personnel')->paginate(20);
        return view('backend.solde.index', [
            'soldes' => $soldes
        ]);
    }

    public function show(SearchSoldeRequest $request)
    {
        $request->flash();
        $query = SoldeConge::query();

        if ($annee = $request->validated('searchannee')){
            $query = $query->where('annee', $annee);
        }
        if ($matricule = $request->validated('searchmat')){
            $query->whereHas('personnel', function ($query) use ($matricule) {
                $query->where('matricule', 'like', "%$matricule%");
            });
        }
        if ($nom = $request->validated('searchnom')){
            $query->whereHas('personnel', function ($query) use ($nom) {
                $query->where('nom', 'like', "%$nom%");
            });
        }
        if ($prenom = $request->validated('searchprenom')){
            $query->whereHas('personnel', function ($query) use ($prenom) {
                $query->where('prenoms', 'like', "%$prenom%");
            });
        }

        return view('backend.solde.index', [
            'soldes' => $query->paginate(20)
        ]);
    }

    public function  store()
    {
        $employes = Personnel::with('structure', 'soldeconges')->paginate(20);
        $annees = SoldeConge::select('annee')->distinct()->get()->pluck('annee');
        return view('backend.solde.titre', [
            'employes' => $employes,
            'annees' => $annees
        ]);
    }

    public function pdf(Request $request, Int $id)
    {
        $annee = $request['annee'];
        $infos = SoldeConge::with('personnel')->where(['annee' => $annee, 'personnels_id' => $id])->first();
        $duree = $infos->solde_initial - $infos->solde_final;


        $pdf = PDF::loadView('backend.pdf.titreconge', ['infos' => $infos, 'annee' => $annee, 'duree' => $duree])->setPaper('a4', 'portrait'); // charge la vue et passe les personnels à la vue

        return $pdf->download('TitreConge.pdf'); // télécharge le PDF
    }
}
