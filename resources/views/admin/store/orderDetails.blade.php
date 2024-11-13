@extends('layouts.adminStorePanel')

@section('title', 'Order Details')
@section('content')
    <div class="container my-5 pt-5">
        <div class="d-flex justify-content-between mt-2">
            <h6>Order Detaild</h6>
            <button class="btn btn-success rounded-3 supp-btn" disabled id="supp-btn">Accepter <span
                    id="count1"></span></button>
        </div>

        <div class="order mt-4 p-3 bg-white">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><input type="checkbox" name="all" id="select-all"></th>
                        <th scope="col">Fournisseur</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItems as $item)
                        <tr>
                            @if (!$item->active)
                                <td><input type="checkbox" name="item[]" value="{{ $item->id }}"></td>
                            @else
                                <td></td>
                            @endif
                               

                            <td>
                                {{ $item->store->storeName }} <br>
                                <b>{{ $item->store->user->email }}</b> <br>
                                <b>{{ $item->store->user->phone }}</b>
                            </td>
                            <td>
                                <img class='mx-auto py-2' width="80" height="80"
                                    src="{{ asset('pictures/Products/' . $item->product->picture) }}"alt="Card image cap">
                                {{ $item->product->name }}
                            </td>
                            <td>{{ $item->price }} DA</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price * $item->quantity }} DA</td>
                            <td>{{ $item->active ? 'Accepter' : 'En Attente' }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAll = document.querySelector('#select-all');
            const items = document.querySelectorAll('input[name="item[]"]');
            const suppBtn = document.getElementById('supp-btn');


            // Function to log and manage selected items
            function logSelectedItems() {
                const selectedItems = Array.from(items).filter(item => item.checked);
                const count1 = document.getElementById('count1');
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

            // Event listener for 'select all' checkbox
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
            $('.supp-btn').click(function(event) {
                event.preventDefault();
                if (confirm('Are you sure you want to Accept this item?')) {
                    // Recompute selectedValues just before the request
                    const selectedValues = Array.from(items)
                        .filter(item => item.checked)
                        .map(item => item.value);
                    console.log(selectedValues)
                    $.ajax({
                        url: '/admin/store/orders/accept',
                        type: 'POST',
                        data: JSON.stringify({
                            ids: selectedValues,
                            '_token': $('meta[name="csrf-token"]').attr('content')
                        }),
                        contentType: 'application/json',
                        success: function(response) {
                            console.log('res : ' + response);
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

@endsection
