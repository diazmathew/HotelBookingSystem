

<?php $__env->startSection('content'); ?>

<h1 class="text-3xl font-bold mb-6">
    User Management
</h1>

<?php if(session('success')): ?>
<div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded mb-4">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<?php if(session('error')): ?>
<div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-4">
    <?php echo e(session('error')); ?>

</div>
<?php endif; ?>

<div class="bg-white shadow rounded-lg overflow-hidden">

<table class="w-full">

<thead class="bg-blue-700 text-white">

<tr>

<th class="p-3">ID</th>
<th class="p-3">Name</th>
<th class="p-3">Email</th>
<th class="p-3">Role</th>
<th class="p-3">Action</th>

</tr>

</thead>

<tbody>

<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr class="border-b">

<td class="p-3"><?php echo e($user->id); ?></td>

<td class="p-3"><?php echo e($user->name); ?></td>

<td class="p-3"><?php echo e($user->email); ?></td>

<td class="p-3">

<?php if($user->role=="admin"): ?>

<span class="text-red-600 font-bold">
Admin
</span>

<?php else: ?>

<span class="text-green-600 font-bold">
User
</span>

<?php endif; ?>

</td>

<td class="p-3">

<?php if($user->role!="admin"): ?>

<form action="<?php echo e(route('admin.users.destroy',$user)); ?>" method="POST">

<?php echo csrf_field(); ?>
<?php echo method_field('DELETE'); ?>

<button
onclick="return confirm('Delete user?')"
class="bg-red-600 text-white px-3 py-1 rounded">

Delete

</button>

</form>

<?php endif; ?>

</td>

</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</tbody>

</table>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\CateringBookingSystem\resources\views/admin/users/index.blade.php ENDPATH**/ ?>