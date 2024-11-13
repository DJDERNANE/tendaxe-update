@extends('layouts.adminStorePanel')

@section('title', 'Categories')

@section('content')

    <div class="container my-5 pt-5">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex">
                <h6><a href="{{ route('categories.level', ['level' => 0]) }}" class="{{ $level == 0 ? 'bold' : '' }}">Level1
                    </a></h6>
                <h6><a href="{{ route('categories.level', ['level' => 1]) }}" class="{{ $level == 1 ? 'bold' : '' }}">Level2
                    </a></h6>
                <h6><a href="{{ route('categories.level', ['level' => 2]) }}" class="{{ $level == 2 ? 'bold' : '' }}">Level3
                    </a></h6>
                <h6><a href="{{ route('categories.level', ['level' => 3]) }}" class="{{ $level == 3 ? 'bold' : '' }}">Level4
                    </a></h6>
            </div>

            <div>
                <button class="btn btn-danger rounded-3 supp-btn" id="supp-btn">X Supprimer <span
                        id="count1"></span></button>
                <button type="button" class="btn primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Ajouter
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ajouter une Category</h5>
                            </div>
                            <div class="modal-body">
                                <form class="  store-form align-items-center p-2 rounded-3" method="post"
                                    action="{{ route('categories.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Nom : </label>
                                        <input class="form-control" type="text" name="name" required>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="">Icon : </label>
                                        <input class="form-control" type="file" name="icon">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="">Photo : </label>
                                        <input class="form-control" type="file" name="picture" required>
                                    </div>
                                    @if ($level > 0)
                                        <div id="sub-categories-container-1" class="my-4 col-6">
                                            <label for="sub-cat-level-1">Categories Level 1</label>
                                            <select name="parent_id" id="sub-cat-level-1" class="sub-cat">
                                                <option value="">select parent level 1</option>
                                                @foreach ($cats1 as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($level > 1)
                                            <div id="sub-categories-container-2" class="my-4 col-6">
                                                <label for="sub-cat-level-2">Categories Level 2</label>
                                                <select name="parent_id" id="sub-cat-level-2" class="sub-cat">
                                                    <option value="">select parent level 2</option>
                                                </select>
                                            </div>
                                            @if ($level > 2)
                                                <div id="sub-categories-container-3" class="my-4 col-6">
                                                    <label for="sub-cat-level-3">Categories Level 3</label>
                                                    <select name="parent_id" id="sub-cat-level-3" class="sub-cat">
                                                        <option value="">select parent level 3</option>
                                                    </select>
                                                </div>
                                            @endif
                                        @endif
                                    @endif


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
                <form action="{{ route('categories.filter', ['level' => $level]) }}" method="post"
                    class="d-flex bg-light store-form align-items-center p-2 rounded-3">
                    @csrf
                    <input name="name" type="text" placeholder="search..." class="px-2 py-1 bg-transparent border-0 search text-black">
                    <button class="px-2 border-0  bg-transparent"><i
                            class="bi bi-search text-primary text-black fs-5 "></i></button>
                </form>
            </div>
            <div class="d-flex col-5">
                @if ($level > 0)
                    <form action="{{ route('categories.filter', ['level' => $level]) }}" method="post"
                        class="d-flex align-items-center">
                        @csrf

                        @if ($level > 0)
                            <div id="sub-categories-container-1">
                                <select name="parent_category" id="level-1" class="sub-cat">
                                    <option value="">L 1</option>
                                    @foreach ($cats1 as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($level > 1)
                                <div id="sub-categories-container-2" class="my-4 ">


                                    <select name="parent_category" id="level-2" class="sub-cat">
                                        <option value="">L 2</option>
                                    </select>
                                </div>
                                @if ($level > 2)
                                    <div id="sub-categories-container-3" class="my-4 ">

                                        <select name="parent_category" id="level-3" class="sub-cat">
                                            <option value="">L 3</option>
                                        </select>
                                    </div>
                                @endif
                            @endif
                        @endif
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                @endif
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
                    <th scope="col">Image</th>
                    <th scope="col">Position</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>
                            <input type="checkbox" name="item[]" value="{{ $category->id }}">
                        </td>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <img src="{{ asset('pictures/Category/' . $category->picture) }}" alt="category image"
                                width="50">
                        </td>
                        <td>{{ $category->position }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" target="_blanck">
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
                    url: '/admin/store/categories/delete',
                    type: 'DELETE',
                    data: JSON.stringify({
                        ids: selectedValues,
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    }),
                    contentType: 'application/json',
                    success: function(response) {
                        selectedValues.forEach(id => {
                            $('input[value="' + id + '"]').closest('tr').remove();
                        });
                        // Update the items variable
                        items = document.querySelectorAll('input[name="item[]"]');
                        logSelectedItems();
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function() {

        function loadChildren(parentId, level) {
            // Find the next level
            let nextLevel = level + 1;
            if (nextLevel > 4) return;

            // Select the next level element
            let nextSelectElement = $(`#sub-cat-level-${nextLevel}`);
            nextSelectElement.html(''); // Clear previous options

            // Perform AJAX request to load children categories
            $.ajax({
                type: 'GET',
                url: `/categories/children/${parentId}`,
                success: function(data) {
                    $.each(data, function(index, category) {
                        nextSelectElement.append('<option value="' + category.id + '">' +
                            category.name + '</option>');
                    });
                }
            });
        }

        // Attach change event handlers to each select element
        $('.sub-cat').on('change', function(e) {
            let selectedParentId = $(this).val();
            let currentLevel = parseInt(this.id.split('-').pop());

            // Clear all subsequent levels
            for (let level = currentLevel + 1; level <= 4; level++) {
                $(`#sub-cat-level-${level}`).html('');
            }

            // Load children for the next level
            if (selectedParentId) {
                loadChildren(selectedParentId, currentLevel);
            }
        });
    });
</script>


<script>
    $(document).ready(function() {

        function loadChildren(parentId, level) {
            // Find the next level
            let nextLevel = level + 1;
            if (nextLevel > 4) return;

            // Select the next level element
            let nextSelectElement = $(`#level-${nextLevel}`);
            nextSelectElement.html(''); // Clear previous options

            // Perform AJAX request to load children categories
            $.ajax({
                type: 'GET',
                url: `/categories/children/${parentId}`,
                success: function(data) {
                    $.each(data, function(index, category) {
                        nextSelectElement.append('<option value="' + category.id + '">' +
                            category.name + '</option>');
                    });
                }
            });
        }

        // Attach change event handlers to each select element
        $('.sub-cat').on('change', function(e) {
            let selectedParentId = $(this).val();
            let currentLevel = parseInt(this.id.split('-').pop());

            // Clear all subsequent levels
            for (let level = currentLevel + 1; level <= 4; level++) {
                $(`#level-${level}`).html('');
            }

            // Load children for the next level
            if (selectedParentId) {
                loadChildren(selectedParentId, currentLevel);
            }
        });
    });
</script>
