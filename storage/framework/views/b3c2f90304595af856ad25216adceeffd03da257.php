
<?php $__env->startSection('title', 'My Orders'); ?>
<?php $__env->startSection('content'); ?>

<div class="container mt-5 pt-5">
    <h1>My Orders</h1>
    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="order mt-4 p-3 bg-white my-5">
            <h4>Order #<?php echo e($order->id); ?></h4>
            <p>Status: <?php echo e($order->status); ?></p>
            <p> </p>
            <table class="table my-4">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <img class='mx-auto py-2'
                                width="80" height="80"   src="<?php echo e(asset('pictures/Products/' . $item->product->picture)); ?>"alt="Card image cap">
                            <?php echo e($item->product->name); ?></td>
                        <td><?php echo e($item->price); ?> DA</td>
                        <td><?php echo e($item->quantity); ?></td>
                        <td><?php echo e($item->price * $item->quantity); ?> DA</td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><b>Total Price</b> </td>
                        <td><b><?php echo e($order->total_price); ?> DA</b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.storelayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/store/order.blade.php ENDPATH**/ ?>