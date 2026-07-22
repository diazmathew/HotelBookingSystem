

<?php $__env->startSection('content'); ?>

<h1 class="text-3xl font-bold mb-6">
    My Bookings
</h1>

<?php if(session('success')): ?>
<div class="bg-green-100 text-green-700 border border-green-400 rounded p-3 mb-5">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<div class="bg-white shadow rounded-lg overflow-hidden">

<table class="w-full">

    <thead class="bg-green-700 text-white">

        <tr>

            <th class="p-3 text-left">Package</th>
            <th class="p-3 text-left">Event Date</th>
            <th class="p-3 text-left">Venue</th>
            <th class="p-3 text-left">Status</th>

        </tr>

    </thead>

    <tbody>

    <?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

        <tr class="border-b">

            <td class="p-3">

                <?php echo e($booking->cateringPackage->package_name); ?>


            </td>

            <td class="p-3">

                <?php echo e($booking->event_date); ?>


            </td>

            <td class="p-3">

                <?php echo e($booking->venue); ?>


            </td>

            <td class="p-3">

                <?php if($booking->status=='Pending'): ?>

                    <span class="text-yellow-600 font-bold">
                        Pending
                    </span>

                <?php elseif($booking->status=='Confirmed'): ?>

                    <span class="text-green-700 font-bold">
                        Confirmed
                    </span>

                <?php else: ?>

                    <span class="text-red-600 font-bold">
                        Cancelled
                    </span>

                <?php endif; ?>

            </td>

        </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

        <tr>

            <td colspan="4" class="text-center p-5">

                No bookings found.

            </td>

        </tr>

    <?php endif; ?>

    </tbody>

</table>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\CateringBookingSystem\resources\views/user/bookings/index.blade.php ENDPATH**/ ?>