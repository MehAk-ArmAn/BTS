<header class="site-header" id="smartSiteHeader">
    <a href="<?php echo e(route('home')); ?>" class="brand-link" aria-label="BangTanSonyeondan Home">
        <img src="<?php echo e(asset('favicons/logo.png')); ?>" alt="BangTanSonyeondan logo">
        <span><?php echo e($siteSettings['site_title'] ?? 'BangTanSonyeondan'); ?></span>
    </a>

    <nav class="site-nav smart-site-nav" id="smartSiteNav" aria-label="Main navigation">
        <div class="smart-nav-visible" id="smartNavVisible">
            <?php $__currentLoopData = $navItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a
                    href="<?php echo e(url($item->url)); ?>"
                    class="smart-nav-item"
                    data-nav-order="<?php echo e($loop->index); ?>"
                >
                    <?php echo e($item->label); ?>

                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <details class="nav-more smart-nav-more" id="smartNavMore">
            <summary>
                More <span>⌄</span>
            </summary>

            <div class="nav-more-menu smart-nav-hidden" id="smartNavHidden"></div>
        </details>
    </nav>

    <form class="nav-search" action="<?php echo e(route('search')); ?>" method="GET" role="search">
        <input type="search" name="q" value="<?php echo e(request('q')); ?>" placeholder="Search BTS, songs, quotes..." aria-label="Search website">
        <button type="submit">Search</button>
    </form>

    <div class="nav-actions">
        <?php if(auth()->guard()->check()): ?>
            <a class="nav-cta" href="<?php echo e(route('user.dashboard')); ?>">Dashboard</a>
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="nav-link-button">Logout</button>
            </form>
        <?php else: ?>
            <a class="nav-link-button" href="<?php echo e(route('login')); ?>">Login</a>
            <a class="nav-cta" href="<?php echo e(route('register')); ?>">Join ARMY</a>
        <?php endif; ?>
    </div>
</header><?php /**PATH D:\My real data\Biz\PixelCraftsLab\Projects\BangTan\website\BangTan_3.0\resources\views/layouts/frontend/partials/navbar.blade.php ENDPATH**/ ?>