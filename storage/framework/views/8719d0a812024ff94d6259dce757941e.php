

<?php $__env->startSection('content'); ?>

<h1 class="text-3xl font-bold mb-8">
    Admin Dashboard
</h1>

<!-- Statistics -->

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

    <div class="bg-white rounded-lg shadow p-6">

        <h2 class="text-gray-500 text-sm uppercase">
            Catering Packages
        </h2>

        <p class="text-4xl font-bold text-blue-700 mt-2">
            <?php echo e(\App\Models\CateringPackage::count()); ?>

        </p>

    </div>

    <div class="bg-white rounded-lg shadow p-6">

        <h2 class="text-gray-500 text-sm uppercase">
            Bookings
        </h2>

        <p class="text-4xl font-bold text-green-700 mt-2">
            <?php echo e(\App\Models\Booking::count()); ?>

        </p>

    </div>

    <div class="bg-white rounded-lg shadow p-6">

        <h2 class="text-gray-500 text-sm uppercase">
            Users
        </h2>

        <p class="text-4xl font-bold text-orange-600 mt-2">
            <?php echo e(\App\Models\User::where('role','user')->count()); ?>

        </p>

    </div>

    <div class="bg-white rounded-lg shadow p-6">

        <h2 class="text-gray-500 text-sm uppercase">
            Pending
        </h2>

        <p class="text-4xl font-bold text-yellow-500 mt-2">
            <?php echo e(\App\Models\Booking::where('status','Pending')->count()); ?>

        </p>

    </div>

</div>

<!-- Calendar -->

<div class="bg-white rounded-lg shadow mt-10 p-6">

    <h2 class="text-2xl font-bold mb-5">

        Booking Calendar

    </h2>

    <div id="calendar"></div>

</div>

<!-- Booking Details -->

<div
    id="bookingInfo"
    class="hidden bg-blue-50 border border-blue-300 rounded-lg p-6 mt-8">

    <h2 class="text-xl font-bold mb-4">

        Booking Details

    </h2>

    <p><strong>Customer:</strong> <span id="customer"></span></p>

    <p><strong>Status:</strong> <span id="status"></span></p>

    <p><strong>Venue:</strong> <span id="venue"></span></p>

</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    let calendarEl = document.getElementById('calendar');

    let calendar = new Calendar(calendarEl, {

        plugins: [
            dayGridPlugin,
            interactionPlugin
        ],

        initialView: 'dayGridMonth',

        height: 700,

        events: "<?php echo e(route('calendar.events')); ?>",

        eventClick: function(info){

            document.getElementById('bookingInfo').classList.remove('hidden');

            document.getElementById('customer').innerHTML =
                info.event.extendedProps.customer;

            document.getElementById('status').innerHTML =
                info.event.extendedProps.status;

            document.getElementById('venue').innerHTML =
                info.event.extendedProps.venue;

        }

    });

    calendar.render();

});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\CateringBookingSystem\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>