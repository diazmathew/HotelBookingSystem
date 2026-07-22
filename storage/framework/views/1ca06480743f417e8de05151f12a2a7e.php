

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Booking Reports</h1>

    <table class="table-auto w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">Customer</th>
                <th class="border p-2">Package</th>
                <th class="border p-2">Event Date</th>
                <th class="border p-2">Venue</th>
                <th class="border p-2">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="border p-2"><?php echo e($booking->customer_name); ?></td>
                    <td class="border p-2"><?php echo e($booking->cateringPackage->package_name ?? 'N/A'); ?></td>
                    <td class="border p-2"><?php echo e($booking->event_date); ?></td>
                    <td class="border p-2"><?php echo e($booking->venue); ?></td>
                    <td class="border p-2"><?php echo e($booking->status); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="border p-2 text-center">
                        No reports available.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\CateringBookingSystem\resources\views/admin/reports/index.blade.php ENDPATH**/ ?>