<?php $__env->startSection('title', 'list offers'); ?>

<?php $__env->startSection('content'); ?>
    <div class="text-center h3">List offers</div>

	<?php if(session('success')): ?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		<div class="alert-message">
			<?php echo e(session('success')); ?>

		</div>
	</div>
	<?php endif; ?>

	<?php if(session('error')): ?>
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		<div class="alert-message">
			<?php echo e(session('error')); ?>

		</div>
	</div>
	<?php endif; ?>

    <div class="bg-white p-3">
        <?php if($offres): ?>
            <?php $__currentLoopData = $offres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.offre','data' => ['exp' => false,'offre' => $offer]]); ?>
<?php $component->withName('offre'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['exp' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'offre' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($offer)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($offres->links()); ?>

        
        <!-- delete modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalCenterTitle">Confirmation</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        Voulez vous supprimer cet offre?
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">non</button>
	        <form method="POST" action="<?php echo e((Auth::user()->type_user !== 'content') ? route('admin.offre.destroy') : route('rep.offre.destroy')); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <input type="number" name="offre" id="offre_id" hidden>
                <button class="btn btn-primary">Oui</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>

    <script type="text/javascript">

        $('#exampleModalCenter').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var id = button.data('id') 
            
			$('#offre_id').val(id);
		});
    </script>

        <?php else: ?>
            <div class="h4 text-center">no offers found</div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/admin/offers.blade.php ENDPATH**/ ?>