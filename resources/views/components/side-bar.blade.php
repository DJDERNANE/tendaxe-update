
<div class="nav-bottom">
    <div class="categories-search-wrapper">
        <div class="dropdown categories-dropdown" id="dropdown">
            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                toutes catégories
            </button>
            <ul class="dropdown-menu">
                <div class="accordion" id="accordionCategoNavbar">
                    @foreach ($categories as $item)
                    <div class="accordion-item">
                        <h2 class="accordion-header catego-item" id="catego-item-header-one">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#categoItemCollapseOne" aria-expanded="true" aria-controls="categoItemCollapseOne">
                                <img src="https://tendaxe.com/img/icons/two_hands.png" class="catego-icon">
                                {{ $item->name }}
                            </button>
                        </h2>
                        <div id="categoItemCollapseOne" class="accordion-collapse collapse" aria-labelledby="catego-item-header-one">
                            <div class="accordion-body">
                                <ul class="list-unstyled sub-catego-list">
                                    @foreach ($item->children as $subcat)
                                    <li>
                                        <a href="" class="sub-catego-link">{{$subcat->name}}</a>
                                    </li>
                                    @endforeach
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="accordion-item">
                        <h2 class="accordion-header catego-item" id="catego-item-header-two">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#categoItemCollapseTwo" aria-expanded="true" aria-controls="categoItemCollapseTwo">
                                <img src="https://tendaxe.com/img/icons/two_hands.png" class="catego-icon">
                                categorie #2
                            </button>
                        </h2>
                        <div id="categoItemCollapseTwo" class="accordion-collapse collapse" aria-labelledby="catego-item-header-two">
                            <div class="accordion-body">
                                <ul class="list-unstyled sub-catego-list">
                                    <li>
                                        <a href="" class="sub-catego-link">sub catego 1</a>
                                    </li>
                                    <li>
                                        <a href="" class="sub-catego-link">sub catego 2</a>
                                    </li>
                                    <li>
                                        <a href="" class="sub-catego-link">sub catego 3</a>
                                    </li>
                                    <li>
                                        <a href="" class="sub-catego-link">sub catego 4</a>
                                    </li>
                                    <li>
                                        <a href="" class="sub-catego-link">sub catego 5</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
        <form class="d-flex bg-white store-form align-items-center">
            <input type="text" placeholder="Recherche..." class="px-2">
            <button class="px-2"><i class="bi bi-search text-primary "></i></button>
        </form>
    </div>
    <div class="subcats">

    </div>
</div>