
<?php $__env->startSection('title', ($siteSettings['site_title'] ?? 'BangTanSonyeondan') . ' · Home'); ?>
<?php $__env->startSection('content'); ?>
<section class="hero-section old-soul-hero">
    <div class="hero-copy">
        <span class="eyebrow"><?php echo e($siteSettings['hero_kicker'] ?? 'BTS FOREVER · ARMY HOMEBASE'); ?></span>
        <h1><?php echo e($siteSettings['hero_title'] ?? 'BangTanSonyeondan'); ?></h1>
        <p><?php echo e($siteSettings['hero_body'] ?? 'Learn everything about BTS, take quizzes, earn points, collect profile upgrades, and climb the ARMY leaderboard.'); ?></p>
        <div class="hero-actions">
            <a class="btn primary" href="<?php echo e(route('learn.index')); ?>">Start Learning</a>
            <a class="btn ghost" href="<?php echo e(route('register')); ?>">Create Account</a>
            <a class="btn ghost" href="<?php echo e(route('achievements')); ?>">Timeline</a>
        </div>
    </div>
    <div class="hero-card legacy-image-card">
        <img src="<?php echo e(asset('imgs/collage.jpg')); ?>" alt="BangTanSonyeondan hero">
        <div class="floating-badge">BTS · ARMY</div>
    </div>
</section>

<section class="stats-grid">
    <div><b><?php echo e($members->count() ?: 7); ?></b><span>Member vaults</span></div>
    <div><b><?php echo e($featuredSongs->count()); ?></b><span>Featured songs</span></div>
    <div><b><?php echo e($featuredTimeline->count()); ?></b><span>Timeline lessons</span></div>
    <div><b>∞</b><span>ARMY energy</span></div>
</section>

<section class="section-block split-showcase feature-quest">
    <div>
        <span class="eyebrow">Learn → Quiz → Earn</span>
        <h2>It is not just pretty. It teaches BTS, then tests you.</h2>
        <p>The final version adds user accounts, daily streaks, learning pages, quizzes, points, profile upgrades, and a leaderboard — exactly the ARMY game-learning idea.</p>
        <a class="btn primary" href="<?php echo e(route('learn.index')); ?>">Open BTS Lessons</a>
    </div>
    <div class="quest-cards">
        <article><span>01</span><h3>Read BTS lesson</h3><p>Short, cute, useful BTS teaching cards.</p></article>
        <article><span>02</span><h3>Take quiz</h3><p>Each correct answer gives points.</p></article>
        <article><span>03</span><h3>Upgrade profile</h3><p>Spend points on profile assets and themes.</p></article>
    </div>
</section>

<section class="section-block members-showcase-section" id="members">
    <div class="section-heading">
        <span class="eyebrow">Member Vaults</span>

        <h2>
            Seven artists. Seven identities. One universe.
        </h2>

        <p>
            Explore cinematic member profiles with stories, visuals, BT21 identities,
            skill tags, social links, and iconic BTS aesthetics.
        </p>
    </div>

    <div class="members-showcase-grid">
        <?php $__currentLoopData = $featuredMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a
                class="member-showcase-card"
                href="<?php echo e(route('member.show', $member->slug ?: $member->name)); ?>"
                style="--accent: <?php echo e($member->accent_color ?? '#a855f7'); ?>"
            >
                <div class="member-showcase-image-wrap">
                    <img
                        src="<?php echo e(asset(member_asset($member->image))); ?>"
                        alt="<?php echo e($member->stage_name ?: $member->name); ?>"
                    >

                    <div class="member-showcase-overlay"></div>

                    <div class="member-showcase-glow"></div>

                    <?php if($member->bt21_character): ?>
                        <span class="member-showcase-bt21">
                            <?php echo e($member->bt21_character); ?>

                        </span>
                    <?php endif; ?>
                </div>

                <div class="member-showcase-content">
                    <span class="member-showcase-role">
                        <?php echo e($member->role); ?>

                    </span>

                    <h3>
                        <?php echo e($member->stage_name ?: $member->nickname ?: $member->name); ?>

                    </h3>

                    <p>
                        <?php echo e($member->intro_title ?: 'Enter profile vault'); ?>

                    </p>

                    <div class="member-showcase-footer">
                        <span>Open Profile</span>

                        <div class="member-showcase-arrow">
                            →
                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>

<section class="section-block split-showcase">
    <div>
        <span class="eyebrow">BT21 Fixed</span>
        <h2>BT21 is now its own colorful animated anatomy zone.</h2>
        <p>No more BT21 cards leading to member vaults. They now open fun character anatomy-style profiles directly on the BT21 page.</p>
        <a class="btn primary" href="<?php echo e(route('bt21')); ?>">Visit BT21</a>
    </div>
    <div class="timeline-mini">
        <?php $__currentLoopData = $featuredTimeline; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article>
                <span><?php echo e($event->year); ?> · <?php echo e($event->category); ?></span>
                <h3><?php echo e($event->title); ?></h3>
            </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>

<section class="section-block">
    <div class="section-heading">
        <span class="eyebrow">Song Cards</span>
        <h2>Era browsing with dark concert energy.</h2>
    </div>
    <div class="song-grid compact">
        <?php $__currentLoopData = $featuredSongs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="song-card" href="<?php echo e(route('songs')); ?>">
                <img src="<?php echo e(asset($song->img_path)); ?>" alt="<?php echo e($song->name); ?>">
                <div>
                    <span><?php echo e($song->era); ?></span>
                    <h3><?php echo e($song->name); ?></h3>
                </div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>

<section class="section-block quote-strip">
    <?php $__empty_1 = true; $__currentLoopData = $featuredQuotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <blockquote>
            <p>“<?php echo e($quote->quote); ?>”</p>
            <cite><?php echo e($quote->source); ?></cite>
        </blockquote>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <blockquote><p>“Seven people. Millions of stories. One purple stage.”</p><cite>ARMY</cite></blockquote>
    <?php endif; ?>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\My real data\Biz\PixelCraftsLab\Projects\BangTan\website\BangTan_3.0\resources\views/welcome.blade.php ENDPATH**/ ?>