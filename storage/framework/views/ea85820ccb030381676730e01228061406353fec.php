<?php $attributes = $attributes->exceptProps(['offre' => $offre, 'expired' => $exp]); ?>
<?php foreach (array_filter((['offre' => $offre, 'expired' => $exp]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="my-2">
    <div class="bg-white px-3 pt-3 border rounded">
        <a href="<?php echo e(route('detail', $offre)); ?>" style="text-decoration: none; color: inherit; width: 100%">
            <?php if($offre->etat === 'pending'): ?>
                <div class="text-center">
                    <span class="badge bg-secondary">en attente</span>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-9 col-md-10 font-weight-600">
                    <?php echo e($offre->titre); ?>

                </div>
                <div class="col-3 col-md-2 text-right">
                    <?php if($expired): ?>
                        <img class="" src="<?php echo e(asset('img/icons/lock2.png')); ?>" width="50px">
                    <?php else: ?>
                        <?php if($offre->adminetab->category !== 'AUTRE'): ?>
                            <img class="" src="<?php echo e(asset('img/1.png')); ?>" width="50px">
                        <?php else: ?>
                            <img class="rounded-circle" src="<?php echo e(asset('storage/logo/' . $offre->adminetab->logo)); ?>"
                                width="50px">
                        <?php endif; ?>
                    <?php endif; ?>

                </div>
            </div>
        </a>

        <div class="mt-3 mt-md-2" style="font-size: 88%;">
            <div class="mb-2">
                <span class="font-weight-600">Annonceur: </span>
                <?php if($expired): ?>
                    <img src="<?php echo e(asset('img/icons/lock.png')); ?>">
                    Réservé aux abonnés
                <?php else: ?>
                    <?php echo e($offre->adminetab->nom_etablissement); ?>

                <?php endif; ?>
            </div>
            <div class="mb-2">
                <span class="font-weight-600">Statut: </span>
                <?php echo e($offre->statut); ?>

            </div>
            <?php if($offre->wilaya): ?>
                <div class="mb-2">
                    <span class="font-weight-600">Wilaya: </span>
                    <?php if($expired): ?>
                        <img src="<?php echo e(asset('img/icons/lock.png')); ?>">
                        Réservé aux abonnés
                    <?php else: ?>
                        <?php echo e($offre->wilaya); ?>

                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>
        <div class="mb-2 d-flex">
            <span class="mx-auto mt-2 text-15"> <img src="<?php echo e(asset('img/icons/play.png')); ?>">
                <?php echo e($offre->date_pub); ?></span>
            <span class="mx-auto mt-2 text-15"> <img src="<?php echo e(asset('img/icons/stop.png')); ?>">
                <?php echo e($offre->date_limit); ?></span>
            <div>
                <a href="<?php echo e(route('detail', $offre)); ?>" class="btn btn-sm btn-primary px-3 ml-auto">Detail</a>
                
                <?php if(Auth::check() && Auth::user()->type_user === 'content'): ?>
                    <a href="<?php echo e(route('rep.offers.edit', $offre)); ?>"
                        class="btn btn-sm btn btn-outline-info">Modifier</a>
                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModalCenter"
                        data-id="<?php echo e($offre->id); ?>">Supprimer</button>
                <?php endif; ?>
                <?php if(Auth::check() && (Auth::user()->type_user === 'admin' || Auth::user()->type_user === 'publisher')): ?>
                    <a href="<?php echo e(route('admin.offers.edit', $offre)); ?>"
                        class="btn btn-sm btn btn-outline-info">Modifier</a>
                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModalCenter"
                        data-id="<?php echo e($offre->id); ?>">Supprimer</button>
                <?php endif; ?>
                <?php if(Auth::check() && Auth::user()->type_user === 'admin' && $offre->trashed()): ?>
                    <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#restoremodal"
                        data-id="<?php echo e($offre->id); ?>">Restore</button>
                <?php endif; ?>
                <?php if(Auth::check() && Auth::user()->type_user === 'admin' && $offre->etat === 'pending'): ?>
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#acceptmodal"
                        data-id="<?php echo e($offre->id); ?>">accepter</button>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/components/offre.blade.php ENDPATH**/ ?>