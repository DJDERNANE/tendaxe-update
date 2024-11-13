

<?php $__env->startSection('title', 'Edit Produit'); ?>
<?php $__env->startSection('content'); ?>
    <div class="bg-white rounded-3 container my-5  p-4 ">
        <h3>Edit Produit</h3>
        <form action="<?php echo e(route('admin.product.update', $product->id)); ?>" method="post" enctype="multipart/form-data"
            class="fs-5 my-4 addproduct">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-8">
                    <div class="row">
                        <div class="my-4 col-6">
                            <label for="name" class="my-2">Nom de produit:</label> <br>
                            <input type="text" class="px-2 py-1 bg-light border-0 rounded my-2" id="name"
                                value="<?php echo e($product->name); ?>" name="name">
                        </div>
                        <div class="my-4 col-6  ">
                            <label for="ref" class="my-2">Reference:</label> <br>
                            <input type="text" class="px-2 py-1 bg-light border-0 rounded my-2" id="ref"
                                value="<?php echo e($product->ref); ?>" name="ref">
                        </div>

                        <div class="my-4 col-6">
                            <label for="boutique">Boutique</label> <br>
                            <input type="text" class="px-2 py-1 bg-light border-0 rounded my-2" id="ref"
                                value="<?php echo e($product->store->storeName); ?>" name="boutique" readonly>
                        </div>
                        <div class="my-4 col-6">
                            <label for="boutique">Valeur</label> <br>
                            <input type="text" class="px-2 py-1 bg-light border-0 rounded my-2" id="ref"
                                value="<?php echo e($product->valeur); ?>" name="valeur" >
                        </div>
                        <div class="col-5">
                            

                        </div>
                        <div class="my-4 col-10">
                            <label for="quantity" class="my-2">Quantite:</label>
                            <div class="row">
                                <div class="col-8">
                                    <input type="text" class="px-2 py-1 bg-light border-0 rounded my-2" id="quantity"
                                        name="qty" value="<?php echo e($product->quantity); ?>">
                                </div>
                                


                            </div>

                        </div>

                        <div class="my-4 col-6">
                            <label for="price" class="my-2">Prix:</label> <br>
                            <input type="text" class="px-2 py-1 bg-light border-0 rounded my-2" id="price"
                                name="price" value="<?php echo e($product->price); ?>">
                        </div>
                        <div class="my-4 col-6 ">
                            <label for="remise" class="my-2">Remise:</label> <br>
                            <input type="number" class="px-2 py-1 bg-light border-0 rounded my-2" id="remise"
                                name="discount" min="0" value="<?php echo e($product->discount); ?>">
                        </div>
                        <div id="dateremise">
                            <div class="my-4 col-6">
                                <label for="debut" class="my-2">Debut:</label> <br>
                                <input type="date" class="px-2 py-1 bg-light border-0 rounded my-2" id="debut"
                                    name="debut">
                            </div>
                            <div class="my-4 col-6  ">
                                <label for="fin" class="my-2">Fin:</label> <br>
                                <input type="date" class="px-2 py-1 bg-light border-0 rounded my-2" id="fin"
                                    name="fin">
                            </div>
                        </div>

                        <div class="my-4 col-6">
                            <label for="cat">Categories</label>
                            <select name="cats[]" id="categories" multiple>
                                <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"
                                        <?php echo e(in_array($category->id, $selectedCategories) ? 'selected' : ''); ?>>
                                        <?php echo e($category->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>   
                        </div>

                        <div class="my-4 col-12">
                            <label for="brand">Marque : </label>
                            <div class="row">
                                <div class="col-9">
                                    <select name="brand" id="brand" class="px-2 py-2 bg-light border-0 rounded my-2">
                                        <br>
                                        <option value="" selected>Selectionner</option>
                                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($item->id = $product->brand_id): ?>
                                                <option value="<?php echo e($item->id); ?>" selected><?php echo e($item->name); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                

                            </div>


                        </div>
                    </div>


                </div>
                <div class="col-4">
                    <div class="col-12">
                        <div class="my-3">
                            <label for="">Image : </label> <br>
                            <img width="200" height="100" class=" my-2"
                                src="<?php echo e(asset('pictures/Products/' . $product->picture)); ?>" alt="photo">
                            <input type="file" name="picture">
                        </div>
                        <div>
                            <label for="">Gallery : </label> <br>
                            <?php $__currentLoopData = $product->pictures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <img width="80" height="80" class=" m-2"
                                    src="<?php echo e(asset('pictures/Products/pictures/' . $product->picture . '/' . $item->path)); ?>"
                                    alt="photo">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <input type="file" name="gallery[]" multiple>
                        </div>
                    </div>
                </div>
                <div class="col-12 my-4">
                    <label for="desc"> Description</label> <br>
                    <textarea name="desc" id="desc" rows="8" class="col-12 my-2 rounded-3 p-2" placeholder="text ... "><?php echo e($product->primary_desc); ?></textarea>
                </div>
                <div class="col-12 my-4">
                    <label for="details"> Description Detaile</label><br>
                    <textarea name="details" id="details" rows="8" class="col-12 my-2 rounded-3 p-2" placeholder="text ... "><?php echo e($product->full_desc); ?></textarea>
                </div>

                <div class="col-12 my-4">
                    <label for="files"> Fichiers joints</label> <br>
                    <input type="file" name="files[]" multiple id="files" class="my-2 ">
                </div>
                <div class="col-12 text-end">
                    <button type="submit" class="primary rounded-3 py-1 px-5 border-0"> Valider </button>
                </div>



            </div>


        </form>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const remiseValue = document.querySelector('#remise');
            const remiseDate = document.querySelector('#dateremise');
            if (remiseValue.value > 0) {
                remiseDate.style.display = 'flex';
            } else {
                remiseDate.style.display = 'none';
            }

            remiseValue.addEventListener('change', function() {
                if (remiseValue.value > 0) {
                    remiseDate.style.display = 'flex';
                } else {
                    remiseDate.style.display = 'none';
                }
            });
        });
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#desc'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#details'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        new MultiSelectTag('categories', {
            rounded: true, // default true
            shadow: true, // default false
            placeholder: 'Search', // default Search...
            tagColor: {
                textColor: '#327b2c',
                borderColor: '#92e681',
                bgColor: '#eaffe6',
            },
            onChange: function(values) {
                console.log(values)
            }
        })
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminStorePanel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tendaxe\resources\views/admin/store/productDetails.blade.php ENDPATH**/ ?>