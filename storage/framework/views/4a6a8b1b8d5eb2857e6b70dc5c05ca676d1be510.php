
<?php $__env->startSection('title', 'Store'); ?>
<?php $__env->startSection('content'); ?>

    <div class="mt-5 pt-5  mx-auto row ">
        <div class="container mt-4">
            <div class='row'>
                <div class='col-12'>
                    <div class="boutique-account shadow rounded">
                        <img src="<?php echo e(asset('pictures/storeCovera/' . $store->cover)); ?>" alt="profile">
                        <div class="boutique-info">
                           
                            <div>
                                <div class="logoStore">
                                    <img  src="<?php echo e(asset('pictures/storeLogos/' . $store->logo)); ?>" alt="profile">
                                </div>
                                <div class="storeName">
                                    <p><?php echo e($store->storeName); ?></p>
                                </div>
                                
                            </div>
                            <div>
                                N produit : <b><?php echo e($store->products->count()); ?></b>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class='container'>
               
                <div class="row row-cols-2 row-cols-md-4 row-cols-lg-5 row-cols-xl-6">
                    <?php $__currentLoopData = $store->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col">
                            <div class="card product-box">
                                <?php if($item->discount > 0): ?>
                                    <p class='discount'><?php echo e($item->discount); ?>%</p>
                                <?php endif; ?>
                                <a href="<?php echo e(route('store.product.details', $item->id)); ?>">
                                    <img class="mx-auto py-2" src="<?php echo e(asset('pictures/Products/'.$item->picture)); ?>"
                                        alt="Card image cap">
                                </a>
                                <div class="p-2 desc">
                                    <a href="<?php echo e(route('store.product.details', $item->id)); ?>">
                                        <p class="product-name"><?php echo e($item->desc); ?></p>
                                    </a>
                                    <p class="marque"><span>Marque</span><a href="" class="marque-link"><?php echo e($item->brand->name ?? 'no brand'); ?></a>
                                    </p>
    
                                    <p class="price">
                                        <span class="new-price"><?php echo e($item->price); ?> DA</span>
                                    </p>
                                    <form id="add-to-cart-form-<?php echo e($item->id); ?>" method="post"
                                        action="<?php echo e(route('cart.store')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="product_id" value="<?php echo e($item->id); ?>">
                                        <div class="qte-products">
                                            <span>Qte :</span>
                                            <div class="qte-products-control">
                                                <button type="button" class="text-center"
                                                    onclick="changeQty(this, -1)">-</button>
                                                <input class="text-center" id="qty-<?php echo e($item->id); ?>" min="1"
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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
                </div>
              
            </div>
        </div>
    </div>






   



<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
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

<?php echo $__env->make('layouts.storelayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/store/boutique.blade.php ENDPATH**/ ?>