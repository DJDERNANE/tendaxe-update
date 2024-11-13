

<?php $__env->startSection('title', 'Verification email'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container d-flex align-items-center justify-content-center" style="height: 70vh">
        <form class="text-center" method="POST" action="<?php echo e(route('verification.send')); ?>">
            <?php echo csrf_field(); ?>
            <div class="display-4">Verifiez votre Email</div>
            <button type="submit" class="btn text-primary">Click ici pour renvoyer email de verification</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.storelayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/auth/verify-email.blade.php ENDPATH**/ ?>