<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GuestLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

<div class="min-h-screen bg-gray-100">

    <div class="grid lg:grid-cols-2 min-h-screen">

        <!-- LEFT SIDE -->
        <div class="hidden lg:flex relative overflow-hidden">

            <img
                src="<?php echo e(asset('images/login-bg.jpg')); ?>"
                class="absolute inset-0 w-full h-full object-cover">

            <div class="absolute inset-0 bg-gradient-to-br from-green-900/80 via-black/60 to-green-700/70"></div>

            <div class="relative z-10 flex flex-col justify-center px-16 text-white">

                <img
    src="<?php echo e(asset('images/logo.png')); ?>"
    class="w-32 h-32 rounded-full shadow-2xl mb-8 animate-bounce">

                <h1 class="text-6xl font-extrabold leading-tight">

                    Catering

                    <br>

                    Booking

                    <br>

                    System

                </h1>

                <p class="mt-8 text-xl leading-9 text-gray-200 max-w-xl">

                    Plan unforgettable events with ease.

                    Book catering packages online,

                    upload your payment receipt,

                    and receive confirmation instantly.

                </p>

                <div class="grid grid-cols-2 gap-6 mt-12">

                    <div class="bg-white/90 backdrop-blur-xl rounded-[35px] shadow-2xl border border-white/40 p-12 w-full max-w-xl">

                        <h2 class="text-4xl font-bold">

                            100+

                        </h2>

                        <p class="mt-2">

                            Successful Events

                        </p>

                    </div>

                    <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6">

                        <h2 class="text-4xl font-bold">

                            500+

                        </h2>

                        <p class="mt-2">

                            Happy Customers

                        </p>

                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="flex justify-center items-center bg-gradient-to-br from-green-100 via-white to-green-200 px-6 py-12">

            <div class="bg-white rounded-3xl shadow-2xl p-10 w-full max-w-lg">

                <div class="text-center">

                    <img
                        src="<?php echo e(asset('images/logo.png')); ?>"
                        class="w-28 h-28 rounded-full mx-auto shadow-xl mb-5">

                    <h2 class="text-5xl font-extrabold text-green-700">

                        Welcome Back 👋

                    </h2>

                   <p class="text-gray-500 mt-4 leading-7">
                        Sign in to manage your catering bookings,
                    upload payments, and monitor booking status.
                    </p>

                </div>

                <?php if (isset($component)) { $__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth-session-status','data' => ['class' => 'mt-6','status' => session('status')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth-session-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-6','status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('status'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5)): ?>
<?php $attributes = $__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5; ?>
<?php unset($__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5)): ?>
<?php $component = $__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5; ?>
<?php unset($__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5); ?>
<?php endif; ?>

                <form
                    method="POST"
                    action="<?php echo e(route('login')); ?>"
                    class="mt-8">

                    <?php echo csrf_field(); ?>

                    <!-- EMAIL -->

                    <div>

                        <label class="font-semibold">

                            Email Address

                        </label>

                        <input
                            type="email"
                            name="email"
                            value="<?php echo e(old('email')); ?>"
                            required
                            autofocus
                            class="mt-2 w-full rounded-xl border-gray-300 focus:ring-green-500 focus:border-green-500">

                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('email'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('email')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>

                    </div>

                    <!-- PASSWORD -->

                    <div class="mt-6">

                        <label class="font-semibold">

                            Password

                        </label>

                       <div class="relative mt-2">

    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
        🔒
    </span>

    <input
        id="password"
        type="password"
        name="password"
        class="w-full pl-12 pr-12 rounded-xl border-gray-300">

    <button
        id="togglePassword"
        type="button"
        class="absolute right-4 top-1/2 -translate-y-1/2">
        👁️
    </button>

</div>

                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('password'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('password')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>

                    </div>

                    <!-- REMEMBER -->

                    <div class="flex justify-between items-center mt-8">

                        <label class="flex items-center">

                            <input
                                type="checkbox"
                                name="remember"
                                class="rounded">

                            <span class="ml-2">

                                Remember Me

                            </span>

                        </label>

                        <?php if(Route::has('password.request')): ?>

                        <a
                            href="<?php echo e(route('password.request')); ?>"
                            class="text-green-700 hover:underline">

                            Forgot Password?

                        </a>

                        <?php endif; ?>

                    </div>

                    <!-- LOGIN -->

                    <button
                        type="submit"
                        class="mt-8 w-full bg-gradient-to-r from-green-600 to-green-800 text-white rounded-xl py-4 font-bold text-lg hover:scale-105 duration-300 shadow-lg">

                        LOGIN

                    </button>

                    <div class="text-center mt-8">

                        Don't have an account?

                        <a
                            href="<?php echo e(route('register')); ?>"
                            class="text-green-700 font-bold">

                            Register Here

                        </a>

                    </div>

                    <hr class="my-8">

                    <p class="text-center text-sm text-gray-500">

                        © <?php echo e(date('Y')); ?>


                        Catering Booking System

                    </p>
                    

                </form>

            </div>

        </div>

    </div>

</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    if(togglePassword && password){

        togglePassword.addEventListener('click', function(){

            if(password.type === 'password'){

                password.type = 'text';
                this.innerHTML = '🙈';

            }else{

                password.type = 'password';
                this.innerHTML = '👁️';

            }

        });

    }

    // Fade animation
    const card = document.querySelector('.bg-white.rounded-3xl');

    if(card){

        card.style.opacity = 0;
        card.style.transform = "translateY(30px)";

        setTimeout(() => {

            card.style.transition = "all .8s ease";
            card.style.opacity = 1;
            card.style.transform = "translateY(0px)";

        },200);

    }

});

</script>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\CateringBookingSystem\resources\views/auth/login.blade.php ENDPATH**/ ?>