
<?php $__env->startSection('title', 'Store'); ?>
<?php $__env->startSection('content'); ?>

<div class="mt-5 pt-5 mx-auto row">
    <div class="col-12 col-lg-10 container mt-4">
        <div class='row container g-2 my-4'>
            <div class="table-responsive">
                <table class="table bg-white rounded shadow my-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Prix unitaire TTC</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Total TTC</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th>
                                <div class="d-flex justify-content-start align-items-center">
                                    <img class="mr-3" src="<?php echo e(asset('pictures/Products/' . $item['picture'])); ?>" width="100" height="100" alt="Card image cap">
                                    <h6><?php echo e($item['name']); ?></h6>
                                </div>
                            </th>
                            <td><?php echo e($item['price']); ?> DA</td>
                            <td class="qte-cart">
                                Qte:
                                <button class='btn btn-sm btn-outline-secondary' onclick="minQty(event, <?php echo e($item['price']); ?>, <?php echo e($loop->index); ?>)">-</button>
                                <input class='form-control d-inline-block text-center' style="width: 60px;" id="qty-<?php echo e($loop->index); ?>" min="1" max="10" value="<?php echo e($item['quantity']); ?>" type="number" name="quantities[<?php echo e($item['product_id']); ?>]" onchange="updateQty(<?php echo e($loop->index); ?>, <?php echo e($item['price']); ?>)" />
                                <button class='btn btn-sm btn-outline-secondary' onclick="addQty(event, <?php echo e($item['price']); ?>, <?php echo e($loop->index); ?>)">+</button>
                            </td>
                            <td id="total-<?php echo e($loop->index); ?>"><?php echo e($item['price'] * $item['quantity']); ?> DA</td>
                            <td>
                                <form action="<?php echo e(route('cart.destroy', $item['product_id'])); ?>" method="POST" onsubmit="return confirm('Are you sure you want to remove this product?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-link p-0">
                                        <i class="bi bi-trash3-fill text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th></th>
                            <td></td>
                            <td><h6>Total</h6></td>
                            <td id="grand-total">0 DA</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <form action="<?php echo e(route('orders.store')); ?>" method="POST" class="bg-white rounded shadow my-3 col-12 p-3 row">
                <?php echo csrf_field(); ?>
                <input type="hidden" id="grand-total-input" name="total_price">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Paye</label>
                        <input class="form-control bg-light" type="text" name="contry" value="<?php echo e(old('contry')); ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Region</label>
                        <input class="form-control bg-light" type="text" name="region" value="<?php echo e(old('region')); ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Address</label>
                        <input class="form-control bg-light" type="text" name="address" value="<?php echo e(old('address')); ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>N° de telephone de recepteur</label>
                        <input class="form-control bg-light" type="text" name="phone" value="<?php echo e(old('phone')); ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control bg-light" type="text" name="email" value="<?php echo e(old('email')); ?>" required>
                    </div>
                </div>
                <div class="col-12 form-group text-right">
                    <button type="submit" class="btn btn-primary">Commander</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        updateGrandTotal();
    });

    function minQty(event, price, index) {
        event.preventDefault();
        const qtyInput = document.getElementById(`qty-${index}`);
        if (qtyInput.value > qtyInput.min) {
            qtyInput.value = parseInt(qtyInput.value) - 1;
            updateQty(index, price);
        }
    }

    function addQty(event, price, index) {
        event.preventDefault();
        const qtyInput = document.getElementById(`qty-${index}`);
        if (qtyInput.value < qtyInput.max) {
            qtyInput.value = parseInt(qtyInput.value) + 1;
            updateQty(index, price);
        }
    }

    function updateQty(index, price) {
        const qtyInput = document.getElementById(`qty-${index}`);
        const totalCell = document.getElementById(`total-${index}`);
        const quantity = parseInt(qtyInput.value);
        totalCell.textContent = (quantity * price) + ' DA';
        updateGrandTotal();
    }

    function updateGrandTotal() {
        let grandTotal = 0;
        document.querySelectorAll('td[id^="total-"]').forEach(function(totalCell) {
            grandTotal += parseInt(totalCell.textContent);
        });
        document.getElementById('grand-total').textContent = grandTotal + ' DA';
        document.getElementById('grand-total-input').value = grandTotal;
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.storelayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/store/cart.blade.php ENDPATH**/ ?>