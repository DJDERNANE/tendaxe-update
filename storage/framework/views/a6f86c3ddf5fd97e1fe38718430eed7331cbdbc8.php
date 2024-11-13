

<?php $__env->startSection('title', 'Products'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container my-4">
        <div  class="d-flex justify-content-between align-items-center">
            <div class="d-flex">
                <h6><a href="<?php echo e(route('products.pending')); ?>" class="me-2">En Attente</a> </h6>
                <h6><a href="<?php echo e(route('products.all')); ?>" class="active">Accepter</a> </h6>
            </div>
            <div>
                <button class="btn btn-primary rounded-3 supp-btn" disabled id="refresh-btn">Refresh <span id="count1"></span></button>
                <button class="btn btn-danger rounded-3 supp-btn" disabled id="supp-btn">X Supprimer <span id="count2"></span></button>
                <a href="<?php echo e(route('products.create')); ?>">
                    <button class="btn primary ">+ Ajouter</button>
                </a>
                
            </div>
            
        </div>
        <p>score : <?php echo e($score); ?> pts</p>
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
                        Categories 
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                    </ul>
                </div>
                <div class="dropdown bg-light p-1 mx-1 rounded-3">
                    <a class="btn btn-transparent dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Marque 
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                    </ul>
                </div>
                <div class="dropdown bg-light p-1 mx-1 rounded-3">
                    <a class="btn btn-transparent dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Quantite 
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                    </ul>
                </div>
                <button class="primary border-0 px-4 mx-1 rounded-3">Filter</button>
            </div>
           
        </div>
        <table class="table text-center ">
            <thead>
              <tr>
                <th scope="col"><input type="checkbox" name="all" id="select-all"></th>
                <th scope="col">#</th>
                <th scope="col">Ref</th>
                <th scope="col">Nom</th>
                <th scope="col">Marque</th>
                <th scope="col">Prix</th>
                <th scope="col">Quantite</th>
                <th scope="col">Remise</th>
                <th scope="col">Ajouter Qty</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><input type="checkbox" name="item[]" value="<?php echo e($item->id); ?>"></td>
                <th scope="row"><?php echo e($item->id); ?></th>
                <td><?php echo e($item->ref); ?></td>
                <td> <img class="col-3 shadow-sm bg-white" width="40" height="40" src="<?php echo e(asset('pictures/Products/'.$item->picture)); ?>" alt="payement methode"><?php echo e($item->name); ?></td>
                <td><?php echo e($item->brand->name); ?></td>
                <td><?php echo e($item->price); ?> DA</td>
                <td><?php echo e($item->quantity); ?></td>
                <td><?php echo e($item->discount); ?></td>
                <td>
                    <button class="add-qty px-4 rounded fs-5 border-0">
                        +
                    </button>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            
            </tbody>
          </table>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAll = document.querySelector('#select-all');
            const items = document.querySelectorAll('input[name="item[]"]');
            const suppBtn = document.getElementById('supp-btn');
            const refreshBtn = document.getElementById('refresh-btn');
    
            // Function to log and manage selected items
            function logSelectedItems() {
                const selectedItems = Array.from(items).filter(item => item.checked);
                const count1 = document.getElementById('count1');
                const count2 = document.getElementById('count2');
                if (selectedItems.length == 0) {
                    suppBtn.disabled = true;
                    refreshBtn.disabled = true;
                    count1.innerHTML = ""; // Clear the text or set to default text if needed
                    count2.innerHTML = "";
                } else {
                    suppBtn.disabled = false;
                    refreshBtn.disabled = false;
                    count1.innerHTML = "("+selectedItems.length+")";
                    count2.innerHTML = "("+selectedItems.length+")"; // Set the actual number or use `selectedItems.length`
                }
            }

    
            // Initially call to set button state
            logSelectedItems();
    
            // Event listener for 'select all' checkbox
            selectAll.addEventListener('change', function() {
                items.forEach(item => {
                    item.checked = selectAll.checked;
                });
                logSelectedItems();
            });
    
            // Event listeners for each checkbox
            items.forEach(item => {
                item.addEventListener('change', logSelectedItems);
            });
    
            // Handle the delete button click event
            $('.supp-btn').click(function(event) {
                event.preventDefault();
                if (confirm('Are you sure you want to delete this item?')) {
                    // Recompute selectedValues just before the request
                    const selectedValues = Array.from(items)
                                               .filter(item => item.checked)
                                               .map(item => item.value);
                    $.ajax({
                        url: '/admin/store/categories/delete',
                        type: 'DELETE',
                        data: JSON.stringify({
                            ids: selectedValues,
                            '_token': $('meta[name="csrf-token"]').attr('content')
                        }),
                        contentType: 'application/json',
                        success: function(response) {
                            console.log('res : ' + response);
                            selectedValues.forEach(id => {
                                $('input[value="' + id + '"]').closest('tr').remove();
                            });
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.storepanel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/store/panel/products.blade.php ENDPATH**/ ?>