<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bien;
class AdminController extends Controller
{
    public function index()
    {
        // Code pour afficher la page d'accueil des administrateurs
        $biens = Bien::orderBy("nom","asc")->paginate(3);
        return view("admin", compact("biens"));
    }

    public function create()
    {
        return view("crud.createBien");
    }

    public function store(Request $request)
    {
        // Valider les données envoyées par le formulaire
        $validatedData = $request->validate([
            'nom' => 'required|unique:biens,nom', // Le nom est requis et doit être unique dans la table 'biens'
        ]);

        // Créer un nouveau bien à partir des données validées
        $bien = Bien::create($validatedData);

        // Rediriger l'utilisateur vers la page d'accueil des biens avec un message de succès
        return back()->with('success', 'Le bien a été créé avec succès !');
    }
}
