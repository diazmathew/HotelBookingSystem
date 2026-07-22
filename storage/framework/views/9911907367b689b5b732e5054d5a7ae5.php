<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>

</head>

<body class="font-sans antialiased bg-gray-100 overflow-x-hidden">

    <?php echo e($slot); ?>


</body>

</html><?php /**PATH C:\xampp\htdocs\CateringBookingSystem\resources\views/layouts/guest.blade.php ENDPATH**/ ?>