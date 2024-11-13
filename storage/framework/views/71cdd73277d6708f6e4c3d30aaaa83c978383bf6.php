<?php $__env->startSection('title', 'Notifications'); ?>

<?php $__env->startSection('link_notif', 'text-info'); ?>

<?php $__env->startSection('profile'); ?>
    <div class="container-fluid">
        <h5>Notifications</h5>
        <p>Paramétrez vos alertes mails afin de recevoir uniquement les publications qui vous intéressent !</p>

        <?php if(Auth::user()->current_abonnement): ?>
            <form action="<?php echo e(route('user.notif')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                
                <div class="row">
                    <div class="col-md-3">
                        <h6 class="mt-2">Etat</h6>
                    </div>
                    <div class="col-md-9 d-flex justify-content-between">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="frequence" id="inlineRadio1" checked value="none">
                            <label class="form-check-label" for="inlineRadio1">Desactive</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="frequence" id="inlineRadio2" <?php echo e(($notif->frequence === 'everyday') ? 'checked' : ''); ?> value="everyday">
                            <label class="form-check-label" for="inlineRadio2">Active</label>
                        </div>
                        
                    </div>
                </div>

                <hr>

                
                <div class="row">
                    <div class="col-md-4">
                        <label class="font-weight-500" for="">Mots clés</label>
                        <input class="form-control bg-light" type="text" name="keyword">
                    </div>
                    <div class="col-md-8">
                        <?php if($notif->keyword): ?>
                            <ul class="pl-3" style="list-style: none;">
                                
                                <?php $__currentLoopData = $notif->keyword; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <button type="button" data-id="<?php echo e($item->id); ?>" class="p-0" onclick="keyword2($(this))" style="border: none; background: none;">
                                            <img class="" src="<?php echo e(asset('img/icons/delete.png')); ?>" alt="">
                                        </button>
                                        <span class="mr-2">
                                            <?php echo e($item->keyword); ?>

                                        </span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <hr>

                
                <div class="row">
                    <div class="col-md-4">
                        <label class="font-weight-500" for="">Secteurs</label>
                        <select class="form-control selectpicker" multiple data-live-search="true" name="secteur[]" id="">
                            
                            <?php $__currentLoopData = Auth::user()->current_abonnement->secteur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($sect->id); ?>" data-tokens="<?php echo e($sect->secteur); ?>" ><?php echo e($sect->secteur); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <?php if($notif->secteur): ?>
                            <ul class="pl-3" style="list-style: none;">
                                
                                <?php $__currentLoopData = $notif->secteur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <button type="button" data-id="<?php echo e($item->id); ?>" onclick="sect($(this))" class="p-0" style="border: none; background: none;">
                                            <img class="" src="<?php echo e(asset('img/icons/delete.png')); ?>" alt="">
                                        </button>
                                        <span class="mr-2">
                                            <?php echo e($item->secteur); ?>

                                        </span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <hr>

                
                <div class="row">
                    <div class="col-md-4">
                        <label class="font-weight-500" for="">Wilaya</label>
                        <select class="form-control wil1 selectpicker" multiple data-live-search="true" name="wilaya[]" id=""></select>
                    </div>
                    <div class="col-md-8">
                        <?php if($notif->wilaya): ?>
                            <ul class="pl-3" style="list-style: none;">
                                <?php $__currentLoopData = $notif->wilaya; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <button type="button" class="p-0" data-id="<?php echo e($item->id); ?>" onclick="wilaya($(this))" style="border: none; background: none;">
                                            <img class="" src="<?php echo e(asset('img/icons/delete.png')); ?>" alt="">
                                        </button>
                                        <span class="mr-2">
                                            <?php echo e($item->wilaya); ?>

                                        </span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <label class="font-weight-500" for="">Statuts</label>
                        <select name="statut[]" class="form-control mb-2 selectpicker" multiple title="statut" data-live-search="true">
                            <option value="Mise en demeure et résiliation" data-tokens="Mise en demeure et résiliation">Mise en demeure et résiliation</option>
                            <option value="Adjudication" data-tokens="Adjudication">Adjudication</option>
                            <option value="Vente aux enchères" data-tokens="Vente aux enchères">Vente aux enchères</option>
                            <option value="Infructuosité" data-tokens="Infructuosité">Infructuosité</option>
                            <option value="Annulation" data-tokens="Annulation">Annulation</option>
                            <option value="Attribution de marché" data-tokens="Attribution de marché">Attribution de marché</option>
                            <option value="Prorogation de délai" data-tokens="Prorogation de délai">Prorogation de délai</option>
                            <option value="Appel d'offres & Consultation" data-tokens="Appel d'offres & Consultation">Appel d'offres & Consultation</option>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <?php if($notif->statut): ?>
                            <ul class="pl-3" style="list-style: none;">
                                <?php $__currentLoopData = $notif->statut; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <button type="button" class="p-0" data-id="<?php echo e($item->id); ?>" onclick="statut($(this))" style="border: none; background: none;">
                                            <img class="" src="<?php echo e(asset('img/icons/delete.png')); ?>" alt="">
                                        </button>
                                        <span class="mr-2">
                                            <?php echo e($item->statut); ?>

                                        </span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="text-right">
                    <button class="btn btn-primary px-4">Appliquer</button>
                </div>
            </form>
        <?php else: ?>
            <h2 class="text-center">Aucune abonnement active</h2>
        <?php endif; ?>
        
    </div>

    <script>
        wilaya1();

        $(".wil1 option[value='Aucun']").remove();

        function sect(e) {
            var id = e.data('id'); 
            var url = "/settings/notif/sect/" + id;
            // send delete request 
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    "_token" : "<?php echo e(csrf_token()); ?>"
                },
                success: function(status) {
                    // Do something with the result
                    if(status === 'success'){
                        e.parent('li').remove();
                    }
                }
            });

        }

        function keyword2(e) {
            var id = e.data('id'); 
            var url = "/settings/notif/keyword/" + id;
            // send delete request 
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    "_token" : "<?php echo e(csrf_token()); ?>"
                },
                success: function(status) {
                    // Do something with the result
                    if(status === 'success'){
                        e.parent('li').remove();
                    }
                }
            });
        }

        function wilaya(e) {
            var id = e.data('id'); 
            var url = "/settings/notif/wilaya/" + id;
            // send delete request 
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    "_token" : "<?php echo e(csrf_token()); ?>"
                },
                success: function(status) {
                    // Do something with the result
                    if(status === 'success'){
                        e.parent('li').remove();
                    }
                }
            });
        }

        function statut(e) {
            var id = e.data('id'); 
            var url = "/settings/notif/statut/" + id;
            // send delete request 
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    "_token" : "<?php echo e(csrf_token()); ?>"
                },
                success: function(status) {
                    // Do something with the result
                    if(status === 'success'){
                        e.parent('li').remove();
                    }
                }
            });
        }

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/user/notif.blade.php ENDPATH**/ ?>