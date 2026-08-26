
<?php $__env->startSection('title', 'BT21 · BangTanSonyeondan'); ?>
<?php $__env->startSection('content'); ?>
<section class="page-hero small bt21-hero">
    <span class="eyebrow">Cute Side Quest</span>
    <h1>BT21 Animated Anatomy Profiles</h1>
    <p>BT21 is now fun, colorful, character-focused, and fully editable from the admin panel.</p>
</section>

<div class="bt21-grid">
    <?php $__empty_1 = true; $__currentLoopData = $characters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $character): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <article id="<?php echo e($character->slug); ?>" class="bt21-card" style="--accent: <?php echo e($character->accent_color ?: '#a855f7'); ?>">
            <div class="bt21-orbit">
                <img src="<?php echo e(asset($character->image ?: 'favicons/logo.png')); ?>" alt="<?php echo e($character->name); ?>">
            </div>
            <div class="bt21-body">
                <span><?php echo e($character->member_name ?: 'BT21'); ?> character</span>
                <h2><?php echo e($character->emoji); ?> <?php echo e($character->name); ?></h2>
                <p><?php echo e($character->mood); ?></p>
                <strong><?php echo e($character->power); ?></strong>

                <?php if(!empty($character->anatomy)): ?>
                    <div class="anatomy-list">
                        <h3>Anatomy notes</h3>
                        <ul>
                            <?php $__currentLoopData = $character->anatomy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($item); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if(!empty($character->moves)): ?>
                    <div class="move-row">
                        <?php $__currentLoopData = $character->moves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $move): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span><?php echo e($move); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </article>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="glass-panel">
            <h2>No BT21 characters yet</h2>
            <p>Add BT21 characters from the admin panel and they will appear here automatically.</p>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\My real data\Biz\PixelCraftsLab\Projects\BangTan\website\BangTan_3.0\resources\views/bt21.blade.php ENDPATH**/ ?>