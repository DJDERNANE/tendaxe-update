

<?php $__env->startSection('title', 'Contact'); ?>

<?php $__env->startSection('content'); ?>

<div class="col-12 col-md-12 col-lg-8 mx-auto my-4" >
    <form class="bg-white border px-4 pt-3 p-4 rounded" method="POST" action="<?php echo e(route('contact.store')); ?>" style="margin-top: 100px">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nom</label>
                    <input class="form-control bg-light" type="text" name="nom" value="<?php echo e($contact->name); ?>" readonly >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Sujet</label>
                    <input class="form-control bg-light" type="text" name="subject" value="<?php echo e($contact->subject); ?>" readonly>
                </div>
            </div>
            <div class="col-md-6 form-group">
                <label>Email</label>
                <input class="form-control bg-light" type="email" name="email" readonly value="<?php echo e($contact->email); ?>">
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Telephone</label>
                    <input class="form-control bg-light" type="text" name="phone" value="<?php echo e($contact->phone); ?>" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">

                    <label>Paye</label>
                    <input class="form-control bg-light" type="paye" name="paye" readonly value="<?php echo e($contact->paye); ?>">

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">

                    <label>Region</label>
                    <input class="form-control bg-light" type="region" name="region" readonly value="<?php echo e($contact->region); ?>">

                </div>
            </div>

            <div class="col-12">
                <div class="form-group">

                    <label>Message</label> <br>

                    <textarea class="form-control bg-light" name="message" id="" cols="30" rows="5"><?php echo e($contact->message); ?></textarea>
                </div>
            </div>
    </form>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminStorePanel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/admin/contact/contact.blade.php ENDPATH**/ ?>