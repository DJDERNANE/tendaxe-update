@extends('layouts.adminStorePanel')

@section('title', 'CONTACT')

@section('content')

    <div class="container my-5 pt-5">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <button class="btn btn-danger rounded-3 supp-btn" id="supp-btn">X Supprimer <span
                        id="count1"></span></button>
            </div>

        </div>

        <div class="d-flex justify-content-between align-items-center my-4 p-2 bg-white rounded-3 shadow">
            <div class="pl-5 py-1 pr-2 m-0 d-flex justify-content-between align-items-center store-navbar text-white">
                <form class="d-flex bg-light store-form align-items-center p-2 rounded-3">
                    @csrf
                    <input type="text" placeholder="search..." class="px-2 py-1 bg-transparent border-0 search">
                    <button class="px-2 border-0  bg-transparent"><i
                            class="bi bi-search text-primary text-black fs-5 "></i></button>
                </form>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">
                        <input type="checkbox" id="select-all">
                    </th>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Sujet</th>
                    <th scope="col">Voir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $item)
                    <tr>
                        <td>
                            <input type="checkbox" name="item[]" value="{{ $item->id }}">
                        </td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->subject }}</td>
                        <td>
                            <a href="{{ route('contact.show', $item->id) }}" target="_blanck">
                                <button class="btn btn-primary">
                                    <i class="bi bi-eye-fill"></i>
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
        const selectAll = document.getElementById('select-all');
        let items = document.querySelectorAll('input[name="item[]"]');
        const suppBtn = document.getElementById('supp-btn');
        const count1 = document.getElementById('count1');

        // Function to log and manage selected items
        function logSelectedItems() {
            const selectedItems = Array.from(items).filter(item => item.checked);
            if (selectedItems.length == 0) {
                suppBtn.disabled = true;
                count1.innerHTML = ""; // Clear the text or set to default text if needed
            } else {
                suppBtn.disabled = false;
                count1.innerHTML = "(" + selectedItems.length +
                    ")"; // Set the actual number or use `selectedItems.length`
            }
        }

        // Initially call to set button state
        logSelectedItems();

        // Event listener for 'elect all' checkbox
        selectAll.addEventListener('change', function() {
            items.forEach(item => {
                item.checked = selectAll.checked;
            });
            logSelectedItems();
        });

        // Event listeners for each checkbox
        items.forEach(item => {
            item.addEventListener('change', logSelectedItems);
        });

        // Handle the delete button click event
        suppBtn.addEventListener('click', function(event) {
            event.preventDefault();
            if (confirm('Are you sure you want to delete this item?')) {
                // Recompute selectedValues just before the request
                const selectedValues = Array.from(items)
                    .filter(item => item.checked)
                    .map(item => item.value);
                $.ajax({
                    url: '/admin/contact/delete',
                    type: 'DELETE',
                    data: JSON.stringify({
                        ids: selectedValues,
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    }),
                    contentType: 'application/json',
                    success: function(response) {
                        if (response.success) {
                            selectedValues.forEach(id => {
                                $('input[value="' + id + '"]').closest('tr')
                                .remove();
                            });
                            items = document.querySelectorAll('input[name="item[]"]');
                            logSelectedItems();
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
