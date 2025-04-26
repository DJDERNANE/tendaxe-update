@extends('layouts.storelayout')

@section('title', 'Marques')
@section('styling')

@endsection
@section('content')
    <div class="mt-5 pt-5 container">
        <div class="mt-5">
            <img width="300" height="100" src="{{ asset('pictures/Brands/' . $brand->picture) }}"
            alt="marque">
            <p class="mt-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lobortis in nibh massa eget. Lorem velit, commodo
                vitae nulla sed volutpat rhoncus sed.
            </p>
        </div>
        <div class=" nos-marques">
            <p class="title font-weight-bold mt-5">List des produits “{{$brand->name}}”</p>
            <div class='products  my-4'>
                @foreach ($products as $item)
                    <div>
                        <div class="card">
                            @if ($item->discount > 0)
                                <p class='promo'>promo {{ $item->discount }}%</p>
                            @endif
                            <a href="{{ route('store.product.details', $item->id) }}">
                                <img class='mx-auto py-2'
                                    src="{{ asset('pictures/Products/' . $item->picture) }}"alt="Card image cap">
                            </a>
                            <div class="p-2 desc">
                                <a href="{{ route('store.product.details', $item->id) }}">
                                    <p class="font-weight-bold mb-1">{{ $item->name }}</p>
                                </a>

                                <p class="marque mb-1"><span>Marque </span>{{ $item->category->name }}</p>
                                <div>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    (24)
                                </div>
                                <p class="font-weight-bold mb-1">{{ $item->price }} DA</p>
                                <form id="add-to-cart-form-{{ $product->id }}" method="post"
                                    action="{{ route('cart.store') }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="qte-products">
                                        <span>Qte :</span>
                                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 10px;">
                                            <div class="qte-products-control">
                                                <button type="button" class="text-center"
                                                    onclick="changeQty(this, -1)">-</button>
                                                <input class="text-center" id="qty-{{ $item->id }}" min="1"
                                                    value="1" type="number" name="qte">
                                                <button type="button" class="text-center"
                                                    onclick="changeQty(this, 1)">+</button>
                                            </div>
                                            <div>
                                                <p style="font-weight: 600">{{ $item->unit }}</p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="add-to-cart">
                                        <button class="btn btn-primary" type="submit"><i class="bi bi-cart"></i> Ajouter
                                            au panier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </a>
                @endforeach


            </div>
        </div>

    </div>

@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('form[id^="add-to-cart-form"]').on('submit', function(event) {
            event.preventDefault();

            var form = $(this);
            var formData = form.serialize();

            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: formData,
                success: function(response) {
                    // Update the cart total price in the UI
                    $('.cart-price').html(response.cartTotal.toFixed(2) +
                        ' <span>DZD</span>'); // Update cart price

                    // Optionally display a success message
                    alert(response.message);
                },
                error: function(response) {
                    alert('Something went wrong. Please try again.');
                }
            });
        });
    });
</script>
@endsection