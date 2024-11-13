@extends('layouts.adminStorePanel')

@section('title', 'Brands')
@section('content')

<div class="container my-5 pt-5">
    <div class="d-flex justify-content-between align-items-center">
        <h6 class="active">Marques</h6>
        <div>
            <button class="btn btn-danger rounded-3 supp-btn" disabled id="supp-btn">X Supprimer <span id="count1"></span></button>
            <button type="button" class="btn primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Ajouter
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter une Marque</h5>
                        </div>
                        <div class="modal-body">
                            <form class="store-form align-items-center p-2 rounded-3" method="post" action="{{ route('brands.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Nom : </label>
                                    <input class="form-control" type="text" name="name" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="">Photo : </label>
                                    <input class="form-control" type="file" name="picture">
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="d-flex justify-content-between align-items-center my-4 p-2 bg-white rounded-3 shadow">
        <div class="pl-5 py-1 pr-2 m-0 d-flex justify-content-between align-items-center store-navbar text-white">
            <form method="GET" action=""{{route('brands.all')}}" class="d-flex bg-light store-form align-items-center p-2 rounded-3">
                @csrf
                <input name="name" type="text" placeholder="search..." class="px-2 py-1 bg-transparent border-0 search text-black">
                <button class="px-2 border-0 bg-transparent"><i class="bi bi-search text-primary text-black fs-5"></i></button>
            </form>
        </div>
    </div>

    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col"><input type="checkbox" name="all" id="select-all"></th>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Image</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cats as $item)
            <tr>
                <td><input type="checkbox" name="item[]" value="{{ $item->id }}"></td>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->name }}</td>
                <td><img class="col-3 mx-auto shadow-sm bg-white" width="50" height="50" src="{{ asset('pictures/Brands/' . $item->picture) }}" alt="image"></td>
                <td>
                    <a href="{{ route('brands.edit', $item->id) }}" target="_blank">
                        <button class="btn btn-primary">
                            <i class="bi bi-pencil-square"></i>
                        </button>    
                    </a>    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectAll = document.querySelector('#select-all');
        const items = document.querySelectorAll('input[name="item[]"]');
        const suppBtn = document.getElementById('supp-btn');

        function logSelectedItems() {
            const selectedItems = Array.from(items).filter(item => item.checked);
            const count1 = document.getElementById('count1');
            if (selectedItems.length === 0) {
                suppBtn.disabled = true;
                count1.innerHTML = "";
            } else {
                suppBtn.disabled = false;
                count1.innerHTML = `(${selectedItems.length})`;
            }
        }

        logSelectedItems();

        selectAll.addEventListener('change', function() {
            items.forEach(item => {
                item.checked = selectAll.checked;
            });
            logSelectedItems();
        });

        items.forEach(item => {
            item.addEventListener('change', logSelectedItems);
        });

        $('.supp-btn').click(function(event) {
            event.preventDefault();

            if (confirm('Are you sure you want to delete this item?')) {
                const selectedValues = Array.from(items)
                                           .filter(item => item.checked)
                                           .map(item => item.value);

                console.log(selectedValues);

                $.ajax({
                    url: '/admin/store/brands/delete',
                    type: 'DELETE',
                    data: JSON.stringify({
                        ids: selectedValues,
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    }),
                    contentType: 'application/json',
                    success: function(response) {
                        console.log('res: ' + response);
                        selectedValues.forEach(id => {
                            $('input[value="' + id + '"]').closest('tr').remove();
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
