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

<div class="min-h-screen bg-ivory-100">

    <div class="grid lg:grid-cols-2 min-h-screen">

        <!-- LEFT SIDE -->
        <div class="hidden lg:flex relative overflow-hidden bg-jade-950">

            <div class="pointer-events-none absolute -top-1/4 -left-1/4 w-[700px] h-[700px] rounded-full bg-jade-700/30 blur-3xl"></div>
            <div class="pointer-events-none absolute bottom-0 right-0 w-[600px] h-[600px] rounded-full bg-gold-500/10 blur-3xl"></div>

            <div class="relative z-10 flex flex-col justify-center px-16 text-ivory-100">

                <svg viewBox="0 0 100 100" class="w-16 h-16 mb-8 text-gold-400">
                    <circle cx="50" cy="50" r="46" fill="none" stroke="currentColor" stroke-width="1.5"/>
                    <path d="M50 22 L66 50 L50 78 L34 50 Z" fill="none" stroke="currentColor" stroke-width="1.5"/>
                    <circle cx="50" cy="50" r="6" fill="currentColor"/>
                </svg>

                <div class="eyebrow text-gold-400 mb-4">Hotel Booking</div>

                <h1 class="heading-display text-ivory-50 text-6xl leading-tight">
                    Z4ID
                </h1>

                <p class="mt-8 text-lg leading-8 text-ivory-300/80 max-w-xl font-light">
                    Plan your perfect stay with ease. Book hotel rooms online,
                    upload your payment receipt, and receive confirmation instantly.
                </p>

                <div class="grid grid-cols-2 gap-6 mt-14">

                    <div class="border border-gold-500/30 p-8 w-full">
                        <h2 class="font-display text-4xl text-gold-300">100+</h2>
                        <p class="mt-2 text-sm tracking-wide text-ivory-300/70 uppercase">Successful Stays</p>
                    </div>

                    <div class="border border-gold-500/30 p-8 w-full">
                        <h2 class="font-display text-4xl text-gold-300">500+</h2>
                        <p class="mt-2 text-sm tracking-wide text-ivory-300/70 uppercase">Happy Guests</p>
                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="flex justify-center items-center bg-ivory-100 px-6 py-12">

            <div
                x-data="{ loading: false }"
                class="card-luxury p-10 w-full max-w-lg animate-scale-in <?php echo e($errors->any() ? 'animate-shake' : ''); ?>">

                <div class="text-center">

                    <svg viewBox="0 0 100 100" class="w-14 h-14 mx-auto mb-5 text-gold-500">
                        <circle cx="50" cy="50" r="46" fill="none" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M50 22 L66 50 L50 78 L34 50 Z" fill="none" stroke="currentColor" stroke-width="1.5"/>
                        <circle cx="50" cy="50" r="6" fill="currentColor"/>
                    </svg>

                    <h2 class="heading-display text-4xl text-jade-900">
                        Welcome Back
                    </h2>

                   <p class="text-jade-700/70 mt-4 leading-7 font-light">
                        Sign in to manage your bookings, upload payments,
                        and monitor your reservation status.
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
                    x-on:submit="loading = true"
                    class="mt-8">

                    <?php echo csrf_field(); ?>

                    <!-- EMAIL -->

                    <div>

                        <label class="label-luxury">
                            Email Address
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="<?php echo e(old('email')); ?>"
                            required
                            autofocus
                            class="input-luxury">

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

                        <label class="label-luxury">
                            Password
                        </label>

                       <div class="relative" x-data="{ visible: false }">

    <input
        id="password"
        x-bind:type="visible ? 'text' : 'password'"
        name="password"
        class="input-luxury pr-12">

    <button
        type="button"
        x-on:click="visible = !visible"
        class="absolute right-4 top-1/2 -translate-y-1/2 text-jade-700/50 hover:text-gold-600 transition-colors">
        <span x-show="!visible">show</span>
        <span x-show="visible" x-cloak>hide</span>
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

                        <label class="flex items-center text-sm text-jade-700">

                            <input
                                type="checkbox"
                                name="remember"
                                class="rounded-none border-jade-800/30 text-gold-500 focus:ring-gold-400">

                            <span class="ml-2">
                                Remember Me
                            </span>

                        </label>

                        <?php if(Route::has('password.request')): ?>

                        <a
                            href="<?php echo e(route('password.request')); ?>"
                            class="text-sm text-gold-700 hover:text-gold-600 hover:underline">

                            Forgot Password?

                        </a>

                        <?php endif; ?>

                    </div>

                    <!-- LOGIN -->

                    <button
                        type="submit"
                        :disabled="loading"
                        class="btn-gold mt-8 w-full disabled:opacity-70 inline-flex items-center justify-center gap-2">

                        <svg
                            x-show="loading"
                            x-cloak
                            class="animate-spin h-4 w-4"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                        </svg>

                        <span x-text="loading ? 'Signing in…' : 'Sign In'"></span>

                    </button>

                    <div class="text-center mt-8 text-sm text-jade-700">

                        Don't have an account?

                        <a
                            href="<?php echo e(route('register')); ?>"
                            class="text-gold-700 font-medium hover:text-gold-600">

                            Register Here

                        </a>

                    </div>

                    <div class="divider-ornament"><span></span></div>

                    <p class="text-center text-xs tracking-wide text-jade-700/50 uppercase">

                        © <?php echo e(date('Y')); ?> Z4ID Booking

                    </p>

                </form>

            </div>

        </div>

    </div>

</div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\1\1\HotelBookingSystem\resources\views/auth/login.blade.php ENDPATH**/ ?>