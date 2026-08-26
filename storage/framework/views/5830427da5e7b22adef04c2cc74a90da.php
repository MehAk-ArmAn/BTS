<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('layouts.frontend.partials.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <div class="purple-orb orb-one"></div>
    <div class="purple-orb orb-two"></div>
    <div class="bg-photo-wash"></div>

    <?php echo $__env->make('layouts.frontend.partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="page-shell">
        <div id="flashData"
             data-success="<?php echo e(session('success')); ?>"
             data-error="<?php echo e(session('error') ?: ($errors->any() ? $errors->first() : '')); ?>"></div>

        <noscript>
            <?php if(session('success')): ?>
                <div class="public-alert success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="public-alert error"><?php echo e(session('error')); ?></div>
            <?php endif; ?>
            <?php if($errors->any()): ?>
                <div class="public-alert error"><?php echo e($errors->first()); ?></div>
            <?php endif; ?>
        </noscript>

        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('layouts.frontend.partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?php echo e(asset('js/bts.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH D:\My real data\Biz\PixelCraftsLab\Projects\BangTan\website\BangTan_3.0\resources\views/layouts/frontend/app.blade.php ENDPATH**/ ?>