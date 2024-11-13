<?php $__env->startSection('title', 'profile'); ?>
    
<?php $__env->startSection('content'); ?>
    <div class="container-fluid p-5" style="background: url(<?php echo e(asset('img/banner/laptop_typing.jpg')); ?>) no-repeat center center; margin-top: 66px; background-size: cover;">
        <div class="container">
            <h2 class="text-white bold my-4"> Mon Profile </h2>
        </div>
    </div>
    <div class="container mt-0 mt-md-5">
        <?php if(count($errors)>0): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger" role="alert">
                <?php echo e($error); ?>


                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-3 my-3 mt-md-0">
                <a class="d-flex align-items-center text-dark" href="<?php echo e(route('profile')); ?>" style="text-decoration: none;">
                    <img width="25px" class="img-fluid mr-2" src="<?php echo e(asset('img/icons/user3.png')); ?>" alt="">
                    <span class="m-2 ml-3 <?php echo $__env->yieldContent('link_profile'); ?> h5">Mon Profile</span>
                </a>
                <a class="d-flex align-items-center text-dark" href="<?php echo e(route('abonnement')); ?>" style="text-decoration: none;">
                    <img width="25px" class="img-fluid mr-2" src="<?php echo e(asset('img/icons/doc2.png')); ?>" alt="">
                    <span class="m-2 ml-3 <?php echo $__env->yieldContent('link_abonnement'); ?> h5">Mes Abonnements</span>
                </a>
                <a class="d-flex align-items-center text-dark" href="<?php echo e(route('notification')); ?>" style="text-decoration: none;">
                    <img width="25px" class="img-fluid mr-2" src="<?php echo e(asset('img/icons/notifbell.png')); ?>" alt="">
                    <span class="m-2 ml-3 <?php echo $__env->yieldContent('link_notif'); ?> h5">Notification</span>
                </a>
                <a class="d-flex align-items-center text-dark" href="<?php echo e(route('user.offers')); ?>" style="text-decoration: none;">
                    <img width="25px" class="img-fluid mr-2" src="<?php echo e(asset('img/icons/annouce.png')); ?>" alt="">
                    <span class="m-2 ml-3 <?php echo $__env->yieldContent('link_my_offers'); ?> h5">Mes Offres</span>
                </a>
            </div>
            <div class="col-md-9 bg-white border px-2 py-3 mb-3">
                <?php echo $__env->yieldContent('profile'); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/layouts/profile.blade.php ENDPATH**/ ?>