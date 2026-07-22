<!DOCTYPE html>
<html>
<head>

    <title>Edit Catering Package</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Edit Catering Package</h2>

<?php if($errors->any()): ?>

<div class="alert alert-danger">

<ul>

<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<li><?php echo e($error); ?></li>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</ul>

</div>

<?php endif; ?>

<form action="<?php echo e(route('packages.update',$package)); ?>" method="POST">

<?php echo csrf_field(); ?>
<?php echo method_field('PUT'); ?>

<div class="mb-3">

<label>Package Name</label>

<input
type="text"
name="package_name"
class="form-control"
value="<?php echo e(old('package_name',$package->package_name)); ?>">

</div>

<div class="mb-3">

<label>Description</label>

<textarea
name="description"
class="form-control"><?php echo e(old('description',$package->description)); ?></textarea>

</div>

<div class="mb-3">

<label>Price</label>

<input
type="number"
step="0.01"
name="price"
class="form-control"
value="<?php echo e(old('price',$package->price)); ?>">

</div>

<div class="mb-3">

<label>Maximum Pax</label>

<input
type="number"
name="max_pax"
class="form-control"
value="<?php echo e(old('max_pax',$package->max_pax)); ?>">

</div>

<button class="btn btn-success">

Update Package

</button>

<a href="<?php echo e(route('packages.index')); ?>"
class="btn btn-secondary">

Cancel

</a>

</form>

</div>

</body>
</html><?php /**PATH C:\xampp\htdocs\CateringBookingSystem\resources\views/packages/edit.blade.php ENDPATH**/ ?>