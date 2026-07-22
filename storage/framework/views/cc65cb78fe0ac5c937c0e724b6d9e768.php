<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
</head>

<body class="bg-gray-100">

<div class="flex">

    <!-- Sidebar -->
    <aside class="w-64 h-screen bg-green-700 text-white">

        <div class="p-6 text-2xl font-bold border-b border-green-500">
            Catering User
        </div>

        <nav class="mt-5">

            <a href="<?php echo e(route('dashboard')); ?>"
               class="block px-6 py-3 hover:bg-green-600">
                🏠 Dashboard
            </a>

            <a href="<?php echo e(route('booking.create')); ?>"
               class="block px-6 py-3 hover:bg-green-600">
                🍽 Book Catering
            </a>

            <a href="<?php echo e(route('my.bookings')); ?>"
               class="block px-6 py-3 hover:bg-green-600">
                📋 My Bookings
            </a>

            <a href="<?php echo e(route('profile.edit')); ?>"
               class="block px-6 py-3 hover:bg-green-600">
                👤 Profile
            </a>

            <!-- Logout -->
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>

                <button
                    type="submit"
                    class="w-full text-left px-6 py-3 hover:bg-red-600">
                    🚪 Logout
                </button>
            </form>

        </nav>

    </aside>

    <!-- Content -->
    <main class="flex-1 p-8">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

</div>

</body>
</html><?php /**PATH C:\xampp\htdocs\CateringBookingSystem\resources\views/layouts/user.blade.php ENDPATH**/ ?>