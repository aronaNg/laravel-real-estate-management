@extends("layouts.base")

@section("content")
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Listes des biens</h3>

    <div class="mt-4">
        @if(session()->has("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert"">
        {{session()->get("success")}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>
       @endif
        <div class="d-flex justify-content-end">
            <a href="{{route('admin.create')}}" class="btn btn-success mb-4">Créer un bien</a>
        </div>
        <table class="table table-striped table-hover table-bordered"">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nom</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($biens as $bien)
                <tr>
                    <th scope="row">{{$bien->id}}</th>
                    <td>{{$bien->nom}}</td>
                    <td>
                        <a href="#" class="btn btn-info">Éditer</a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="#" class="btn btn-danger">Supprimer</a>
                    </td>
                  </tr>
                @empty
                <p>Oups! C'est épuisé.</p>
                @endforelse

            </tbody>
          </table>
          {{$biens->links()}}
    </div>
</div>

@endsection
