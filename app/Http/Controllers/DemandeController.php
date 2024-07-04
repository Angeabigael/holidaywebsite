<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RequestManageMail;
use App\Models\Demande;
use App\Models\User;
use App\Models\TypeDemande;
use App\Models\Structure;
use App\Models\SoldeConge;
use App\Models\Personnel;
use App\Http\Requests\SearchTypeCongeRequest;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Demande $demande)
    {
        return view('backend.demande.infos', [
            'demande' => $demande
        ]);
    }

    public function store(Demande $validate)
    {
        return view('backend.demande.edit',[
            'validate' => $validate
        ]);
    }

    public function edit(Demande $validate)
    {
        $search_validate = Demande::where('id',"$validate->id")->update([
            'statut' => 'Rejeté'
        ]);
        return redirect()->route('dashboard.personnel.demande')->with('success', 'Modification effectuée avec succès');
    }

    public function show(Demande $attente)
    {
        return view('backend.demande.show', [
            'attente' => $attente
        ]);
    }

    public function rejet(Demande $attente)
    {
        $search_attente = Demande::where('id',"$attente->id")->update([
            'statut' => 'Rejeté'
        ]);

        $typeconge = TypeDemande::where('id', $attente->types_demandes_id)->first();
        $structure = Structure::where('id', $attente->personnels_id)->first();
        $user = User::where('personnels_id', $attente->personne->id)->first();
        $mail = $user->email;

        $details = [
            'nom' => $attente->personne->nom,
            'prenoms' => $attente->personne->prenoms,
            'structure' => $structure->designation,
            'statut' => 'Rejeté',
            'date_debut_conge' => $attente->date_debut_conge,
            'date_fin_conge' => $attente->date_fin_conge,
            'type_conge' => $typeconge->intitule
        ];

        Mail::to("$mail")->send(new RequestManageMail($details));

        return redirect()->route('dashboard.personnel.demande')->with('success', 'Modification effectuée avec succès');
    }

    public function update(Demande $attente)
    {
        $search_attente = Demande::where('id',"$attente->id")->update([
            'statut' => 'Approuvé'
        ]);

        $typeconge = TypeDemande::where('id', $attente->types_demandes_id)->first();
        $structure = Structure::where('id', $attente->personnels_id)->first();
        $user = User::where('personnels_id', $attente->personne->id)->first();
        $mail = $user->email;


        $id = $attente->personne->id;
        $solde_attente = SoldeConge::where([
            'personnels_id' => "$id",
            'annee' => now()->year
        ])->first();

        $solde_attente_approbation = SoldeConge::where([
            'personnels_id' => "$id",
            'annee' => now()->year
        ])->update([
            'solde_final' => $solde_attente['solde_initial'] - $attente->periode_conge
        ]);

        $details = [
            'nom' => $attente->personne->nom,
            'prenoms' => $attente->personne->prenoms,
            'structure' => $structure->designation,
            'statut' => $attente->statut,
            'date_debut_conge' => $attente->date_debut_conge,
            'date_fin_conge' => $attente->date_fin_conge,
            'type_conge' => $typeconge->intitule
        ];

        Mail::to("$mail")->send(new RequestManageMail($details));

        return redirect()->route('dashboard.personnel.demande')->with('success', 'Modification effectuée avec succès');
    }

    public function echec(Demande $echec)
    {
        return view('backend.demande.rejet',[
            'echec' => $echec
        ]);
    }


    public function review(Demande $echec)
    {
        $search_echec = Demande::where('id',"$echec->id")->update([
            'statut' => 'Approuvé'
        ]);
        return redirect()->route('dashboard.personnel.demande')->with('success', 'Modification effectuée avec succès');
    }


    public function search(SearchTypeCongeRequest $request)
    {

        $request->flash();
        $query = Demande::query();
        $query_validates = Demande::query()->where('statut', 'Approuvé');
        $query_attentes = Demande::query()->where('statut', 'En attente');
        $query_echecs = Demande::query()->where('statut', 'Rejeté');

        if ($type = $request->validated('searchtype')){
            $query->whereHas('typedemande', function ($query) use ($type) {
                $query->where('intitule', 'like', "%$type%");
            });
            $query_validates->whereHas('typedemande', function ($query_validates) use ($type) {
                $query_validates->where('intitule', 'like', "%$type%");
            });
            $query_attentes->whereHas('typedemande', function ($query_attentes) use ($type) {
                $query_attentes->where('intitule', 'like', "%$type%");
            });
            $query_echecs->whereHas('typedemande', function ($query_echecs) use ($type) {
                $query_echecs->where('intitule', 'like', "%$type%");
            });
        }
        if ($nom = $request->validated('searchnom')){
            $query->whereHas('personne', function ($query) use ($nom) {
                $query->where('nom', 'like', "%$nom%");
            });
            $query_validates->whereHas('personne', function ($query_validates) use ($nom) {
                $query_validates->where('nom', 'like', "%$nom%");
            });
            $query_attentes->whereHas('personne', function ($query_attentes) use ($nom) {
                $query_attentes->where('nom', 'like', "%$nom%");
            });
            $query_echecs->whereHas('personne', function ($query_echecs) use ($nom) {
                $query_echecs->where('nom', 'like', "%$nom%");
            });
        }
        if ($prenom = $request->validated('searchprenom')){
            $query->whereHas('personne', function ($query) use ($prenom) {
                $query->where('prenoms', 'like', "%$prenom%");
            });
            $query_validates->whereHas('personne', function ($query_validates) use ($prenom) {
                $query_validates->where('prenoms', 'like', "%$prenom%");
            });
            $query_attentes->whereHas('personne', function ($query_attentes) use ($prenom) {
                $query_attentes->where('prenoms', 'like', "%$prenom%");
            });
            $query_echecs->whereHas('personne', function ($query_echecs) use ($prenom) {
                $query_echecs->where('prenoms', 'like', "%$prenom%");
            });
        }



        return view('backend.personnel.demande', [
            'demandes' => $query->paginate(16),
            'validates' => $query_validates->paginate(16),
            'attentes' => $query_attentes->paginate(16),
            'echecs' => $query_echecs->paginate(16)
        ]);
    }
}
