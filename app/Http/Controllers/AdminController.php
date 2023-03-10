<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bien;
class AdminController extends Controller
{
    public function index()
    {
        // Code pour afficher la page d'accueil des administrateurs
        $biens = Bien::orderBy("nom","asc")->paginate(5);
        return view("admin", compact("biens"));
    }

    //création de bien
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
        Bien::create($validatedData);

        // Rediriger l'utilisateur vers la page des biens avec un message de succès
        return redirect()->route('admin')->with("success", "Le bien a été créé avec succès !");
    }

      //édition de bien
    public function edit(Bien $bien)
    {
        return view("crud.editBien",compact("bien"));
    }

    public function update(Request $request, Bien $bien)
    {
        $bienEdit=$bien->nom;
        $validatedData = $request->validate([
            'nom' => 'required|unique:biens,nom',
        ]);

        $bien->update($validatedData);

        return redirect()->route('admin')->with("success", "Le bien  $bienEdit a été modifié avec succès !");
    }

    //suppression de bien
    //injection de dépendance
      public function delete(Bien $bien)
    {
        $bienSupp=$bien->nom;
        $bien->delete();
        return redirect()->route('admin')->with("message", "Le bien $bienSupp a été supprimé avec succès !");
    }
}
