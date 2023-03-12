<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Bien;
use App\Models\Commentaires;

use Illuminate\Http\Request;

class UsagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::orderBy('date_saisie', 'desc')->get();
        $tick = Ticket::with('commentaires')->get();
        return view("usager", compact("tickets","tick"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $biens=Bien::all();
        return view('ticket.create',compact("biens"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données envoyées par le formulaire
        $validatedData = $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'nom_usager' => 'required',
            'email_usager' => 'required|email',
            'id_biens'=>'required',
        ]);

          // Créer un nouveau ticket avec les données validées et enregistrer dans la base de données
        Ticket::create([
            'titre' => $validatedData['titre'],
            'description' => $validatedData['description'],
            'nom_usager' => $validatedData['nom_usager'],
            'email_usager' => $validatedData['email_usager'],
            'id_biens' => $validatedData['id_biens'],
            'date_saisie' => now(),
            'statut' => 'nouveau',
        ]);

        // Rediriger vers la page d'accueil avec un message de confirmation
        return redirect()->route('usager')->with('success', 'Le ticket a été créé avec succès.');
    }

    // cloturer un ticket
    public function close(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);

        // Vérifier si le ticket est déjà clos
        if ($ticket->statut == 'clos') {
            return redirect()->back()->with('error', 'Ce ticket est déjà clos.');
        }

        // Vérifier si un commentaire a été saisi
        $request->validate([
            'commentaire' => 'required'
        ]);
        // Mettre à jour les colonnes

        $ticket->statut = 'clos';
        $commentaire = new Commentaires();
        $commentaire->ticket_id = $ticket->id;
        $commentaire->nom = $request->input('nom_usager');
        $commentaire->commentaire = $request->input('commentaire');
        $commentaire->save();

        $ticket->date_statut = now();
        $ticket->save();

        return redirect()->back()->with('successClos', 'Le ticket a été fermé avec succès.');
    }

}
