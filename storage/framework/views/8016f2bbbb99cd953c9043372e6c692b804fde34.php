

<?php $__env->startSection('title', 'Dcuments'); ?>

<?php $__env->startSection('styling'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/documents.css')); ?>">

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



        <!-- start allDocuments page head -->

        <div class="allDocuments-head page-head pt-4">
            <div class="container">
                <div class="page-head-wrapper">
                    <h2 class="page-head-title">  <?php echo e($domain->name ?? 'Documents'); ?></h2>
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

        <!-- end documents page head -->



        <!-- start section : all-documents -->

        <section class="all-documents">
            <div class="container">
                <div class="row">
                    <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="box-document">
                            <a href="<?php echo e(route('specification.show', $item->id)); ?>" class="document-link">
                                <div class="paper-folded">
                                    <img src="images/document-face.jpg" alt="" class="document-face-thumbnail">
                                </div>
                                <h6 class="document-name"><?php echo e($item->title); ?></h6>
                            </a>
                            <div class="document-actions">
                                <div class="btns-wrapper">
                                    <button class="btn-action btn-share" data-bs-toggle="tooltip"
                                        data-bs-placement="top"data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Partager">
                                        <i class="bi bi-share"></i>
                                    </button>
                                    <a href="<?php echo e(asset('pictures/Specifications/'.$item->image)); ?>" 
                                        class="btn-action btn-download" 
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Télécharger"
                                        download="<?php echo e('pictures/Specifications/'.$item->image); ?>">
                                        <i class="bi bi-download"></i>
                                     </a>
                                    <button class="btn-action btn-print" data-bs-toggle="tooltip"
                                        data-bs-placement="top"data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Imprimer">
                                        <i class="bi bi-printer"></i>
                                    </button>
                                </div>
                                <a href="<?php echo e(route('specification.show', $item->id)); ?>" class="view-document-link" data-bs-toggle="tooltip"
                                    data-bs-placement="top"data-bs-custom-class="custom-tooltip" data-bs-title="Lire">
                                    <i class="bi bi-book"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </div>      
            </div>
        </section>

        <!-- end section : all-documents -->
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.storelayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/documents/domainDocs.blade.php ENDPATH**/ ?>