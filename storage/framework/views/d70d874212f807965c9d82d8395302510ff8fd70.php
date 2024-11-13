

<?php $__env->startSection('title', 'Brands'); ?>
<?php $__env->startSection('content'); ?>

<div class="container my-5 pt-5">
    <h1>
        Edit Category
    </h1>
            <div class="modal-body w-80">
              
                <form  class="  store-form align-items-center p-2 rounded-3" method="post" action="<?php echo e(route('categories.update', $category->id)); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="">Nom : </label>
                        <input class="form-control" type="text" name="name" value="<?php echo e($category->name); ?>" required>
                    </div>
                    <br>
                    <div class="form-group">
                        
                        <img class="col-3 mx-auto shadow-sm bg-white" width="50" height="50" src="<?php echo e(asset('pictures/Category/'.$category->picture)); ?>" alt="image">
                        <label for="">Changer la Photo : </label>
                        <input class="form-control" type="file" name="picture" >
                    </div>
                    <div class="form-group">
                        <img class="col-3 mx-auto shadow-sm bg-white" width="50" height="50" src="<?php echo e(asset('pictures/Category/Icons/'.$category->icon)); ?>" alt="image">
                        <label for="">Changer la Photo : </label>
                        <input class="form-control" type="file" name="icon" >
                    </div>
                    <div class="form-group">
                        <label for="">Position : </label>
                        <input class="form-control" type="text" name="position" value="<?php echo e($category->position); ?>">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>

               
            </div>
      
</div>    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminStorePanel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/admin/store/editCategory.blade.php ENDPATH**/ ?>