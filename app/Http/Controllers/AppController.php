<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\CongeNotification;
use App\Models\TypeDemande;
use App\Models\Demande;
use App\Models\Personnel;
use App\Models\User;
use App\Models\ChefHierarchique;
use App\Http\Requests\FormCongeRequest;
use Carbon\Carbon;

class AppController extends Controller
{
    public function index()
    {
        return view('frontend.layout.accueil');
    }

    public function show()
    {
        $typeconges = TypeDemande::all();
        return view('frontend.layout.demande',[
            'typeconges' => $typeconges
        ]);
    }

    public function apropos()
    {
        //
    }

    public function create(FormCongeRequest $request)
    {
        $data = $request->validated();

        //Conversion des dates en jours et vérification
        $dd = Carbon::parse($data['start-date']);
        $df = Carbon::parse($data['end-date']);
        $periode_conge = $data['leave-period'];
        $nbr = $dd->diffInDays($df);

        $typeconge = TypeDemande::where('intitule', $data['leave-type'])->first();

        $personnel_id = Session::get('personnels_id');
        $personne = Personnel::where('id', $personnel_id)->first();
       /* $chr = ChefHierarchique::where('structures_id', $personne->structures_id)->first();
        $pers_chr = Personnel::where([
            'nom' => $chr->nom,
            'prenoms' => $chr->prenoms
        ])->first();
        $manager = User::where('personnels_id', $pers_chr->id);*/

        if($nbr != $periode_conge){
            return redirect()->back()->with('error', 'Le nombre de jours demandés n\'est pas conforme à la période qui sépare la date de début et la date de fin du congé ');
        }else{
            if($personnel_id){
                Demande::create([
                    'motif' => $data['reason'],
                    'statut' => "En attente",
                    'date_debut_conge' => $data['start-date'],
                    'date_fin_conge' => $data['end-date'],
                    'periode_conge' => $periode_conge,
                    'personnels_id' => $personnel_id,
                    'types_demandes_id' => $typeconge->id
                ]);

                $details = [
                    'nom' => $personne->nom,
                    'prenoms' => $personne->prenoms,
                    'motif' => $data['reason'],
                    'date_debut_conge' => $data['start-date'],
                    'date_fin_conge' => $data['end-date'],
                    'periode_conge' => $data['leave-period'],
                    'type_conge' => $data['leave-type']
                ];

                $user = User::where('personnels_id', $personnel_id)->first();
                $pers_mail_user = $user->email;
                Mail::to("$pers_mail_user")->send(new CongeNotification($details));

                return redirect()->route('layout.demande')->with('success', 'Nouvelle demande enregistrée avec succès.');

            }else{
                return redirect()->route('login')->withErrors('msg', 'Votre session a expiré. reconnectez vous');
            }

        }
    }
}
