

<?php $__env->startSection('title', 'Boutiques'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container my-5 pt-5">
        <div class="d-flex">
           
            <h6><a href="<?php echo e(route('stores.accepted')); ?>" class="me-2">active</a> </h6>
            <h6><a href="<?php echo e(route('stores.pending')); ?>" class="active ms-2">en attente</a> </h6>

        </div>

        <div class="d-flex justify-content-between align-items-center my-4 p-2 bg-white rounded-3 shadow ">
            <div class="pl-5 py-1 pr-2 m-0 d-flex justify-content-between align-items-center store-navbar text-white">
                <form action="<?php echo e(route('stores.pending')); ?>" method="GET" class="d-flex bg-light store-form align-items-center p-2 rounded-3 text-black">
                    <?php echo csrf_field(); ?>

                    <input name="name" type="text" placeholder="search..." class="px-2 py-1 bg-transparent border-0 search">
                    <button class="px-2 border-0  bg-transparent"><i
                            class="bi bi-search text-primary text-black fs-5 "></i></button>


                </form>

            </div>


        </div>
        <table class="table text-center ">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Nom de Boutique</th>
                    <th scope="col">Logo</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->user->nom); ?></td>
                        <td><?php echo e($item->user->email); ?></td>
                        <td><?php echo e($item->user->phone); ?></td>
                        <td><?php echo e($item->storeName); ?></td>
                        <td> <img class="col-3 shadow-sm bg-white" width="50" height="50"
                                src="<?php echo e(asset('pictures/storeLogos/' . $item->logo)); ?>" alt="image"></td>
                        <td>
                          
                                <a href="<?php echo e(route('store.active', $item->id)); ?>">
                                    <button class="btn btn-success">
                                        <i class="bi bi-patch-check-fill"></i>
                                    </button>
                                </a>
                                <a href="<?php echo e(route('admin.store.show', $item->id)); ?>">
                                    <button class="btn btn-primary">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </a>
                          
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminStorePanel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/admin/store/stores.blade.php ENDPATH**/ ?>