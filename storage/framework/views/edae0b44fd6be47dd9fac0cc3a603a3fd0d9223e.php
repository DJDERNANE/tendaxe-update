

<?php $__env->startSection('title', 'Dcuments'); ?>

<?php $__env->startSection('styling'); ?>
   
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/allDomains.css')); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="mt-0 mt-md-5 pt-5">
        
        <!-- start button scroll to top -->

        <button class="scroll-top" id="scrollToTopBtn">
            <i class="bi bi-arrow-up"></i>
        </button>

        <!-- end button scroll to top -->



        <!-- start allDomains page head -->

        <div class="allDomains-head page-head pt-4">
            <div class="container">
                <div class="page-head-wrapper">
                    <h2 class="page-head-title">cahier des charges (exemplaire)</h2>
                    <div class="serach-upload">
                        <div class="search">
                            <form class="form-search">
                                <input class="form-control" type="search" placeholder="Recherche..." aria-label="Search">
                                <button class="btn btn-search" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </form>
                        </div>
                        <a href="<?php echo e(route('specifications.create')); ?>" class="upload-link">
                            <i class="bi bi-upload"></i>
                            <span>importer</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- end allDomains page head -->



        <!-- start section : all-domains -->

        <section class="all-domains">
            <div class="container">
                <div class="row">
                    <?php $__currentLoopData = $domains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                        <a href="<?php echo e(route('domain.show', $item->id)); ?>" class="box-document-folder-link">
                            <i class="bi bi-folder2-open"></i>
                            <h6 class="domaine-name"><?php echo e($item->name); ?></h6>
                        </a>
                    </div>  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                </div>
              
            </div>
        </section>

        <!-- end section : all-domains -->

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.storelayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/documents/domains.blade.php ENDPATH**/ ?>