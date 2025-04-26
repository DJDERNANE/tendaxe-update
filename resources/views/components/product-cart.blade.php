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
        <form class='px-3 my-2' method="post" action="{{ route('cart.store') }}">
            @csrf
            <input type="hidden" value="{{ $item->id }}" name="product_id" readonly>
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
            <div class='row'>
                <button class="btn btn-primary col-12"><i class="bi bi-cart"></i> Ajouter au
                    panier</button>
            </div>
        </form>
    </div>
</div>