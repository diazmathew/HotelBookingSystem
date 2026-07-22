<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
</head>

<body class="bg-gray-100">

<div class="flex">

    <!-- Sidebar -->
    <aside class="w-64 h-screen bg-blue-800 text-white">

        <div class="p-6 text-2xl font-bold border-b">
            Catering Admin
        </div>

        <nav class="mt-5">

            <a href="<?php echo e(route('dashboard')); ?>"
               class="block px-6 py-3 hover:bg-blue-700">
                🏠 Dashboard
            </a>

            <a href="<?php echo e(route('packages.index')); ?>"
               class="block px-6 py-3 hover:bg-blue-700">
                🍽 Catering Packages
            </a>

            <a href="<?php echo e(route('admin.bookings')); ?>"
               class="block px-6 py-3 hover:bg-blue-700">
                📋 Bookings
            </a>

            <a href="<?php echo e(route('admin.users')); ?>"
               class="block px-6 py-3 hover:bg-blue-700">
                👥 Users
            </a>

            <a href="<?php echo e(route('admin.reports')); ?>"
               class="block px-6 py-3 hover:bg-blue-700">
                📊 Reports
            </a>

            <hr class="my-4 border-blue-600">

            <a href="<?php echo e(route('profile.edit')); ?>"
               class="block px-6 py-3 hover:bg-blue-700">
                ⚙ Profile
            </a>

            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit"
                        class="w-full text-left px-6 py-3 hover:bg-red-600">
                    🚪 Logout
                </button>
            </form>

        </nav>

    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

</div>

</body>
</html><?php /**PATH C:\xampp\htdocs\CateringBookingSystem\resources\views/layouts/admin.blade.php ENDPATH**/ ?>