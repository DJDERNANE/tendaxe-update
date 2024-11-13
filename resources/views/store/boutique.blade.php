@extends('layouts.storelayout')
@section('title', 'Store')
@section('content')

    <div class="mt-5 pt-5  mx-auto row ">
        <div class="container mt-4">
            <div class='row'>
                <div class='col-12'>
                    <div class="boutique-account shadow rounded">
                        <img src="{{ asset('pictures/storeCovera/' . $store->cover) }}" alt="profile">
                        <div class="boutique-info">
                           
                            <div>
                                <div class="logoStore">
                                    <img  src="{{ asset('pictures/storeLogos/' . $store->logo) }}" alt="profile">
                                </div>
                                <div class="storeName">
                                    <p>{{$store->storeName}}</p>
                                </div>
                                
                            </div>
                            <div>
                                N produit : <b>{{$store->products->count()}}</b>
                                {{-- <a href="{{ route('store.marques')}}">
                                    <button class="btn btn-primary ml-3 ">Voir Tous</button>
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class='container'>
               
                <div class="row row-cols-2 row-cols-md-4 row-cols-lg-5 row-cols-xl-6">
                    @foreach ($store->products as $item)
                        <div class="col">
                            <div class="card product-box">
                                @if ($item->discount > 0)
                                    <p class='discount'>{{ $item->discount }}%</p>
                                @endif
                                <a href="{{route('store.product.details', $item->id)}}">
                                    <img class="mx-auto py-2" src="{{asset('pictures/Products/'.$item->picture)}}"
                                        alt="Card image cap">
                                </a>
                                <div class="p-2 desc">
                                    <a href="{{route('store.product.details', $item->id)}}">
                                        <p class="product-name">{{$item->desc}}</p>
                                    </a>
                                    <p class="marque"><span>Marque</span><a href="" class="marque-link">{{$item->brand->name ?? 'no brand'}}</a>
                                    </p>
    
                                    <p class="price">
                                        <span class="new-price">{{ $item->price }} DA</span>
                                    </p>
                                    <form id="add-to-cart-form-{{ $item->id }}" method="post"
                                        action="{{ route('cart.store') }}">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                        <div class="qte-products">
                                            <span>Qte :</span>
                                            <div class="qte-products-control">
                                                <button type="button" class="text-center"
                                                    onclick="changeQty(this, -1)">-</button>
                                                <input class="text-center" id="qty-{{ $item->id }}" min="1"
                                                    value="1" type="number" name="qte">
                                                <button type="button" class="text-center"
                                                    onclick="changeQty(this, 1)">+</button>
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
                    @endforeach
    
                </div>
              
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
