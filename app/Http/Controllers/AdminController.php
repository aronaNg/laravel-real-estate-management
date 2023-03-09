<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Code pour afficher la page d'accueil des administrateurs
        return view('admin');
    }
}
