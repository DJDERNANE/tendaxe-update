

<?php $__env->startSection('title', 'Connexion'); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-light" style="height: 100vh">
        <div class="container main pt-5">
            <h2 class="bold text-center">Connexion</h2>
            <form class="bg-white border px-4 pt-3 mx-auto mb-5 rounded" style="max-width: 360px" method="POST"
                action="<?php echo e(route('login')); ?>">
                <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>

                <?php if(session('error')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>

                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control bg-light" type="email" name="email" required value="<?php echo e(old('email')); ?>">
                </div>
                <div class="form-group">
                    <label>mot de pass</label>
                    <input class="form-control bg-light" type="password" name="password" required>
                    <a href="<?php echo e(route('password.request')); ?>">Mot de passe oublié?</a>

                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" id="remember" type="checkbox" name="remember">
                    <label class="form-check-label" for="remember">se souvenir du mot de passe</label>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary w-100">Connexion</button>
                </div>
                <div class="text-center p-2 my-2">
                    Vous n'avez pas un compte? <a href="<?php echo e(route('register')); ?>"> Inscrivez-vous!</a>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.storelayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/auth/login.blade.php ENDPATH**/ ?>