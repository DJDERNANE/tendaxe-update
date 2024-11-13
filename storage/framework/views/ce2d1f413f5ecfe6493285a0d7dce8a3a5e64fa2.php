<?php $__env->startSection('title', 'Offres'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid px-md-5 py-5"
        style="background: url(<?php echo e(asset('img/banner/books.jpg')); ?>) no-repeat center center; margin-top: 66px; background-size: cover; max-height: 230px">
        <div class="for-centrlize-v">
            <h3 class="text-white bold my-4">Annonces des marchées publics</h3>
        </div>

    </div>
    <div class="container-lg">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.alert','data' => []]); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        
        <div class="row">
            <div class="col-md-3 pr-md-1">
                <h1 class="text-center my-5">
                    Filtre
                </h1>
                <form class="bg-white p-2 border rounded mt-2 hide-md" method="GET" action="<?php echo e(route('search')); ?>">
                    
                    
                    <div class="input-group mb-2">
                        <input type="text" class="form-control bg-light" style="font-size: small" placeholder="Mot clé"
                            name="keyword" value="<?php echo e(old('keyword')); ?>">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-sm btn-primary" type="button" id="button-addon2">
                                <img src="<?php echo e(asset('img/icons/search2.png')); ?>" alt="">
                            </button>
                        </div>
                    </div>

                    <select name="wilaya[]" class="form-control mb-2 wil1 selectpicker" multiple
                        data-style="btn-white border" data-size="5" title="Toutes les wilayas">
                    </select>
                    <select name="statut[]" class="form-control mb-2 selectpicker" multiple data-style="btn-white border"
                        title="statut" data-size="6">
                        <option value="Appel d'offres & Consultation" data-tokens="Appel d'offres & Consultation"
                            <?php echo e(old('statut') && in_array('Appel d\'offres & Consultation', old('statut')) ? 'selected' : ''); ?>>
                            Appel d'offres & Consultation</option>
                        <option value="Attribution de marché" data-tokens="Attribution de marché"
                            <?php echo e(old('statut') && in_array('Attribution de marché', old('statut')) ? 'selected' : ''); ?>>
                            Attribution de marché</option>
                        <option <?php echo e(old('statut') && in_array('Sous-traitance', old('statut')) ? 'selected' : ''); ?>

                            value="Sous-traitance" data-tokens="Sous-traitance">Sous-traitance</option>
                        <option <?php echo e(old('statut') && in_array('Prorogation de délai', old('statut')) ? 'selected' : ''); ?>

                            value="Prorogation de délai" data-tokens="Prorogation de délai">Prorogation de délai</option>
                        <option <?php echo e(old('statut') && in_array('Annulation', old('statut')) ? 'selected' : ''); ?>

                            value="Annulation" data-tokens="Annulation">Annulation</option>
                        <option <?php echo e(old('statut') && in_array('Infructuosité', old('statut')) ? 'selected' : ''); ?>

                            value="Infructuosité" data-tokens="Infructuosité">Infructuosité</option>
                        <option <?php echo e(old('statut') && in_array('Adjudication', old('statut')) ? 'selected' : ''); ?>

                            value="Adjudication" data-tokens="Adjudication">Adjudication</option>
                        <option <?php echo e(old('statut') && in_array('Vente aux enchères', old('statut')) ? 'selected' : ''); ?>

                            value="Vente aux enchères" data-tokens="Vente aux enchères">Vente aux enchères</option>
                        <option
                            <?php echo e(old('statut') && in_array('Mise en demeure et résiliation', old('statut')) ? 'selected' : ''); ?>

                            value="Mise en demeure et résiliation" data-tokens="Mise en demeure et résiliation">Mise en
                            demeure et résiliation</option>
                    </select>
                    <select name="secteur[]" class="form-control mb-2 selectpicker" data-dropup-auto="false"
                        data-style="btn-white border" multiple title="Secteur" data-size="6">
                        <?php if($secteurs): ?>
                            <?php $__currentLoopData = $secteurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($sect->id); ?>" data-tokens="<?php echo e($sect->secteur); ?>"
                                    <?php echo e(old('secteur') && in_array($sect->id, old('secteur')) ? 'selected' : ''); ?>>
                                    <?php echo e($sect->secteur); ?> ><?php echo e($sect->secteur); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                    <select name="type" class="form-control mb-2 selectpicker"data-style="btn-white border"
                        title="Type">
                        <option value="national" data-tokens="national" <?php echo e(old('type') === 'national' ? 'selected' : ''); ?>>
                            National</option>
                        <option value="international" data-tokens="national et international"
                            <?php echo e(old('type') === 'international' ? 'selected' : ''); ?>>National & International</option>
                    </select>
                    <div class="form-group mb-2">
                        <input class="bg-light form-control" type="text" style="font-size: small" name="annonceur"
                            placeholder="Annonceur" value="<?php echo e(old('annonceur')); ?>">
                    </div>

                    <select class="form-control mb-2 selectpicker" onchange="customDate(this, 'pub')" name="pub"
                        title="Date de publication" data-live-search="false">
                        <option value="today">Ajourdhui</option>
                        <option value="week">Cette semaine</option>
                        <option value="month">Ce mois</option>
                        <option value="custom">Personalisé</option>
                    </select>

                    <div class="collapse mb-2" id="pub">
                        <input class="form-control" type="date" name="custom_pub">
                    </div>

                    <select class="form-control mb-2 selectpicker" onchange="customDate(this, 'limit')" name="limit"
                        title="Date limit" data-live-search="false">
                        <option value="today">Ajourdhui</option>
                        <option value="week">Cette semaine</option>
                        <option value="month">Ce mois</option>
                        <option value="custom">Personalisé</option>
                    </select>

                    <div class="collapse mb-2" id="limit">
                        <input class="form-control" type="date" name="custom_limit">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Rechercher</button>

                </form>
                <div class="show-md mx-2">
                    <hr>

                    <h4 class="text-center bold">Filtres</h4>
                    <p class="text-muted text-center">
                        Selectionnez les annonces qui vous convient selon le secteur d’activite, wilaya, statue, annonceur
                        et la date de publication.
                    </p>
                    <button id="collapse_button" class="btn btn-primary w-100 font-weight-600" type="button"
                        data-toggle="collapse" data-target="#mobile_filter" aria-expanded="false"
                        aria-controls="mobile_filter">Afficher les filtres</button>
                    <hr>

                    <div class="collapse" id="mobile_filter">
                        <form class="bg-white p-2 border rounded mt-2" method="GET" action="<?php echo e(route('search')); ?>">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control bg-light" style="font-size: small"
                                    placeholder="Mot clé" name="keyword" value="<?php echo e(old('keyword')); ?>">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-sm btn-primary" type="button"
                                        id="button-addon2">
                                        <img src="<?php echo e(asset('img/icons/search2.png')); ?>" alt="">
                                    </button>
                                </div>
                            </div>

                            <select name="wilaya[]" class="form-control mb-2 wil1 selectpicker" multiple
                                data-style="btn-white border" data-size="5" title="Toutes les wilayas">
                            </select>
                            <select name="statut[]" class="form-control mb-2 selectpicker" multiple
                                data-style="btn-white border" title="statut" data-size="6">
                                <option value="Appel d'offres & Consultation" data-tokens="Appel d'offres & Consultation"
                                    <?php echo e(old('statut') && in_array('Appel d\'offres & Consultation', old('statut')) ? 'selected' : ''); ?>>
                                    Appel d'offres & Consultation</option>
                                <option value="Attribution de marché" data-tokens="Attribution de marché"
                                    <?php echo e(old('statut') && in_array('Attribution de marché', old('statut')) ? 'selected' : ''); ?>>
                                    Attribution de marché</option>
                                <option <?php echo e(old('statut') && in_array('Sous-traitance', old('statut')) ? 'selected' : ''); ?>

                                    value="Sous-traitance" data-tokens="Sous-traitance">Sous-traitance</option>
                                <option
                                    <?php echo e(old('statut') && in_array('Prorogation de délai', old('statut')) ? 'selected' : ''); ?>

                                    value="Prorogation de délai" data-tokens="Prorogation de délai">Prorogation de délai
                                </option>
                                <option <?php echo e(old('statut') && in_array('Annulation', old('statut')) ? 'selected' : ''); ?>

                                    value="Annulation" data-tokens="Annulation">Annulation</option>
                                <option <?php echo e(old('statut') && in_array('Infructuosité', old('statut')) ? 'selected' : ''); ?>

                                    value="Infructuosité" data-tokens="Infructuosité">Infructuosité</option>
                                <option <?php echo e(old('statut') && in_array('Adjudication', old('statut')) ? 'selected' : ''); ?>

                                    value="Adjudication" data-tokens="Adjudication">Adjudication</option>
                                <option
                                    <?php echo e(old('statut') && in_array('Vente aux enchères', old('statut')) ? 'selected' : ''); ?>

                                    value="Vente aux enchères" data-tokens="Vente aux enchères">Vente aux enchères
                                </option>
                                <option
                                    <?php echo e(old('statut') && in_array('Mise en demeure et résiliation', old('statut')) ? 'selected' : ''); ?>

                                    value="Mise en demeure et résiliation" data-tokens="Mise en demeure et résiliation">
                                    Mise en demeure et résiliation</option>
                            </select>
                            <select name="secteur[]" class="form-control mb-2 selectpicker" data-dropup-auto="false"
                                data-style="btn-white border" multiple title="Secteur" data-size="6">
                                <?php if($secteurs): ?>
                                    <?php $__currentLoopData = $secteurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($sect->id); ?>" data-tokens="<?php echo e($sect->secteur); ?>"
                                            <?php echo e(old('secteur') && in_array($sect->id, old('secteur')) ? 'selected' : ''); ?>>
                                            <?php echo e($sect->secteur); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                            <select name="type" class="form-control mb-2 selectpicker"data-style="btn-white border"
                                title="Type">
                                <option value="national" data-tokens="national">National</option>
                                <option value="international" data-tokens="national et international">National &
                                    International</option>
                            </select>
                            <div class="form-group mb-2">
                                <input class="bg-light form-control" type="text" style="font-size: small"
                                    name="annonceur" placeholder="Annonceur" value="<?php echo e(old('annonceur')); ?>">
                            </div>

                            <select class="form-control mb-2 selectpicker" onchange="customDate(this, 'pub_mob')"
                                name="pub" title="Date de publication" data-live-search="false">
                                <option value="today">Ajourdhui</option>
                                <option value="week">Cette semaine</option>
                                <option value="month">Ce mois</option>
                                <option value="custom">Personalisé</option>
                            </select>

                            <div class="collapse mb-2" id="pub_mob">
                                <input class="form-control" type="date" name="custom_pub">
                            </div>

                            <select class="form-control mb-2 selectpicker" onchange="customDate(this, 'limit_mob')"
                                name="limit" title="Date limit" data-live-search="false">
                                <option value="today">Ajourdhui</option>
                                <option value="week">Cette semaine</option>
                                <option value="month">Ce mois</option>
                                <option value="custom">Personalisé</option>
                            </select>

                            <div class="collapse mb-2" id="limit_mob">
                                <input class="form-control" type="date" name="custom_limit">
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Rechercher</button>

                        </form>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-md-9 pl-md-1">
                <div class="carousel-inner my-6" style="margin: 20px 0px;">
                    <?php $__currentLoopData = $pubs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-item <?php echo e($index == 0 ? 'active' : ''); ?>">
                            <img src="<?php echo e(asset('pictures/Pubs/' . $item->picture)); ?>"
                                class="d-block w-100 banner-img" alt="banner-image">
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <?php if(session('message')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('message')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                
                <?php if($offres->count()): ?>
                    <?php $__currentLoopData = $offres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.offre','data' => ['exp' => $expired,'offre' => $offre]]); ?>
<?php $component->withName('offre'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['exp' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($expired),'offre' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($offre)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <h3 class="text-center">Pas de resultat</h3>
                <?php endif; ?>
                <div class="mt-5">
                    <?php echo e($offres->links()); ?>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        wilaya1();
        $(".wil1 option[value='Aucun']").remove();
        $(".wil1").selectpicker('refresh');

        function customDate(e, type) {

            var target = $('#' + type);

            if (e.value === 'custom') {
                target.collapse('show');
            } else {
                target.collapse('hide');
            }
        }

        $('#mobile_filter').on('hide.bs.collapse', function() {
            $('#collapse_button').html('Afficher les filtres');
        });

        $('#mobile_filter').on('show.bs.collapse', function() {
            $('#collapse_button').html('Masquer les filtres');
        });
    </script>

    <?php if(old('wilaya')): ?>
        <script>
            var wilayas = <?php echo json_encode(old('wilaya'), 15, 512) ?>;
            $('.wil1').val(wilayas).selectpicker('refresh');
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.storelayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/offers/search.blade.php ENDPATH**/ ?>