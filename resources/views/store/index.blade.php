@extends('layouts.storelayout')

@section('title', 'Acceuil')


@section('styling')
    <link rel="stylesheet" href="{{ asset('css/store-edit.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
@endsection

@section('navbtm')
    <div class="nav-bottom">
        <div class="categories-search-wrapper">
            <div class="dropdown categories-dropdown" id="dropdown">
                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    toutes catégories
                </button>
                <ul class="dropdown-menu">
                    <div class="accordion" id="accordionCategoNavbar">
                        @foreach ($cats as $category)
                            @php
                                $accordionId = 'categoItemCollapse' . $loop->index;
                                $headerId = 'catego-item-header-' . $loop->index;
                            @endphp
                            <div class="accordion-item">
                                <h2 class="accordion-header catego-item" id="{{ $headerId }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-toggle="collapse" data-bs-target="#{{ $accordionId }}" aria-expanded="true"
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
                                                    <a href="{{ route('category.childs', $item->id) }}"
                                                        class="sub-catego-link">{{ $item->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </ul>
            </div>
            <form class="d-flex bg-white store-form align-items-center">
                <input type="text" placeholder="Recherche..." class="px-2">
                <button class="px-2"><i class="bi bi-search text-primary "></i></button>
            </form>
        </div>
    </div>
@endsection
@section('content')
    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
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



    <section class="store-catego-products">
        <div class="container-fluid">
            <div class="row">

                <div class="d-none d-lg-block col-lg-3" id="mobile_filter">
                    <div class=" h-[200px] bg-white d-flex align-items-center justify-content-center border-bottom pb-4">
                        <h4 class="text-center bold">Filtres</h4>
                    </div>
                    
                    <form class="bg-white p-2 border rounded mt-2" method="GET" action="{{ route('search') }}">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control bg-light" style="font-size: small"
                                placeholder="Mot clé" name="keyword" value="{{ old('keyword') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-primary" type="button" id="button-addon2">
                                    <img src="{{ asset('img/icons/search2.png') }}" alt="">
                                </button>
                            </div>
                        </div>



                        <select class="form-control mb-2 selectpicker"  name="cats[]"
                            title="Categories" multiple data-live-search="false">
                            @foreach ($cats as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>


                        <select class="form-control mb-2 selectpicker"  name="sub_cats[]"
                            title="Sous Categories" multiple data-live-search="false">
                            @foreach ($cats as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>

                        <select class="form-control mb-2 selectpicker" name="brands[]"
                            title="Marques" multiple data-live-search="false">
                            @foreach ($brands as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>


                    

                        <button type="submit" class="btn btn-primary w-100">Rechercher</button>

                    </form>
                    <hr>
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
                                <i class="bi bi-truck mr-2 text-primary"></i>Livraison au choix
                            </div>
                            <div class='d-flex align-items-center font-weight-bold p-2'>
                                <i class="bi bi-ui-radios-grid mr-2 text-primary"></i>Diversité de produits
                            </div>
                            <div class='d-flex align-items-center font-weight-bold p-2'>
                                <i class="bi bi-person-raised-hand mr-2 text-primary"></i>Support en ligne
                            </div>
                        </div>
                    </div>
                    <div class="store-catego-products-grid">

                        <nav class="breadcrumb-nav" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/store') }}">Store</a></li>
                                @if (isset($breadcrumb))
                                    @foreach ($breadcrumb as $item)
                                        <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">

                                        </li>
                                    @endforeach
                                @endif
                            </ol>
                        </nav>

                        <div class="row">
                            @foreach ($cats as $item)
                                <div class="col-6 col-sm-4 col-lg-4 col-xl-3">
                                    <a href="{{ route('category.childs', $item->id) }}">
                                        <div class="box-catego">
                                            <img src="{{ asset('pictures/Category/' . $item->picture) }}" alt="category">
                                            <h6 class="catego-name">
                                                {{ $item->name }}
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
                @foreach ($products as $product)
                    <div class="col">
                        <div class="card product-box">
                            @if ($product->discount > 0)
                                <span class="discount"> - {{ $product->discount }} %</span>
                            @endif
                            <a href="{{ route('store.product.details', $product->id) }}">
                                <img class="mx-auto py-2" src="{{ asset('pictures/Products/' . $product->picture) }}"
                                    alt="Card image cap">
                            </a>
                            <div class="p-2 desc">
                                <a href="{{ route('store.product.details', $product->id) }}">
                                    <p class="product-name">{{ $product->name }}</p>
                                </a>
                                <p class="marque">
                                    <span>Marque : </span>
                                    <a href="" class="marque-link">{{ $product->brand->name ?? '' }}</a>
                                </p>

                                <p class="price">
                                    <span class="new-price">
                                        {!! $product->price
                                            ? $product->price . ' DA'
                                            : "<span class='marque'><span class='marque-link'>Prix : non mentionné </span> </span>" !!}
                                    </span>
                                    @if ($product->price && $product->discount > 0)
                                        <span class="old-price">
                                            {{ $product->price - ($product->price * $product->discount) / 100 }}
                                        </span>
                                    @endif

                                </p>
                                <form id="add-to-cart-form-{{ $product->id }}" method="post"
                                    action="{{ route('cart.store') }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="qte-products">
                                        <span>Qte :</span>
                                        <div
                                            style="display: flex; align-items: center; justify-content: space-between; gap: 10px;">
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
                @endforeach

            </div>
            <a href="{{ route('showproducts') }}" class="view-more">
                <span>voir plus</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- end section : popular-products -->



    <!-- start section : demmande-facture-proforma -->

    <section class="demmande-facture-proforma">
        <div class="container">
            <h2 class="demmande-facture-proforma-title section-title"><span>Besoin d'un devis ?</span></h2>
            <div>
                <h5>Fait-nous part de vous besoin</h5>
                <p>
                    Tendaxe est la pour vous accompagne à trouver les articles que vouschercher gratuitement alors n’hésiter
                    pas
                    à nous contacter.
                </p>
                <h5 class="comment">Comment ça marche ?</h5>
                <ol class="comment">
                    <li>
                        Veuiller remplir le formulaire si dessous
                    </li>
                    <li>
                        Précisez les articles recherchés (désignation d'équipements, matériels,matières, outils ou autres)
                        avec
                        la quantité et le délai ; vous pouvez ajouterune photo ou un fichier de liste d'articles (liste de
                        produits demandé ou unbordereau de prix à remplir).
                    </li>
                    <li>
                        Des experts dédiés recherchent gratuitement les produit rependant àvotre besoin (demande de devis,
                        bon
                        de disponibilité, détails techniques )
                    </li>
                    <li>
                        vous recevez des réponse dans les 24 heur ouvré (devis,facteur-proforma, fiches techniques…)
                    </li>
                </ol>
            </div>

            <div class="row py-4 flex-row flex-md-column-reverse flex-lg-row">
                <div class="col-12 col-md-12 col-lg-8">
                    <form class="bg-white border px-4 pt-3 rounded" method="POST"
                        action="{{ route('facteurProformastore') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Nomination de Organisme (raison social)</label>
                                    <input class="form-control bg-light" type="text" name="raison" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input class="form-control bg-light" type="text" name="nom" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Prenom</label>
                                    <input class="form-control bg-light" type="text" name="prenom" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Email</label>
                                <input class="form-control bg-light" type="email" name="email" required
                                    value="">
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telephone</label>
                                    <input class="form-control bg-light" type="text" name="phone" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label>Paye</label>
                                    <input class="form-control bg-light" type="paye" name="paye" required>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label>Region</label>
                                    <input class="form-control bg-light" type="region" name="region" required>

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">

                                    <label>Votre besoin</label> <br>

                                    <textarea class="form-control bg-light" name="besoin" id="" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Insérer votre liste d'articles (photo, pdf ou excel)</label>
                                    <div class="upload-document-wrapper">
                                        <div id="dropzone">
                                            <input type="file" id="fileInput" multiple="" name="files"
                                                style="display: none;">
                                            <svg width="49" height="48" viewBox="0 0 49 48" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.36529 42H31.4552C32.3708 42 33.1132 41.2697 33.1132 40.3672C33.1132 39.4648 32.3708 38.7345 31.4552 38.7345H6.36529C5.51117 38.7345 4.81655 38.0504 4.81655 37.2085V14.3802C4.81655 13.5383 5.51117 12.8542 6.36529 12.8542H13.5795C15.7225 12.8542 17.642 11.4383 18.2508 9.40055L18.5528 8.36732C18.7463 7.71836 19.3583 7.26553 20.0408 7.26553H27.9602C28.6427 7.26553 29.2539 7.71836 29.445 8.35935L29.7526 9.41012C30.1956 10.8921 31.3432 12.0399 32.7634 12.5547V14.8218C32.7634 17.4623 34.9453 19.6117 37.6274 19.6117H43.1844V27.184C43.1844 28.0864 43.9268 28.8167 44.8425 28.8167C45.7581 28.8167 46.5005 28.0864 46.5005 27.184V14.3802C46.5005 11.7381 44.3178 9.5887 41.6357 9.5887H34.4215C33.739 9.5887 33.1278 9.13587 32.9367 8.49648L32.6291 7.4457C32.0235 5.41751 30.1031 4 27.9602 4H20.0408C17.897 4 15.9767 5.41751 15.3687 7.45527L15.0667 8.4885C14.8732 9.13587 14.262 9.5887 13.5795 9.5887H6.36529C3.68313 9.5887 1.50049 11.7381 1.50049 14.3802V37.2085C1.50049 39.8506 3.68313 42 6.36529 42ZM41.6357 12.8542C42.4898 12.8542 43.1844 13.5383 43.1844 14.3802V16.3462H37.6274C36.7741 16.3462 36.0795 15.6621 36.0795 14.8218V12.8542H41.6357Z"
                                                    fill="#11A3AB" />
                                                <path
                                                    d="M24.0009 16C18.7625 16 14.5005 20.4857 14.5005 26.0008C14.5005 31.5143 18.7625 36 24.0009 36C29.2392 36 33.5005 31.5143 33.5005 26.0008C33.5005 20.4857 29.2392 16 24.0009 16ZM24.0009 32.5721C20.5577 32.5721 17.7569 29.6246 17.7569 26.0008C17.7569 22.3771 20.5577 19.4279 24.0009 19.4279C27.4433 19.4279 30.2441 22.3771 30.2441 26.0008C30.2441 29.6246 27.4433 32.5721 24.0009 32.5721Z"
                                                    fill="#11A3AB" />
                                                <path
                                                    d="M45.9188 35.7857H43.0822V32.7135C43.0822 31.7664 42.374 31 41.5005 31C40.627 31 39.9188 31.7664 39.9188 32.7135V35.7857H37.0822C36.2087 35.7857 35.5005 36.5521 35.5005 37.4992C35.5005 38.4463 36.2087 39.2126 37.0822 39.2126H39.9188V42.2865C39.9188 43.2336 40.627 44 41.5005 44C42.374 44 43.0822 43.2336 43.0822 42.2865V39.2126H45.9188C46.7923 39.2126 47.5005 38.4463 47.5005 37.4992C47.5005 36.5521 46.7923 35.7857 45.9188 35.7857Z"
                                                    fill="#11A3AB" />
                                            </svg>
                                            <p>Déposez vos fichiers ici ou cliquez pour les sélectionner</p>
                                        </div>
                                        <div id="fileInfos">
                                            <h4>fichier(s) importé(s) :</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group w-100 text-right">
                                <button class="btn btn-primary">Demander facture proforma</button>
                            </div>
                    </form>
                </div>
            </div>
            <div class="d-none d-md-flex col-md-12 col-lg-4">
                <img src="{{ asset('img/facture.png') }}" alt="pFACTURE" class="facture-img">
            </div>
        </div>
        </div>
    </section>
    <!-- end section : demmande-facture-proforma -->

    <!-- start section : stores -->

    <section class="stores">
        <div class='container'>
            <h2 class="stores-title section-title"><span>Boutiques</span></h2>
            <div class="swiper storesSwiper px-4">
                <div class="swiper-wrapper m-4 mx-auto">
                    @foreach ($stores as $item)
                        <div class="swiper-slide">
                            <a class="boutique-card" href="{{ route('store.show', $item->id) }}">
                                <div class="store-cover">
                                    <img src="{{ asset('pictures/storeCovera/' . $item->cover) }}"
                                        class="store-cover-img" alt="couverture de boutique">
                                </div>
                                <div class="store-profil">
                                    <img src="{{ asset('pictures/storeLogos/' . $item->logo) }}" class="store-profil-img"
                                        alt="profile de boutique">
                                </div>

                                <h5 class="store-name">{{ $item->storeName }}</h5>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="d-flex justify-content-md-end justify-content-center mt-md-4 mt-2">
                <a href="{{ route('store.all') }}">
                    <button class="btn btn-primary ">Tous les boutiques</button>
                </a>
            </div>
            <div class="stores-swiper-button-next1 swiper-button-next">
                <img src="{{ asset('img/right.png') }}" alt="">
            </div>
            <div class="swiper-button-prev stores-swiper-button-prev1">
                <img src="{{ asset('img/left.png') }}" alt="">
            </div>
        </div>
    </section>

    <!-- end section : stores -->

    <!-- start section : marques -->

    <section class="marques-section">
        <div class='container marques-swiper'>
            <h2 class="marques-title section-title"><span>Nos marques</span></h2>
            <div class="swiper mySwiper marquesSwiper px-4">
                <div class="swiper-wrapper m-4 mx-auto">
                    @foreach ($brands as $item)
                        <div class="swiper-slide text-center">
                            <a href="">
                                <img src="{{ asset('pictures/Brands/' . $item->picture) }}" alt="marque">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-md-end justify-content-center mt-md-4 mt-2">
                <a href="{{ route('store.marques') }}">
                    <button class="btn btn-primary ">Tous les marques</button>
                </a>

            </div>
            <div class="swiper-button-next1 swiper-button-next">
                <img src="{{ asset('img/right.png') }}" alt="">
            </div>
            <div class="swiper-button-prev swiper-button-prev1">
                <img src="{{ asset('img/left.png') }}" alt="">
            </div>

        </div>
    </section>

    <!-- end section : marques -->







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



@endsection

@section('scripts')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var subCategoItems = document.querySelectorAll('.sub-catego-item');

            subCategoItems.forEach(function(item) {
                item.addEventListener('mouseenter', function() {
                    var subcats = this.querySelector('.subcats');
                    if (subcats) {
                        // Calculate the space available on the right
                        var rect = subcats.getBoundingClientRect();
                        var spaceRight = window.innerWidth - rect.right;

                        // If there isn't enough space on the right, display on the left
                        if (spaceRight < subcats.offsetWidth) {
                            subcats.style.left = 'auto';
                            subcats.style.right = '100%';
                        } else {
                            subcats.style.left = '100%';
                            subcats.style.right = 'auto';
                        }

                        subcats.style.display = 'block';
                    }
                });

                item.addEventListener('mouseleave', function() {
                    var subcats = this.querySelector('.subcats');
                    if (subcats) {
                        subcats.style.display = 'none';
                    }
                });
            });
        });


        function changeQty(button, delta) {
            // Get the input field that corresponds to the current button
            let input = button.parentElement.querySelector('input[type="number"]');
            let currentValue = parseInt(input.value) || 1;

            // Set new quantity value, ensuring it doesn't go below 1
            let newValue = currentValue + delta;
            if (newValue < 1) newValue = 1;

            // Update the input value with the new quantity
            input.value = newValue;
        }
    </script>
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
