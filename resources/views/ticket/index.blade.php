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
                        @if ($ticket->statut == 'en cours')
                            <form action="#" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="statut">
                                    <option value="en_cours">En cours</option>
                                    <option value="termine">Terminé</option>
                                    <option value="rejete">Rejeté</option>
                                </select>
                                @if ($errors->has('statut'))
                                    <span class="text-danger">{{ $errors->first('statut') }}</span>
                                @endif
                                <br>
                                <label for="commentaire">Commentaire :</label>
                                <textarea name="commentaire" id="commentaire" cols="30" rows="5"></textarea>
                                @if ($errors->has('commentaire'))
                                    <span class="text-danger">{{ $errors->first('commentaire') }}</span>
                                @endif
                                <br>
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection
