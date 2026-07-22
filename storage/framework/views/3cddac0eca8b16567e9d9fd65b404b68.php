

<?php $__env->startSection('content'); ?>

<div class="max-w-4xl mx-auto">

    <div class="bg-white shadow-lg rounded-lg p-8">

        <h1 class="text-3xl font-bold text-green-700 mb-6">
            Book Catering Package
        </h1>

        <?php if(session('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 p-4 rounded mb-5">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded mb-5">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded mb-5">
                <ul class="list-disc pl-5">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('booking.store')); ?>"
              method="POST"
              enctype="multipart/form-data">

            <?php echo csrf_field(); ?>

            <!-- Customer Name -->

            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Customer Name
                </label>

                <input
                    type="text"
                    name="customer_name"
                    value="<?php echo e(old('customer_name', auth()->user()->name)); ?>"
                    class="w-full border rounded-lg px-4 py-3"
                    required>

            </div>

            <!-- Catering Package -->

            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Catering Package
                </label>

                <select
                    id="packageSelect"
                    name="catering_package_id"
                    class="w-full border rounded-lg px-4 py-3"
                    required>

                    <option value="">Select Package</option>

                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <option
                            value="<?php echo e($package->id); ?>"
                            data-name="<?php echo e($package->package_name); ?>"
                            data-price="<?php echo e(number_format($package->price,2)); ?>"
                            data-pax="<?php echo e($package->max_pax); ?>"
                            data-description="<?php echo e($package->description); ?>">

                            <?php echo e($package->package_name); ?>


                        </option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>

            </div>

            <!-- PACKAGE DETAILS -->

            <div
                id="packageInfo"
                class="hidden bg-blue-50 border border-blue-200 rounded-lg p-6 mb-6">

                <h2 class="text-2xl font-bold text-blue-700 mb-4">
                    Package Details
                </h2>

                <div class="grid md:grid-cols-2 gap-5">

                    <div>
                        <p class="font-semibold">🍽 Package</p>
                        <p id="infoName"></p>
                    </div>

                    <div>
                        <p class="font-semibold">👥 Maximum Persons</p>
                        <p><span id="infoPax"></span> Persons</p>
                    </div>

                    <div>
                        <p class="font-semibold">💰 Price</p>
                        <p>₱<span id="infoPrice"></span></p>
                    </div>

                    <div>
                        <p class="font-semibold">📝 Description</p>
                        <p id="infoDescription"></p>
                    </div>

                </div>

            </div>
            <!-- Booking Calendar -->

<div class="mb-6">

    <h2 class="text-2xl font-bold text-blue-700 mb-4">
        Booking Calendar
    </h2>

    <p class="text-gray-600 mb-3">
        Select a package first to view booked dates.
    </p>

    <div class="bg-white border rounded-lg p-4 shadow">
        <div id="bookingCalendar"></div>
    </div>

</div>

            <!-- Event Date -->

            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Event Date
                </label>

               <input
    id="event_date"
    type="date"
    name="event_date"
    class="w-full border rounded-lg px-4 py-3"
    required>

            </div>

            <!-- Venue -->

            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Venue
                </label>

                <input
                    type="text"
                    name="venue"
                    class="w-full border rounded-lg px-4 py-3"
                    placeholder="Enter Event Venue"
                    required>

            </div>

            <!-- Upload Receipt -->

            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Upload Payment Receipt
                </label>

                <input
                    type="file"
                    id="payment_receipt"
                    name="payment_receipt"
                    accept=".jpg,.jpeg,.png,.pdf"
                    class="w-full border rounded-lg px-4 py-3">

                <p class="text-gray-500 text-sm mt-2">
                    Accepted: JPG, JPEG, PNG, PDF
                </p>

            </div>

            <!-- Image Preview -->

            <div
                id="previewContainer"
                class="hidden mb-5">

                <label class="block font-semibold mb-2">
                    Receipt Preview
                </label>

                <img
                    id="previewImage"
                    class="w-72 rounded-lg border shadow">

            </div>

            <!-- Submit -->

            <button
                type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg">

                Submit Booking

            </button>

        </form>

    </div>

</div>

<script>
    
    

const packageSelect = document.getElementById('packageSelect');

packageSelect.addEventListener('change', function () {

    if (this.value === '') {

        document.getElementById('packageInfo').classList.add('hidden');
        return;

    }

    let selected = this.options[this.selectedIndex];

    document.getElementById('infoName').innerText =
        selected.dataset.name;

    document.getElementById('infoPax').innerText =
        selected.dataset.pax;

    document.getElementById('infoPrice').innerText =
        selected.dataset.price;

    document.getElementById('infoDescription').innerText =
        selected.dataset.description;

    document.getElementById('packageInfo').classList.remove('hidden');

});

//--------------------------------------------------
// Booking Calendar
//--------------------------------------------------

document.addEventListener('DOMContentLoaded', function () {

    const calendarEl = document.getElementById('bookingCalendar');

    let calendar = new Calendar(calendarEl, {

        plugins: [
            dayGridPlugin,
            interactionPlugin
        ],

        initialView: 'dayGridMonth',

        height: 600,

        events: function(fetchInfo, successCallback, failureCallback){

            let packageId =
                document.getElementById('packageSelect').value;

            fetch('/calendar/events?package=' + packageId)
                .then(res => res.json())
                .then(data => successCallback(data))
                .catch(err => failureCallback(err));

        },

        dateClick:function(info){

            document.getElementById('event_date').value =
                info.dateStr;

        },

        eventClick:function(info){

            alert(
                "Already Booked\n\n" +
                "Package : " + info.event.title + "\n" +
                "Customer : " + info.event.extendedProps.customer + "\n" +
                "Status : " + info.event.extendedProps.status
            );

        }

    });

    calendar.render();

    packageSelect.addEventListener('change',function(){

        calendar.refetchEvents();

    });

});

const receiptInput = document.getElementById('payment_receipt');

receiptInput.addEventListener('change', function(e){

    const file = e.target.files[0];

    if(!file) return;

    if(file.type.startsWith('image')){

        const reader = new FileReader();

        reader.onload = function(event){

            document.getElementById('previewImage').src = event.target.result;

            document.getElementById('previewContainer').classList.remove('hidden');

        }

        reader.readAsDataURL(file);

    }

});

</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\CateringBookingSystem\resources\views/booking/create.blade.php ENDPATH**/ ?>