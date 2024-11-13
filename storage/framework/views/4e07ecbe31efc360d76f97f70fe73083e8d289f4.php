

<?php $__env->startSection('title', 'Acceuil'); ?>

<?php $__env->startSection('styling'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/home-edit.css')); ?>">
    <style>
        .whatsApp-contact-link {
            display: none;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(session('success')): ?>
        <script>
            alert("<?php echo e(session('success')); ?>");
        </script>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(session('error')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="row py-4 flex-row flex-md-column-reverse flex-lg-row contact-page-parent">
        <h1 class="text-center">
            Contactez-Nous
        </h1>

        <section class="contact-us contact-page">
            <div class="container contact-us-wrapper contact-page" >
                <div>
                    <form class="bg-white border px-4 pt-3 rounded" method="POST" action="<?php echo e(route('contact.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input class="form-control bg-light" type="text" name="nom" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sujet</label>
                                    <input class="form-control bg-light" type="text" name="subject" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Email</label>
                                <input class="form-control bg-light" type="email" name="email" required value="">
                            </div>
    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telephone</label>
                                    <input class="form-control bg-light" type="text" name="phone" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
    
                                    <label>Paye</label>
                                    <input class="form-control bg-light" type="paye" name="paye" required>
    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
    
                                    <label>Region</label>
                                    <input class="form-control bg-light" type="region" name="region" required>
    
                                </div>
                            </div>
    
                            <div class="col-12">
                                <div class="form-group">
    
                                    <label>Message</label> <br>
    
                                    <textarea class="form-control bg-light" name="message" id="" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group w-100 text-right">
                                <button class="btn btn-primary">Envoyer</button>
                            </div>
                    </form>
                </div>
                
            </div>
            <div class="contact-details"  >
                <div class="contact-phone">
                    <h5 class="contact-phone-title">Contactez-nous par téléphone</h5>
                    <div class="contact-phone-box">
                        <i class="bi bi-telephone-fill"></i>
                        <span class="phone-number phone-number-national">07 78 33 00 81
                        </span>
                    </div>
                    <div class="contact-phone-international">
                        <div class="contact-phone-box">
                            <i class="bi bi-telephone-fill"></i>
                            <span class="phone-number phone-number-international">+213 778 33 00 81
                            </span>
                        </div>
                        <p>International sales <br> and experts advices</p>
                    </div>
                </div>
                <div class="contact-adress">
                    <h5 class="contact-adress-title">notre siège</h5>
                    <div class="contact-adress-box">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span class="adress">LOT N 141 P 10 Rue Aouicha Amer BOUINAN- BLIDA</span>
                    </div>
                </div>
            </div>

        </section>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.storelayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/contact.blade.php ENDPATH**/ ?>