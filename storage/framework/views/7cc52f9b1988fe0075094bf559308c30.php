

<?php $__env->startSection('content'); ?>

<h1 class="text-3xl font-bold mb-8">

    User Dashboard

</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div class="bg-white rounded-lg shadow p-6">

        <h2 class="text-lg font-bold">

            Welcome <?php echo e(auth()->user()->name); ?>


        </h2>

        <p class="mt-2 text-gray-600">

            Role:
            <strong><?php echo e(auth()->user()->role); ?></strong>

        </p>

    </div>

    <div class="bg-white rounded-lg shadow p-6">

        <h2 class="text-lg font-bold">

            Available Packages

        </h2>

        <h1 class="text-4xl mt-3 text-green-700 font-bold">

            <?php echo e(\App\Models\CateringPackage::count()); ?>


        </h1>

    </div>

</div>

<div class="bg-white rounded-lg shadow mt-8 p-6">

    <h2 class="text-xl font-bold">

        Ready to Book?

    </h2>

    <a href="<?php echo e(route('booking.create')); ?>"
        class="mt-5 inline-block bg-green-600 text-white px-6 py-3 rounded">

        Book Catering

    </a>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\CateringBookingSystem\resources\views/user/dashboard.blade.php ENDPATH**/ ?>