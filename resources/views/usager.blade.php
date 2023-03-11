@extends("layouts.base")

@section("content")
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Liste des tickets</h3>

    <div class="mt-4">
        {{--alert pour la création de ticket--}}
        @if(session()->has("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert"">
            {{session()->get("success")}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
       @endif

       {{--alert pour la cloture de ticket--}}
       @if(session()->has("successClos"))
       <div class="alert alert-success alert-dismissible fade show" role="alert"">
           {{session()->get("successClos")}}
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
      @endif

      {{--alert pour la cloture de ticket--}}
      @if(session()->has("error"))
      <div class="alert alert-danger alert-dismissible fade show" role="alert"">
          {{session()->get("error")}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
     @endif

        <div class="d-flex justify-content-start">
            <a href="{{route('usager.create')}}" class="btn btn-success mb-4">Créer un ticket</a>
        </div>
        @foreach($tickets as $ticket)
            <div class="card mb-4">
                <div class="card-header"><strong>Titre</strong> : {{ $ticket->titre }}</div>
                <div class="card-body">
                    <p>Description : {{ $ticket->description }}</p>
                    <p>Statut : {{ $ticket->statut }}</p>
                    <p>Date de saisie : {{ $ticket->date_saisie }}</p>
                </div>
                <div class="card-footer">
                    @if($ticket->statut != 'clos')
                    <form action="{{ route('usager.tickets.close', $ticket->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="commentaire" class="form-label">Commentaire</label>
                            <textarea class="form-control" id="commentaire" name="commentaire" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Clôturer</button>
                    </form>
                    @endif
                </div>
            </div>
        @endforeach


    </div>
</div>

@endsection
