<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-bold text-2xl text-gray-800">
            👤 My Profile
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- PROFILE CARD -->

            <div class="bg-white shadow-xl rounded-xl overflow-hidden mb-8">

                <div class="bg-gradient-to-r from-blue-700 to-blue-500 h-36"></div>

                <div class="px-8 pb-8">

                    <div class="-mt-16 flex items-center">

                        <div
                            class="w-32 h-32 rounded-full bg-white border-4 border-white shadow-lg flex items-center justify-center text-5xl">

                            👤

                        </div>

                        <div class="ml-6">

                            <h2 class="text-3xl font-bold">

                                <?php echo e(Auth::user()->name); ?>


                            </h2>

                            <p class="text-gray-500">

                                <?php echo e(Auth::user()->email); ?>


                            </p>

                            <div class="mt-3">

                                <?php if(Auth::user()->role == 'admin'): ?>

                                    <span
                                        class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-bold">

                                        Administrator

                                    </span>

                                <?php else: ?>

                                    <span
                                        class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-bold">

                                        Customer

                                    </span>

                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                    <div class="grid md:grid-cols-3 gap-6 mt-10">

                        <div class="bg-blue-50 rounded-lg p-5">

                            <h3 class="font-bold text-blue-700">
                                Name
                            </h3>

                            <p class="mt-2">
                                <?php echo e(Auth::user()->name); ?>

                            </p>

                        </div>

                        <div class="bg-green-50 rounded-lg p-5">

                            <h3 class="font-bold text-green-700">
                                Email
                            </h3>

                            <p class="mt-2 break-all">
                                <?php echo e(Auth::user()->email); ?>

                            </p>

                        </div>

                        <div class="bg-yellow-50 rounded-lg p-5">

                            <h3 class="font-bold text-yellow-700">
                                Member Since
                            </h3>

                            <p class="mt-2">
                                <?php echo e(Auth::user()->created_at->format('F d, Y')); ?>

                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- UPDATE PROFILE -->

            <div class="bg-white shadow rounded-xl p-6 mb-8">

                <h2 class="text-xl font-bold mb-5 text-blue-700">
                    ✏️ Edit Profile
                </h2>

                <?php echo $__env->make('profile.partials.update-profile-information-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            </div>

            <!-- CHANGE PASSWORD -->

            <div class="bg-white shadow rounded-xl p-6 mb-8">

                <h2 class="text-xl font-bold mb-5 text-green-700">
                    🔒 Change Password
                </h2>

                <?php echo $__env->make('profile.partials.update-password-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            </div>

            <!-- DELETE ACCOUNT -->

            <div class="bg-white shadow rounded-xl p-6">

                <h2 class="text-xl font-bold mb-5 text-red-700">
                    🗑 Delete Account
                </h2>

                <?php echo $__env->make('profile.partials.delete-user-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            </div>

        </div>

    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\CateringBookingSystem\resources\views/profile/edit.blade.php ENDPATH**/ ?>