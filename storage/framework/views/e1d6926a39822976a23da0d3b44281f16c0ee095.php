<nav class="breadcrumb-nav" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!$loop->last): ?>
                <li class="breadcrumb-item">
                    <a href="<?php echo e($item['url']); ?>"><?php echo e($item['name']); ?></a>
                </li>
            <?php else: ?>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e($item['name']); ?></li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ol>
</nav>
<?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/components/breadcrumb.blade.php ENDPATH**/ ?>