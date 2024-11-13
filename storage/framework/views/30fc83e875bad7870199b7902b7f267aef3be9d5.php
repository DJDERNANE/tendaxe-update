

<?php $__env->startSection('title', 'Inscription'); ?>
    
<?php $__env->startSection('content'); ?>
<div class="bg-light" style="height: 100vh">
    <div class="container main">
        <h2 class="bold text-center">Inscription</h2>
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
        <?php if(session('error')): ?>
			<div class="alert alert-danger" role="alert">
				<?php echo e(session('error')); ?>

			</div>
        <?php endif; ?>
        <div class="row my-5 justify-content-center">
            <div class="col-sm-10">
                <form class="bg-white border px-4 pt-3 rounded" method="POST" action="<?php echo e(route('register')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nom</label>
                                <input class="form-control bg-light" type="text" name="nom" value="<?php echo e(old('nom')); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Prenom</label>
                                <input class="form-control bg-light" type="" name="prenom" value="<?php echo e(old('prenom')); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Email</label>
                            <input class="form-control bg-light" type="email" name="email" required value="<?php echo e(old('email')); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telephone</label>
                                <input class="form-control bg-light" type="text" name="phone" value="<?php echo e(old('phone')); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mot de passe</label>
                                <input class="form-control bg-light" type="password" name="password" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Repeter votre mot de passe</label>
                                <input class="form-control bg-light" type="password" name="password_confirmation" required>
                            </div>
                        </div>
                        
                        
                        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Wilaya</label>
                                    <select name="wilaya" required class="form-control mb-2 wil1 selectpicker" data-live-search="true" data-size="5">
                                        <option value="">Select Wilaya</option> <!-- Add a default option -->
                                        <!-- Add other options here -->
                                    </select>
                                </div>
                            </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nom de l’entreprise</label>
                                <input class="form-control bg-light" type="text" name="nom_entreprise" value="<?php echo e(old('nom_entreprise')); ?>" required>
                            </div>
                        </div>
                        
                    </div>
                    <div class="mb-3">
                        <script src='https://www.google.com/recaptcha/api.js' async defer></script><div class='g-recaptcha' data-sitekey='6LdpzXccAAAAAECuYFNJZGcOayGfDQYBivzKF-Hz'></div>
                    </div>
                    <div class="form-group text-right">
                        <button class="btn btn-primary">Inscription</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
    <script type="text/javascript">
        wilaya1();
        // commune11(09);
        // $('.com1').selectpicker();
        
        // function test() {
        //     var t = $('.wil1').find(":selected").data("id");
        //     $(".com-container").html('<select name="commune" required class="form-control mb-2 com1" data-live-search="true" data-size="5"></select>');
        //     commune11(t);
        //     $('.com1').selectpicker();
        // }

    </script>

    <?php if(old('wilaya')): ?>
    <script>
        $('.wil1').val("<?php echo e(old('wilaya')); ?>").change().selectpicker('refresh');
    </script>
    <?php endif; ?>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.storelayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/auth/inscription.blade.php ENDPATH**/ ?>