

<?php $__env->startSection('title', 'Marques'); ?>
<?php $__env->startSection('styling'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/productDetails-edit.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- start section : product-details-section -->

    <section class="product-details-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5 col-xl-4">
                    <div id="infoProductCarousel" class="carousel slide" data-ride="carousel" align="center">
                        <!-- slides -->
                        <div class="carousel-inner">
                            <!-- Main product image (static) -->
                            <?php if($product->picture): ?>
                                <div class="carousel-item active">
                                    <img src="<?php echo e(asset('pictures/Products/' . $product->picture)); ?>" alt="product"
                                        class="d-block w-100" />
                                </div>
                            <?php endif; ?>

                            <!-- Loop through additional product images -->
                            <?php $__currentLoopData = $product->pictures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="carousel-item <?php echo e(!$product->picture && $index == 0 ? 'active' : ''); ?>">
                                    <img src="<?php echo e(asset('pictures/Products/pictures/' . $product->picture . '/' . $image->path)); ?>"
                                        class="d-block w-100" alt="Product Image">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <!-- Left right controls -->
                        <a class="carousel-control-prev" href="#infoProductCarousel" data-slide="prev">
                            <i class="bi bi-chevron-left"></i>
                        </a>
                        <a class="carousel-control-next" href="#infoProductCarousel" data-slide="next">
                            <i class="bi bi-chevron-right"></i>
                        </a>

                        <!-- Thumbnails -->
                        <ol class="carousel-indicators list-inline">
                            <?php if($product->picture): ?>
                                <li class="list-inline-item active">
                                    <a id="carousel-selector-0" data-slide-to="0" data-target="#infoProductCarousel">
                                        <img src="<?php echo e(asset('pictures/Products/' . $product->picture)); ?>" class="img-fluid"
                                            alt="Thumbnail">
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php $__currentLoopData = $product->pictures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-inline-item <?php echo e(!$product->picture && $index == 0 ? 'active' : ''); ?>">
                                    <a id="carousel-selector-<?php echo e($index + 1); ?>" data-slide-to="<?php echo e($index + 1); ?>"
                                        data-target="#infoProductCarousel">
                                        <img src="<?php echo e(asset('pictures/Products/pictures/' . $product->picture . '/' . $image->path)); ?>"
                                            class="img-fluid" alt="Thumbnail">
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ol>
                    </div>
                </div>

                <div class="col-12 col-lg-7 col-xl-8">
                    <div class="product-info">
                        <h3 class="product-name"><?php echo e($product->name); ?></h3>
                        <div class="mark-wrapper">
                            <div class="mark-content">
                                <label for="">marque</label>
                                <span class="mark-text"><?php echo e($product->brand->name ?? 'no brand'); ?></span>
                            </div>
                            <img src="<?php echo e($product->brand ? asset('pictures/Category/' . $product->brand->picture) : ''); ?>"
                                class="mark-img" alt="marque logo">
                        </div>
                        <div class="ref-wrapper">
                            <label for="">référence</label>
                            <span class="ref"><?php echo e($product->ref); ?></span>
                        </div>
                        <div class="reviews">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            (24)
                        </div>
                        <p class="price"> <?php echo $product->price ? $product->price . ' DA' : 'Prix : non mentionné '; ?></p>
                        <p class="primaryDesc" id="desc">
                            <?php echo $product->primary_desc; ?>

                        </p>
                        <form id="add-to-cart-form-<?php echo e($product->id); ?>" method="post" action="<?php echo e(route('cart.store')); ?>"
                            class="addToCart-form">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                            <div class="qte-products qteadd">
                                <span>Qte:</span>
                                <div class="qte-products-control">
                                    <button type="button" class="text-center" onclick="changeQty(this, -1)">-</button>
                                    <input class="text-center" id="qty-<?php echo e($product->id); ?>" min="1" value="1"
                                        type="number" name="qte">
                                    <button type="button" class="text-center" onclick="changeQty(this, 1)">+</button>
                                </div>
                            </div>
                           
                                <button class="btn btn-primary" type="submit"><i class="bi bi-cart"></i> Ajouter
                                    au panier</button>
                           
                        </form>
                    </div>
                    <div class="row justify-content-between mt-5 items-wrapper">
                        <div
                            class="item  col-md-3 col-12 text-md-center p-2 rounded shadow-sm d-flex flex-md-column align-items-center p-3 my-3">
                            <i class="bi bi-truck text-primary font-weight-bold mr-4"></i>
                            <div>
                                <p class="font-weight-bold text-md-center mb-0">Livraison au choix</p>
                                <p class="text-black-50 font-weight-normal mb-0" style="font-size: 12px">Domicile, Point
                                    relais, Retrait
                                    au Dépöt
                                </p>
                            </div>
                        </div>
                        <div
                            class="item  col-md-3 col-12 text-md-center p-2 rounded shadow-sm d-flex flex-md-column align-items-center p-3 my-3">
                            <i class="bi bi-truck text-primary font-weight-bold mr-4"></i>
                            <div>
                                <p class="font-weight-bold text-md-center mb-0">Paiement sécurisé</p>
                                <p class="text-black-50 font-weight-normal mb-0" style="font-size: 12px">Paiement par
                                    cheque
                                    ou à
                                    livraison, virement bancaire
                                </p>
                            </div>
                        </div>
                        <div
                            class="item  col-md-3 col-12 text-center p-2 rounded shadow-sm d-flex flex-md-column align-items-center p-3 my-3">
                            <i class="bi bi-truck text-primary font-weight-bold  mr-4"></i>
                            <div>
                                <p class="font-weight-bold text-md-center mb-0">Livraison aux choix</p>
                                <p class="text-black-50 font-weight-normal mb-0" style="font-size: 12px">En une ou
                                    plusieurs
                                    fois
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end section : product-details-section -->



    <!-- start section : documents-notices -->

    <?php if(!$product->docs->isEmpty()): ?>
        <section class="documents-notices">
            <div class="container">
                <h2 class="documents-notices-title section-title"><span>Documents et notices</span></h2>
                <div class="row justify-content-center">

                    <?php $__currentLoopData = $product->docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="doc-notice-box text-center">
                                <h5 class="doc-name"><?php echo e($doc->name); ?></h5>
                                <a href="<?php echo e(asset('pictures/Products/files/' . $doc->path)); ?>" class="doc-link">voir
                                    le document</a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>

    <?php endif; ?>

    <!-- end section : documents-notices -->




    <!-- start section : product-description-details -->
    <?php if($product->full_desc): ?>
        <section class="popular-products">
            <div class="container">
                <h2 class="popular-products-title section-title"><span>Description</span></h2>
                <div id="details">
                    <?php echo $product->full_desc; ?>

                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- end section : product-description-details -->



    <!-- start section : store info -->

    <?php if($product->store->show_info): ?>
        <section class="store-info">
            <div class="container">
                <div class="store-logo-name">
                    <img src="<?php echo e($product->store->logo ? asset('pictures/storeLogos/' . $product->store->logo) : ''); ?>"
                        class="store-logo" alt="store logo">
                    <h4 class="store-name"><?php echo e($product->store->storeName); ?></h4>
                </div>
                <div class="store-contact-phone">
                    <h6 class="store-contact-phone-title">
                        <i class="bi bi-telephone-fill"></i>
                        <span>téléphone</span>
                    </h6>
                    <div class="store-contact-phone-num-wrapper">
                        <span class="phone-number-one"><?php echo e($product->store->user->phone); ?></span>
                    </div>
                </div>
                <div class="store-contact-phone">
                    <h6 class="store-contact-phone-title">
                        <i class="bi bi-envelope-fill"></i>
                        <span>Email</span>
                    </h6>
                    <div class="store-contact-phone-num-wrapper">
                        <span class="phone-number-one"><?php echo e($product->store->user->email); ?></span>
                    </div>
                </div>
                <div class="store-location">
                    <h6 class="store-location-title">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>Addresse : </span>
                    </h6>
                    <ul class="store-location-list">
                        <?php echo e($product->store->region); ?>, <?php echo e($product->store->wilaya); ?>, Algerie
                    </ul>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <!-- end section : store info -->



    <!-- start section : popular-products -->

    <section class="popular-products">
        <div class="container">
            <h2 class="popular-products-title section-title"><span>Produits fréquents</span></h2>
            <div class="row row-cols-2 row-cols-md-4 row-cols-lg-5 row-cols-xl-6">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col">
                        <div class="card product-box">
                            <?php if($product->discount > 0): ?>
                                <span class="discount"> - <?php echo e($product->discount); ?> %</span>
                            <?php endif; ?>
                            <a href="<?php echo e(route('store.product.details', $product->id)); ?>">
                                <img class="mx-auto py-2" src="<?php echo e(asset('pictures/Products/' . $product->picture)); ?>"
                                    alt="Card image cap">
                            </a>
                            <div class="p-2 desc">
                                <a href="<?php echo e(route('store.product.details', $product->id)); ?>">
                                    <p class="product-name"><?php echo e($product->name); ?></p>
                                </a>
                                <p class="marque">
                                    <span>Marque : </span>
                                    <a href="" class="marque-link"><?php echo e($product->brand->name ?? ''); ?></a>
                                </p>

                                <p class="price">
                                    <span class="new-price">
                                        <?php echo $product->price
                                            ? $product->price . ' DA'
                                            : "<span class='marque'><span class='marque-link'>Prix : non mentionné </span> </span>"; ?>

                                    </span>
                                    <?php if($product->price && $product->discount > 0): ?>
                                        <span class="old-price">
                                            <?php echo e($product->price - ($product->price * $product->discount) / 100); ?>

                                        </span>
                                    <?php endif; ?>

                                </p>
                                <form class="" method="post" action="<?php echo e(route('cart.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="product_id" readonly="" value=<?php echo e($product->id); ?>>
                                    <div class="qte-products">
                                        <span>Qte :</span>
                                        <div class="qte-products-control">
                                            <button type="button" class="text-center"
                                                onclick="changeQty(this, -1)">-</button>
                                            <input class="text-center" id="qty-<?php echo e($product->id); ?>" min="1"
                                                value="1" type="number" name="qte">
                                            <button type="button" class="text-center"
                                                onclick="changeQty(this, 1)">+</button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="btn btn-primary" type="submit"><i class="bi bi-cart"></i> Ajouter
                                            au
                                            panier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <a href="" class="view-more">
                <span>voir plus</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- end section : popular-products -->



<?php $__env->stopSection(); ?>




<?php $__env->startSection('scripts'); ?>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    <script>
        var main = document.getElementById('main-image');

        function changeImage(e) {
            main.src = e.src
        }
    </script>

    <script>
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
    <script src="<?php echo e(asset('js/owl.carousel.js')); ?>"></script>
    <script src="<?php echo e(asset('js/script-edit.js')); ?>"></script>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.storelayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/store/productDetails.blade.php ENDPATH**/ ?>