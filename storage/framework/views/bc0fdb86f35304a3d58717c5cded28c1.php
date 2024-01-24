<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
    <h1>Products</h1>
    <div>
        <?php if(session()->has('success')): ?>
            <div>
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
    </div>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($product->id); ?></td>
                    <td><?php echo e($product->name); ?></td>
                    <td><?php echo e($product->qty); ?></td>
                    <td><?php echo e($product->price); ?></td>
                    <td><?php echo e($product->description); ?></td>
                    <td>
                        <a href="<?php echo e(route('product.edit', ['product' => $product])); ?>">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="<?php echo e(route('product.destroy', ['product' => $product])); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <input type="submit" value="delete"/>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
    <br>
    <button type="button" onclick="window.location='<?php echo e(route('product.create')); ?>'">Add New Product</button>
</body>
</html><?php /**PATH /var/www/html/resources/views/products/index.blade.php ENDPATH**/ ?>