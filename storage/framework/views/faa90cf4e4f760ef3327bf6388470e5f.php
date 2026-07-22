<!DOCTYPE html>
<html>
<head>

    <title>Catering Packages</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-3">

        <h2>Catering Packages</h2>

        <a href="<?php echo e(route('packages.create')); ?>" class="btn btn-primary">
            Add Package
        </a>

    </div>

    <?php if(session('success')): ?>

        <div class="alert alert-success">

            <?php echo e(session('success')); ?>


        </div>

    <?php endif; ?>

    <table class="table table-bordered table-hover">

        <thead class="table-dark">

        <tr>

            <th>ID</th>

            <th>Package Name</th>

            <th>Description</th>

            <th>Price</th>

            <th>Maximum Pax</th>

            <th width="220">Action</th>

        </tr>

        </thead>

        <tbody>

        <?php $__empty_1 = true; $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

        <tr>

            <td><?php echo e($package->id); ?></td>

            <td><?php echo e($package->package_name); ?></td>

            <td><?php echo e($package->description); ?></td>

            <td>₱<?php echo e(number_format($package->price,2)); ?></td>

            <td><?php echo e($package->max_pax); ?></td>

            <td>

                <a href="<?php echo e(route('packages.show',$package)); ?>" class="btn btn-info btn-sm">
                    View
                </a>

                <a href="<?php echo e(route('packages.edit',$package)); ?>" class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="<?php echo e(route('packages.destroy',$package)); ?>"
                      method="POST"
                      style="display:inline;">

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button
                        onclick="return confirm('Delete this package?')"
                        class="btn btn-danger btn-sm">

                        Delete

                    </button>

                </form>

            </td>

        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

        <tr>

            <td colspan="6" class="text-center">

                No catering packages found.

            </td>

        </tr>

        <?php endif; ?>

        </tbody>

    </table>

</div>

</body>
</html><?php /**PATH C:\xampp\htdocs\CateringBookingSystem\resources\views/packages/index.blade.php ENDPATH**/ ?>