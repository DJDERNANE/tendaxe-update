

<?php $__env->startSection('title', 'Commandes'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container my-4 orders">
        <div  class="d-flex justify-content-between align-items-center">
            <div class="d-flex ">
                <h3>Commandes</h3>

                <p class="mx-2 mt-2">all (<?php echo e($orderItems->count()); ?>)</p>
                
            </div>
            
            <div>
                
                <button type="button" class="btn primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Ajouter Commande
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">sélectionner un client</h5>
                            </div>
                            <div class="modal-body">
                                <form class="d-flex bg-light store-form align-items-center p-2 rounded-3">

              
                                    <input type="text" placeholder="search..." class="px-2 py-1 bg-transparent border-0 search">
                                    <button class="px-2 border-0  bg-transparent"><i class="bi bi-search text-primary text-black fs-5 "></i></button>
                    
                    
                                </form>

                                <ul class="list-group my-4">
                                    <?php $__currentLoopData = $clientStores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="list-group-item"><a href="<?php echo e(route('order.products',$item->client->user->id)); ?>"><?php echo e($item->client->user->nom); ?> <?php echo e($item->client->user->prenom); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
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
            <div class="d-flex">
                <div class="dropdown bg-light p-1 mx-1 rounded-3">
                    <a class="btn btn-transparent dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        status 
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                    </ul>
                </div>
                <div class="dropdown bg-light p-1 mx-1 rounded-3">
                    <a class="btn btn-transparent dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Paiement 
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                    </ul>
                </div>
                <div class="dropdown bg-light p-1 mx-1 rounded-3">
                    <input type="date" placeholder="Date" name="date">
                </div>
                <button class="primary border-0 px-4 mx-1 rounded-3">Filter</button>
            </div>
           
        </div>
        <table class="table text-center ">
            <thead>
              <tr>
                <th scope="col">Num</th>
                <th scope="col">Montant</th> 
                <th scope="col">Client</th>
                <th scope="col">Telephone</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                
              </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->id); ?></td>
                    <td> <?php echo e($item->price); ?> DA</td>
                    <td>250000 DA</td>
                    <td><?php echo e($item->order->user->nom); ?> <?php echo e($item->order->user->prenom); ?></td>
                    <td><?php echo e($item->order->user->phone); ?></td>
                    <td><?php echo e($item->order->created_at); ?></td>
                    <td>
                        <select name="" id="">
                            <option value="" class="text-danger">En Attente</option>
                            <option value="" class="text-primary">En Route</option>
                            <option class="text-success" value="">Livree</option>
                        </select>
                    </td>
                    
                    
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
            
            </tbody>
          </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.storepanel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/store/panel/orders.blade.php ENDPATH**/ ?>