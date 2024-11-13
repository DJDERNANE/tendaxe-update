

<?php $__env->startSection('title', 'Acceuil'); ?>


<?php $__env->startSection('styling'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/store-edit.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-icons.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

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
                                    <?php $__currentLoopData = $mainCats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $accordionId = 'categoItemCollapse' . $loop->index;
                                            $headerId = 'catego-item-header-' . $loop->index;
                                        ?>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header catego-item" id="<?php echo e($headerId); ?>">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#<?php echo e($accordionId); ?>" aria-expanded="true"
                                                    aria-controls="<?php echo e($accordionId); ?>">
                                                    <img src="https://tendaxe.com/img/icons/two_hands.png" class="catego-icon">
                                                    <?php echo e($category->name); ?>

                                                </button>
                                            </h2>
                                            <div id="<?php echo e($accordionId); ?>" class="accordion-collapse collapse"
                                                aria-labelledby="<?php echo e($headerId); ?>">
                                                <div class="accordion-body">
                                                    <ul class="list-unstyled sub-catego-list">
                                                        <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li>
                                                                <a href="<?php echo e(route('category.childs', $item->id)); ?>" class="sub-catego-link"><?php echo e($item->name); ?></a>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-12 col-lg-9">
                            <div class='row'>
                                <div class='col-12 col-md-9'>
                                    <div id="carouselBanner" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php $__currentLoopData = $pubs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="carousel-item <?php echo e($index == 0 ? 'active' : ''); ?>">
                                                    <img src="<?php echo e(asset('pictures/Pubs/' . $item->picture)); ?>"
                                                        class="d-block w-100 banner-img" alt="banner-image">
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                    <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-6 col-sm-4 col-lg-4 col-xl-3">
                                            <a href="<?php echo e(route('category.childs', $item->id)); ?>">
                                                <div class="box-catego">
                                                    <img src="<?php echo e(asset('pictures/Category/' . $item->picture)); ?>" alt="category">
                                                    <h6 class="catego-name">
                                                        <?php echo e($item->name); ?>

                                                    </h6>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                                </div>
                                <nav aria-label="Page navigation" class="pagination-nav">
                                    <?php echo e($cats->links()); ?>

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
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col">
                    <div class="card product-box">
                        <?php if($item->discount > 0): ?>
                            <span class="discount"> - <?php echo e($item->discount); ?> %</span>
                        <?php endif; ?>

                        <a href="<?php echo e(route('store.product.details', $item->id)); ?>">
                            <img class="mx-auto py-2" src="<?php echo e(asset('pictures/Products/' . $item->picture)); ?>"
                                alt="Card image cap">
                        </a>
                        <div class="p-2 desc">
                            <a href="<?php echo e(route('store.product.details', $item->id)); ?>">
                                <p class="product-name"><?php echo e(Str::limit($item->name,40)); ?></p>
                            </a>
                            <p class="marque"><span>Marque : </span><a href=""
                                    class="marque-link"><?php echo e($item->brand->name ?? ''); ?></a></p>

                            <p class="price">
                                <span class="new-price">
                                    <?php echo $item->price ? $item->price . ' DA' : "<span class='marque'><span class='marque-link'>Prix : non mentionné </span> </span>"; ?>

                                </span>
                                <?php if($item->price && $item->discount > 0 ): ?>
                                    <span class="old-price">
                                        <?php echo e($item->price - ($item->price * $item->discount / 100)); ?>

                                    </span>
                                <?php endif; ?>
                                
                            </p>
                            <form class="" method="post" action="<?php echo e(route('cart.store')); ?>">
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <a href="<?php echo e(route('showproducts')); ?>" class="view-more">
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

    


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.storelayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/store/subcategories.blade.php ENDPATH**/ ?>