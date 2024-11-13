

<?php $__env->startSection('title', $offre->titre); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-lg main">
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

        <div class="row pt-4 mb-4">
            <div class="offset-sm-3 pr-3 pr-md-0 col-sm-8 col-10">
                <h4 class="font-weight-600 text-dark text-22" style=""><?php echo e($offre->titre); ?></h4>
            </div>
            <?php if(auth()->guard()->check()): ?>
                <?php if(!$expired): ?>
                    <form class="col-1" method="POST" action="<?php echo e(route('favorit.toggle', $offre)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php if($offre->isFavorited()): ?>
                            <button class="text-sm-right" style="background: none; border: none;">
                                <img src="<?php echo e(asset('img/icons/starfill.png')); ?>">
                            </button>
                        <?php else: ?>
                            <button class="text-sm-right" style="background: none; border: none;">
                                <img src="<?php echo e(asset('img/icons/star.png')); ?>">
                            </button>
                        <?php endif; ?>
                    </form>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <hr class="show-md">
        <div class="row pt-4 pt-md-2">
            <div class="col-md-3 border-right">
                
                <div class="text-center">
                    <h6 class="bold mb-4">Infos d’annonceur:</h6>
                    <?php if($expired): ?>
                        <img class="img-fluid mb-4" src="<?php echo e(asset('img/icons/lock3.png')); ?>">
                        <h6 class="bold mb-4">Réservé aux abonnés</h6>
                    <?php else: ?>
                        <?php if($img === 'default'): ?>
                            <img class="img-fluid mb-4" src="<?php echo e(asset('img/2.png')); ?>">
                            <h6 class="bold mb-3"><?php echo e($etab->nom_etablissement); ?></h6>
                        <?php elseif($img): ?>
                            <img class="img-fluid mb-4 rounded-circle" src="<?php echo e(asset('storage/logo/' . $img)); ?>">
                            <h6 class="bold mb-3"><?php echo e($etab->nom_etablissement); ?></h6>
                        <?php endif; ?>
                        <a href="<?php echo e(route('participer', $offre)); ?>" class="btn btn-sm btn-primary px-3 ml-auto p-0 participer mx-auto">Participer
                            <i class="bi bi-microsoft-teams" style="font-size: 20px"></i></a> 
                    <?php endif; ?>
                    <?php if(!$expired && $etab): ?>
                        <?php if($etab->fix): ?>
                            <div class="mb-2">
                                <span class="font-weight-600">fix: </span>
                                <?php echo e($etab->fix); ?>

                            </div>
                        <?php endif; ?>
                        <?php if($etab->fax): ?>
                            <div class="mb-2">
                                <span class="font-weight-600">fax: </span>
                                <?php echo e($etab->fax); ?>

                            </div>
                        <?php endif; ?>
                        <?php if($etab->email): ?>
                            <div class="mb-2">
                                <span class="font-weight-600">Email ou siteweb: </span>
                                <?php echo e($etab->email); ?>

                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <hr>
                <div>
                    <h6 class="text-center my-3 bold">Infos d’annonce</h6>
                    <div class="mb-2">
                        <span class="font-weight-600">Identifiant: </span>
                        <?php echo e($offre->id); ?>

                    </div>
                    <div class="mb-2">
                        <span class="font-weight-600">Statut: </span>
                        <?php echo e($offre->statut); ?>

                    </div>
                    <div class="mb-2">
                        <span class="font-weight-600">Type: </span>
                        <?php echo e($offre->type); ?>

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



                    <div class="mb-2">
                        <b class="font-weight-600">Date publication:</b> <?php echo e($offre->date_pub); ?>

                    </div>
                    <div class="mb-2">
                        <b class="font-weight-600">Date d'échéance:</b> <?php echo e($offre->date_limit); ?>

                    </div>
                    <div class="mb-2">
                        <b class="font-weight-600">Secteur</b>
                        <ul class="pl-4 mt-2" style="">
                            <?php $__currentLoopData = $offre->secteur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($item->secteur); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                
            </div>
            <div class="col-md-9">

                <div class="">
                    <?php if($offre->statut === "Appel d'offres & Consultation"): ?>
                        <hr class="mb-4 mt-0">
                        <div class="m-2">
                            <span>
                                <img class="mr-3" src="<?php echo e(asset('img/icons/indic.png')); ?>">
                                <b class="font-weight-600">Adress de retrait du cahier des charges: </b>

                                <?php if($expired): ?>
                                    <img class="mx-2" src="<?php echo e(asset('img/icons/lock.png')); ?>">
                                    Réservé aux abonnés
                                <?php else: ?>
                                    bureau de marché de <?php echo e($etab->nom_etablissement); ?>

                                <?php endif; ?>
                            </span>
                        </div>
                        <?php if($offre->prix): ?>
                            <div class="m-2">
                                <span>
                                    <img class="mr-3" src="<?php echo e(asset('img/icons/dollar.png')); ?>">
                                    <b>Prix d’cahier d’charge: </b>
                                    <?php if($expired): ?>
                                        <img class="mx-2" src="<?php echo e(asset('img/icons/lock.png')); ?>">
                                        Réservé aux abonnés
                                    <?php else: ?>
                                        <?php echo e($offre->prix . ' Dzd'); ?>

                                    <?php endif; ?>

                                </span>
                            </div>
                        <?php endif; ?>

                    <?php endif; ?>
                </div>

                <hr class="mb-4 mt-0">


                <?php if(!$expired && $offre->description): ?>
                    <div class="my-4">
                        <p>
                            <?php echo nl2br(e($offre->description)); ?>

                        </p>
                    </div>
                <?php endif; ?>

                <?php if($expired): ?>
                    <div class="my-4">
                        <img class="img-fluid" src="<?php echo e(asset('img/exemple.png')); ?>">
                    </div>
                <?php endif; ?>
                <?php if(!$expired): ?>
                    <?php if($offre->img_offre): ?>
                        <div class="my-4">
                            <img class="img-fluid" src="<?php echo e(asset('storage/' . $offre->img_offre)); ?>">
                            <div class="d-flex justify-content-around mt-3">
                                <a href="#" onclick="share()">
                                    <img src="<?php echo e(asset('img/icons/share.png')); ?>" alt="">
                                </a>
                                <a href="#"
                                    onclick="PrintImage('<?php echo e(asset('storage/' . $offre->img_offre)); ?>'); return false;">
                                    <img src="<?php echo e(asset('img/icons/printer.png')); ?>" alt="">
                                </a>
                                <a href="<?php echo e(asset('storage/' . $offre->img_offre)); ?>" download>
                                    <img src="<?php echo e(asset('img/icons/download.png')); ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <hr>
                    <?php endif; ?>
                    <?php if($offre->img_offre2): ?>
                        <div class="my-4">
                            <img class="img-fluid" src="<?php echo e(asset('storage/' . $offre->img_offre2)); ?>">
                            <div class="d-flex justify-content-around mt-3">
                                <a href="#" onclick="share()">
                                    <img src="<?php echo e(asset('img/icons/share.png')); ?>" alt="">
                                </a>
                                <a href="#"
                                    onclick="PrintImage('<?php echo e(asset('storage/' . $offre->img_offre2)); ?>'); return false;">
                                    <img src="<?php echo e(asset('img/icons/printer.png')); ?>" alt="">
                                </a>
                                <a href="<?php echo e(asset('storage/' . $offre->img_offre2)); ?>" download>
                                    <img src="<?php echo e(asset('img/icons/download.png')); ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <hr>
                    <?php endif; ?>

                <?php endif; ?>

                <?php if(auth()->guard()->check()): ?>
                    <?php if($journal_ar || $journal_fr): ?>
                        <div class="row mt-4">
                            <?php if($journal_ar): ?>
                                <div class="col-md-4">
                                    <img class="img-fluid" src="<?php echo e(asset('storage/journal/' . $journal_ar->logo)); ?>"
                                        alt="">
                                </div>
                            <?php endif; ?>

                            <?php if($journal_fr): ?>
                                <div class="col-md-4">
                                    <img class="img-fluid" src="<?php echo e(asset('storage/journal/' . $journal_fr->logo)); ?>"
                                        alt="">
                                </div>
                            <?php endif; ?>
                        </div>
                        <hr>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if(auth()->guard()->guest()): ?>
                    <hr>
                    <div class="my-4 text-center">
                        <a href="<?php echo e(route('register')); ?>" class="btn btn-lg btn-primary">
                            <b>Inscrivez-vous gratuitement</b>
                            <br>
                            avec <span class="">3</span> jours d’essai
                        </a>
                    </div>
                    <hr>
                <?php endif; ?>

                <div class="my-4">
                    La date de remise des offres est donnée à titre indicatif, veuillez confirmer la date réelle auprès de
                    l’annonceur
                </div>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="share" tabindex="-1" role="dialog" aria-labelledby="shareTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="shareTitle">Partager</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex justify-content-around">
                    <!-- Sharingbutton Facebook -->
                    <a class="resp-sharing-button__link"
                        href="https://facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(route('detail', $offre))); ?>"
                        target="_blank" rel="noopener" aria-label="">
                        <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--small">
                            <div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z" />
                                </svg>
                            </div>
                        </div>
                    </a>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>


    <!-- start section : popular-products -->

    <section class="popular-products py-5">
        <div class="container">
            <h2 class="popular-products-title section-title"><span>Produits fréquents</span></h2>
            <div class="row row-cols-2 row-cols-md-4 row-cols-lg-5 row-cols-xl-6">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col">
                        <div class="card product-box">
                            <?php if($product->discount > 0): ?>
                                <span class="discount"> - <?php echo e($product->discount); ?> %</span>
                            <?php endif; ?>
                            <a href="<?php echo e(route('store.product.details', $product->id)); ?>">
                                <img class="mx-auto py-2" src="<?php echo e(asset('pictures/Products/' . $product->picture)); ?>"
                                    alt="Card image cap">
                            </a>
                            <div class="p-2 desc">
                                <a href="<?php echo e(route('store.product.details', $product->id)); ?>">
                                    <p class="product-name"><?php echo e($product->name); ?></p>
                                </a>
                                <p class="marque">
                                    <span>Marque : </span>
                                    <a href="" class="marque-link"><?php echo e($product->brand->name ?? ''); ?></a>
                                </p>

                                <p class="price">
                                    <span class="new-price">
                                        <?php echo $product->price
                                            ? $product->price . ' DA'
                                            : "<span class='marque'><span class='marque-link'>Prix : non mentionné </span> </span>"; ?>

                                    </span>
                                    <?php if($product->price && $product->discount > 0): ?>
                                        <span class="old-price">
                                            <?php echo e($product->price - ($product->price * $product->discount) / 100); ?>

                                        </span>
                                    <?php endif; ?>

                                </p>
                                <form class="" method="post" action="<?php echo e(route('cart.store')); ?>">
                                    <input type="hidden" name="product_id" readonly="" value=<?php echo e($product->id); ?>>
                                    <div class="qte-products">
                                        <span>Qte :</span>
                                        <div class="qte-products-control">
                                            <button type="button" class="text-center"
                                                onclick="changeQty(this, -1)">-</button>
                                            <input class="text-center" id="qty-<?php echo e($product->id); ?>" min="1"
                                                value="1" type="number" name="qte">
                                            <button type="button" class="text-center"
                                                onclick="changeQty(this, 1)">+</button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="btn btn-primary" type="submit"><i class="bi bi-cart"></i> Ajouter
                                            au
                                            panier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <a href="<?php echo e(route('showproducts')); ?>" class="view-more">
                <span>voir plus</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- end section : popular-products -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

    <script>
        function share() {
            if (navigator.share) {
                navigator.share({
                    title: '<?php echo e($offre->titre); ?>',
                    url: '<?php echo e(route('detail', $offre)); ?>'
                }).then(() => {
                    $('#share').modal('hide');
                });
            } else {
                $('#share').modal('show');
            }
        }

        function ImagetoPrint(source) {
            return "<html><head><scri" + "pt>function step1(){\n" +
                "setTimeout('step2()', 10);}\n" +
                "function step2(){window.print();window.close()}\n" +
                "</scri" + "pt></head><body onload='step1()'>\n" +
                "<img src='" + source + "' /></body></html>";
        }

        function PrintImage(source) {
            var Pagelink = "about:blank";
            var pwa = window.open(Pagelink, "_new");
            pwa.document.open();
            pwa.document.write(ImagetoPrint(source));
            pwa.document.close();
        }


        function changeQty(button, delta) {
            // Get the input field that corresponds to the current button
            let input = button.parentElement.querySelector('input[type="number"]');
            let currentValue = parseInt(input.value) || 1;

            // Set new quantity value, ensuring it doesn't go below 1
            let newValue = currentValue + delta;
            if (newValue < 1) newValue = 1;

            // Update the input value with the new quantity
            input.value = newValue;
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.storelayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/offers/detail.blade.php ENDPATH**/ ?>