

<?php $__env->startSection('title', 'Order Details'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container my-5 pt-5">
        <div class="d-flex justify-content-between mt-2">
            <h6>Order Detaild</h6>
            <button class="btn btn-success rounded-3 supp-btn" disabled id="supp-btn">Accepter <span
                    id="count1"></span></button>
        </div>

        <div class="order mt-4 p-3 bg-white">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><input type="checkbox" name="all" id="select-all"></th>
                        <th scope="col">Fournisseur</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <?php if(!$item->active): ?>
                                <td><input type="checkbox" name="item[]" value="<?php echo e($item->id); ?>"></td>
                            <?php else: ?>
                                <td></td>
                            <?php endif; ?>
                               

                            <td>
                                <?php echo e($item->store->storeName); ?> <br>
                                <b><?php echo e($item->store->user->email); ?></b> <br>
                                <b><?php echo e($item->store->user->phone); ?></b>
                            </td>
                            <td>
                                <img class='mx-auto py-2' width="80" height="80"
                                    src="<?php echo e(asset('pictures/Products/' . $item->product->picture)); ?>"alt="Card image cap">
                                <?php echo e($item->product->name); ?>

                            </td>
                            <td><?php echo e($item->price); ?> DA</td>
                            <td><?php echo e($item->quantity); ?></td>
                            <td><?php echo e($item->price * $item->quantity); ?> DA</td>
                            <td><?php echo e($item->active ? 'Accepter' : 'En Attente'); ?></td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAll = document.querySelector('#select-all');
            const items = document.querySelectorAll('input[name="item[]"]');
            const suppBtn = document.getElementById('supp-btn');


            // Function to log and manage selected items
            function logSelectedItems() {
                const selectedItems = Array.from(items).filter(item => item.checked);
                const count1 = document.getElementById('count1');
                if (selectedItems.length == 0) {
                    suppBtn.disabled = true;
                    count1.innerHTML = ""; // Clear the text or set to default text if needed
                } else {
                    suppBtn.disabled = false;
                    count1.innerHTML = "(" + selectedItems.length +
                    ")"; // Set the actual number or use `selectedItems.length`
                }
            }


            // Initially call to set button state
            logSelectedItems();

            // Event listener for 'select all' checkbox
            selectAll.addEventListener('change', function() {
                items.forEach(item => {
                    item.checked = selectAll.checked;
                });
                logSelectedItems();
            });

            // Event listeners for each checkbox
            items.forEach(item => {
                item.addEventListener('change', logSelectedItems);
            });

            // Handle the delete button click event
            $('.supp-btn').click(function(event) {
                event.preventDefault();
                if (confirm('Are you sure you want to Accept this item?')) {
                    // Recompute selectedValues just before the request
                    const selectedValues = Array.from(items)
                        .filter(item => item.checked)
                        .map(item => item.value);
                    console.log(selectedValues)
                    $.ajax({
                        url: '/admin/store/orders/accept',
                        type: 'POST',
                        data: JSON.stringify({
                            ids: selectedValues,
                            '_token': $('meta[name="csrf-token"]').attr('content')
                        }),
                        contentType: 'application/json',
                        success: function(response) {
                            console.log('res : ' + response);
                            selectedValues.forEach(id => {
                                $('input[value="' + id + '"]').closest('tr').remove();
                            });
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminStorePanel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/admin/store/orderDetails.blade.php ENDPATH**/ ?>