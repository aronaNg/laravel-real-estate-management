<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Commentaires;
use Illuminate\Http\Request;

class AdminTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function afficher()
    {
        $tickets = Ticket::all();
        return view('ticket.index', compact('tickets'));
    }

    /**
     * Met à jour le statut d'un ticket.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $tickEdit=$ticket->titre;

        $request->validate([
            'statut' => 'required|in:nouveau,en cours,terminé,rejeté',
            'commentaire' => 'nullable|string',
        ]);

        $ticket->statut = $request->input('statut');

        if ($ticket->statut == 'rejeté') {
            $ticket->commentaire = $request->input('commentaire');
        } else {
            $ticket->commentaire = null;
        }

        $ticket->save();

        return redirect()->back()->with('success', 'Le statut du ticket '.$tickEdit.' a été mis à jour.');
    }
}
