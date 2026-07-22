

<?php $__env->startSection('content'); ?>

<div class="bg-white shadow-lg rounded-xl p-6">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold text-blue-700">
            Booking Management
        </h1>

    </div>

    <?php if(session('success')): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-5">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-5">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <div class="overflow-x-auto">

        <table class="min-w-full border border-gray-200">

            <thead class="bg-blue-700 text-white">

                <tr>

                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Customer</th>
                    <th class="px-4 py-3">Package</th>
                    <th class="px-4 py-3">Event Date</th>
                    <th class="px-4 py-3">Venue</th>
                    <th class="px-4 py-3">Receipt</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Actions</th>

                </tr>

            </thead>

            <tbody>

            <?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <tr class="border-b hover:bg-gray-50">

                    <td class="px-4 py-3">
                        <?php echo e($booking->id); ?>

                    </td>

                    <td class="px-4 py-3">
                        <?php echo e($booking->customer_name); ?>

                    </td>

                    <td class="px-4 py-3">
                        <?php echo e($booking->cateringPackage->package_name ?? 'N/A'); ?>

                    </td>

                    <td class="px-4 py-3">
                        <?php echo e($booking->event_date); ?>

                    </td>

                    <td class="px-4 py-3">
                        <?php echo e($booking->venue); ?>

                    </td>

                    

                    <td class="px-4 py-3">

                        <?php if($booking->payment_receipt): ?>

                            <button
                                type="button"
                                onclick="openReceipt('<?php echo e(asset('storage/'.$booking->payment_receipt)); ?>')"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded">

                                View Receipt

                            </button>

                        <?php else: ?>

                            <span class="bg-gray-200 text-gray-700 px-3 py-2 rounded">

                                No Receipt

                            </span>

                        <?php endif; ?>

                    </td>

                    

                    <td class="px-4 py-3">

                        <?php if($booking->status=='Pending'): ?>

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full font-semibold">

                                Pending

                            </span>

                        <?php elseif($booking->status=='Confirmed'): ?>

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full font-semibold">

                                Confirmed

                            </span>

                        <?php else: ?>

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full font-semibold">

                                Cancelled

                            </span>

                        <?php endif; ?>

                    </td>

                    

                    <td class="px-4 py-3">

                        <div class="flex flex-wrap gap-2">

                            <?php if($booking->status=='Pending'): ?>

                            <form action="<?php echo e(route('admin.bookings.approve',$booking)); ?>" method="POST">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>

                                <button
                                    class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded">

                                    Confirm

                                </button>

                            </form>

                            <?php endif; ?>

                            <?php if($booking->status!='Cancelled'): ?>

                            <form action="<?php echo e(route('admin.bookings.cancel',$booking)); ?>" method="POST">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>

                                <button
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded">

                                    Cancel

                                </button>

                            </form>

                            <?php endif; ?>

                            <form action="<?php echo e(route('admin.bookings.destroy',$booking)); ?>" method="POST">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button
                                    onclick="return confirm('Delete this booking?')"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded">

                                    Delete

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <tr>

                    <td colspan="8" class="text-center py-8 text-gray-500">

                        No bookings found.

                    </td>

                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<!-- Receipt Modal -->

<div
    id="receiptModal"
    class="fixed inset-0 bg-black bg-opacity-70 hidden items-center justify-center z-50">

    <div class="bg-white rounded-xl shadow-xl p-6 max-w-4xl w-11/12 relative">

        <button
            onclick="closeReceipt()"
            class="absolute top-4 right-4 bg-red-600 hover:bg-red-700 text-white w-10 h-10 rounded-full">

            ✕

        </button>

        <h2 class="text-2xl font-bold mb-5 text-blue-700">

            Payment Receipt

        </h2>

        <img
            id="receiptImage"
            class="w-full rounded-lg border shadow">

    </div>

</div>

<script>

function openReceipt(image){

    document.getElementById('receiptImage').src = image;

    document.getElementById('receiptModal').classList.remove('hidden');

    document.getElementById('receiptModal').classList.add('flex');

}

function closeReceipt(){

    document.getElementById('receiptModal').classList.remove('flex');

    document.getElementById('receiptModal').classList.add('hidden');

}

window.onclick = function(event){

    let modal=document.getElementById('receiptModal');

    if(event.target==modal){

        closeReceipt();

    }

}

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\CateringBookingSystem\resources\views/admin/bookings/index.blade.php ENDPATH**/ ?>