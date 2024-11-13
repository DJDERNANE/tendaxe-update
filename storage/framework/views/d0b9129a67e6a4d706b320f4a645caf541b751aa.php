<?php $__env->startSection('title', 'Mes Offres'); ?>

<?php $__env->startSection('link_my_offers', 'text-info'); ?>

<?php $__env->startSection('profile'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h5>Mes Offres</h5>
            </div>
            <?php if(Auth::user()->etat === "active"): ?>
                <div class="col-md-6 text-right">
                    <a class="btn btn-sm btn-primary px-3" href="<?php echo e(route('offre.add')); ?>">Ajouter un offre</a>
                </div>
            <?php endif; ?>
        </div>
        <?php if($offres->isNotEmpty()): ?>
            <?php $__currentLoopData = $offres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.offre','data' => ['exp' => false,'offre' => $offre]]); ?>
<?php $component->withName('offre'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['exp' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'offre' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($offre)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php echo e($offres->links()); ?>

        <?php else: ?>
            <div class="h1 text-center mt-5">Aucun offre Ajouté</div>
            <?php if(Auth::user()->etat === "active"): ?>
                <div class="text-center">
                    <a class="text-center" href="<?php echo e(route('offre.add')); ?>">Click ici pour ajouter un offre</a>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/user/mes_offres.blade.php ENDPATH**/ ?>