@extends("layouts.base")

@section("content")
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Listes des tickets</h3>

    <div class="mt-4">
        {{--alert pour la création de ticket--}}
        @if(session()->has("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert"">
            {{session()->get("success")}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
       @endif

        <div class="d-flex justify-content-start">
            <a href="{{route('usager.create')}}" class="btn btn-success mb-4">Créer un ticket</a>
        </div>
        @foreach($tickets as $ticket)
            <div class="card mb-4">
                <div class="card-header">{{ $ticket->titre }}</div>
                <div class="card-body">
                    <p>{{ $ticket->description }}</p>
                    <p>Statut: {{ $ticket->statut }}</p>
                    <p>Date de saisie: {{ $ticket->date_saisie }}</p>
                </div>
            </div>
        @endforeach


    </div>
</div>

@endsection
