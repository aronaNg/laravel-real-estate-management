@extends("layouts.base")

@section("content")
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Listes des biens</h3>

    <div class="mt-4">
        <div class="d-flex justify-content-end">
            <a href="#" class="btn btn-success mb-4">Créer un bien</a>
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
              <tr>
                <th scope="row">1</th>
                <td>Meuble</td>
                <td>
                    <a href="#" class="btn btn-info">Éditer</a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="#" class="btn btn-danger">Supprimer</a>
                </td>
              </tr>

            </tbody>
          </table>
    </div>
</div>

@endsection
