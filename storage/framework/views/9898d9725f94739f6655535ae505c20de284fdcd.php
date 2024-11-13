

<?php $__env->startSection('title', 'Facteurs Proforma'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container my-5 pt-5">
        <div  class="d-flex justify-content-between align-items-center">
            <h3>Facteurs Proforma</h3>
            <div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    
                </div>
                
            </div>
            
        </div>
        
        <div class="d-flex justify-content-between align-items-center my-4 p-2 bg-white rounded-3 shadow ">
            <div
            class="pl-5 py-1 pr-2 m-0 d-flex justify-content-between align-items-center store-navbar text-white">
            <form class="d-flex bg-light store-form align-items-center p-2 rounded-3">

              
                <input type="text" placeholder="search..." class="px-2 py-1 bg-transparent border-0 search">
                <button class="px-2 border-0  bg-transparent"><i class="bi bi-search text-primary text-black fs-5 "></i></button>


            </form>
     
        </div>
           
           
        </div>
        <table class="table text-center ">
            <thead>
              <tr>
                <th scope="col">Raison</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Details</th>
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $facteurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><?php echo e($item->raison); ?></th>
                <td><?php echo e($item->fName); ?> <?php echo e($item->lName); ?></td>
                <th scope="row"><?php echo e($item->email); ?></th>
                <th scope="row"><?php echo e($item->phone); ?></th>
                <th scope="row">
                    <a href="<?php echo e(route('facture.show', $item->id)); ?>">
                        <button class="btn btn-primary">
                            Voir
                        </button>
                    </a>
                </th>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
            
            </tbody>
          </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminStorePanel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/admin/store/facteurProforma.blade.php ENDPATH**/ ?>