@extends('layouts/base')

@section('content')
    <div class="container">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Tous les tickets</h3>
        <div class="card-columns">
            @foreach ($tickets as $ticket)
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title">Titre : {{ $ticket->titre }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Description : {{ $ticket->description }}</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">ID : {{ $ticket->id }}</li>
                            <li class="list-group-item">Nom usager : {{ $ticket->nom_usager }}</li>
                            <li class="list-group-item">Email usager : {{ $ticket->email_usager }}</li>
                            <li class="list-group-item">Date saisie : {{ $ticket->date_saisie }}</li>
                            <li class="list-group-item">Statut : {{ $ticket->statut }}</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">Voir</a>
                        <a href="#" class="btn btn-secondary">Modifier</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection
