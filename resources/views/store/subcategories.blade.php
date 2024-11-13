@extends('layouts.storelayout')

@section('title', 'Acceuil')


@section('styling')
    <link rel="stylesheet" href="{{ asset('css/store-edit.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
@endsection
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

        <div class="mt-5">
            <section class="store-catego-products">
                <div class="container-fluid">
                    <div class="row">
                        <div class="d-none d-lg-block col-lg-3">
                            <div class="catego-sidebar">
                                <h4 class="catego-sidebar-head">
                                    <svg width="17" height="18" viewBox="0 0 17 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="1.00024" y="1" width="15" height="3" rx="1.5" fill="#11A3AB" />
                                        <rect x="1.00024" y="7" width="15" height="3" rx="1.5" fill="#11A3AB" />
                                        <rect x="1.00024" y="13" width="15" height="3" rx="1.5" fill="#11A3AB" />
                                    </svg>
                                    <span>Categories</span>
                                </h4>
                                <div class="accordion" id="accordionCategoSidebar">
                                    @foreach ($mainCats as $category)
                                        @php
                                            $accordionId = 'categoItemCollapse' . $loop->index;
                                            $headerId = 'catego-item-header-' . $loop->index;
                                        @endphp
                                        <div class="accordion-item">
                                            <h2 class="accordion-header catego-item" id="{{ $headerId }}">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#{{ $accordionId }}" aria-expanded="true"
                                                    aria-controls="{{ $accordionId }}">
                                                    <img src="https://tendaxe.com/img/icons/two_hands.png" class="catego-icon">
                                                    {{ $category->name }}
                                                </button>
                                            </h2>
                                            <div id="{{ $accordionId }}" class="accordion-collapse collapse"
                                                aria-labelledby="{{ $headerId }}">
                                                <div class="accordion-body">
                                                    <ul class="list-unstyled sub-catego-list">
                                                        @foreach ($category->children as $item)
                                                            <li>
                                                                <a href="{{route('category.childs', $item->id)}}" class="sub-catego-link">{{ $item->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-12 col-lg-9">
                            <div class='row'>
                                <div class='col-12 col-md-9'>
                                    <div id="carouselBanner" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach ($pubs as $index => $item)
                                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                    <img src="{{ asset('pictures/Pubs/' . $item->picture) }}"
                                                        class="d-block w-100 banner-img" alt="banner-image">
                                                </div>
                                            @endforeach
                                        </div>
        
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanner"
                                            data-bs-slide="prev">
                                            <i class="bi bi-chevron-left"></i>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselBanner"
                                            data-bs-slide="next">
                                            <i class="bi bi-chevron-right"></i>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                                <div class='col-0 col-md-3 d-md-flex flex-md-column d-none justify-content-between characteristic'>
                                    <div class='d-flex align-items-center font-weight-bold p-2'>
                                        <i class="bi bi-truck mr-2 text-primary"></i>LIVRAISON GRATUITE
                                    </div>
                                    <div class='d-flex align-items-center font-weight-bold p-2'>
                                        <i class="bi bi-ui-radios-grid mr-2 text-primary"></i>DIVERSITÉ DES PRODIUITS
                                    </div>
                                    <div class='d-flex align-items-center font-weight-bold p-2'>
                                        <i class="bi bi-person-raised-hand mr-2 text-primary"></i>Livraison aux choix
                                    </div>
                                </div>
                            </div>
                            <div class="store-catego-products-grid">
                                <nav class="breadcrumb-nav" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#">page accuiel</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#">sous page</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">page courrante</li>
                                    </ol>
                                </nav>
                                <div class="row">
                                    @foreach ($cats as $item)
                                        <div class="col-6 col-sm-4 col-lg-4 col-xl-3">
                                            <a href="{{route('category.childs', $item->id)}}">
                                                <div class="box-catego">
                                                    <img src="{{ asset('pictures/Category/' . $item->picture) }}" alt="category">
                                                    <h6 class="catego-name">
                                                        {{$item->name}}
                                                    </h6>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
        
                                </div>
                                <nav aria-label="Page navigation" class="pagination-nav">
                                    {{ $cats->links() }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        
            <!-- end section : store-catego-products -->
        
                <!-- start section : popular-products -->

    <section class="popular-products">
        <div class="container">
            <h2 class="popular-products-title section-title"><span>Produits fréquents</span></h2>
            <div class="row row-cols-2 row-cols-md-4 row-cols-lg-5 row-cols-xl-6">
                @foreach ($products as $item)
                <div class="col">
                    <div class="card product-box">
                        @if ($item->discount > 0)
                            <span class="discount"> - {{ $item->discount }} %</span>
                        @endif

                        <a href="{{ route('store.product.details', $item->id) }}">
                            <img class="mx-auto py-2" src="{{ asset('pictures/Products/' . $item->picture) }}"
                                alt="Card image cap">
                        </a>
                        <div class="p-2 desc">
                            <a href="{{ route('store.product.details', $item->id) }}">
                                <p class="product-name">{{ Str::limit($item->name,40) }}</p>
                            </a>
                            <p class="marque"><span>Marque : </span><a href=""
                                    class="marque-link">{{ $item->brand->name ?? '' }}</a></p>

                            <p class="price">
                                <span class="new-price">
                                    {!! $item->price ? $item->price . ' DA' : "<span class='marque'><span class='marque-link'>Prix : non mentionné </span> </span>" !!}
                                </span>
                                @if ($item->price && $item->discount > 0 )
                                    <span class="old-price">
                                        {{ $item->price - ($item->price * $item->discount / 100)}}
                                    </span>
                                @endif
                                
                            </p>
                            <form class="" method="post" action="{{ route('cart.store') }}">
                                <input type="hidden" name="_token"
                                    value="46tVeOiUpJB8tkpZ4GWApD8CqAgQOKmlArHuS6iA">
                                <input type="hidden" value="14" name="product_id" readonly="">
                                <div class="qte-products">
                                    <span>Qte :</span>
                                    <div class="qte-products-control">
                                        <button class="text-center" onclick="minQty(event)">-</button>
                                        <input class="text-center" id="qty" min="1" max=""
                                            value="1" type="number" name="qte">
                                        <button class="text-center" onclick="addQty(event)">+</button>
                                    </div>
                                </div>
                                <div class="add-to-cart">
                                    <button class="btn btn-primary" type="submit"><i class="bi bi-cart"></i> Ajouter au
                                        panier</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            </div>
            <a href="{{ route('showproducts') }}" class="view-more">
                <span>voir plus</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- end section : popular-products -->

        
        
            <div class="mx-md-5 mx-0 row bg-white my-5 features">
                <div class="item col-6 col-md-4 col-lg-2 text-center p-4">
                    <i class="bi bi-truck text-primary font-weight-bold"></i>
                    <p class="font-weight-bold fs-6 text-center mb-1">Livraison au choix</p>
                    <p class="text-black-50 font-weight-normal" style="font-size: 12px">Domicile, Point relais, Retrait au Dépöt
                    </p>
                </div>
                <div class="item col-6 col-md-4 col-lg-2 text-center p-4">
                    <i class="bi bi-box text-primary font-weight-bold"></i>
                    <p class="font-weight-bold text-center mb-1">Retour Facilité</p>
                    <p class="text-black-50 font-weight-normal" style="font-size: 12px">14 jours pour changer davis
                        30 jours pour les Pros</p>
                </div>
                <div class="item col-6 col-md-4 col-lg-2 text-center p-4">
                    <i class="bi bi-credit-card-2-back-fill text-primary font-weight-bold"></i>
                    <p class="font-weight-bold text-center mb-1">Paiement sécurisé</p>
                    <p class="text-black-50 font-weight-normal" style="font-size: 12px">Paiement par cheque ou à livraison,
                        virement bancaire</p>
                </div>
                <div class="item col-6 col-md-4 col-lg-2 text-center p-4">
                    <i class="bi bi-person-raised-hand text-primary font-weight-bold"></i>
                    <p class="font-weight-bold text-center mb-1">Livraison aux choix</p>
                    <p class="text-black-50 font-weight-normal" style="font-size: 12px">En une ou plusieurs fois</p>
                </div>
                <div class="item col-6 col-md-4 col-lg-2 text-center p-4">
                    <i class="bi bi-boxes text-primary font-weight-bold"></i>
                    <p class="font-weight-bold text-center mb-1">Plus de 50 000 produits</p>
                    <p class="text-black-50 font-weight-normal" style="font-size: 12px">Répartis dans 14 univers du
                        bricolage</p>
                </div>
                <div class="item col-6 col-md-4 col-lg-2 text-center p-4">
                    <i class="bi bi-boxes text-primary font-weight-bold"></i>
                    <p class="font-weight-bold text-center mb-1">+600 marques Pro</p>
                    <p class="text-black-50 font-weight-normal" style="font-size: 12px">Sélectionnées avec soin et
                        toujours au meilleur prix</p>
                </div>
            </div>
         
        </div>

    


@endsection

@section('scripts')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
@endsection
