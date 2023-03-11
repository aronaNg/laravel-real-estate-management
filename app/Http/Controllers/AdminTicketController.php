<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
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
}
