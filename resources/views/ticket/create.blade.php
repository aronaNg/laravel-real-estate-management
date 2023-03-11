@extends("layouts.base")

@section("content")
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Ajout d'un nouveau bien</h3>

    <div class="mt-4">

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form method="POST" action="{{route('usager.store')}}">
            @csrf
            <div class="mb-3">
                <label for="titre" class="form-label">Titre :</label>
                <input type="text" class="form-control" id="titre" name="titre" required>

                <label for="description" class="form-label">Description :</label>
                <textarea id="description" class="form-control" name="description" required></textarea>

                <label for="nom_usager" class="form-label">Nom de l'usager :</label>
                <input type="text" class="form-control" id="nom_usager" name="nom_usager" required>

                <label for="email_usager" class="form-label">Email de l'usager :</label>
                <input type="email" class="form-control" id="email_usager" name="email_usager" required>

                <label for="bien" class="form-label">Liste des biens :</label>
                <select class="form-control" name="id_biens">
                    @foreach ($biens as $bien)
                    <option value="{{$bien->id}}">{{$bien->nom}}</option>
                    @endforeach
                </select>
          </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{route('usager')}}" class="btn btn-danger">Annuler</a>
        </form>
    </div>

@endsection
