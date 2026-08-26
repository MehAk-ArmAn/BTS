<?php
    $footerTitle = $siteSettings['site_title'] ?? 'BangTan';
    $footerText = $siteSettings['footer_text'] ?? 'A fan-made BangTan website for ARMY. Learn, quiz, collect points, and support official BTS content.';
    $creatorName = $name ?? 'ARMY';

    $quickLinks = $footerQuickLinks ?? collect();
    $socialLinks = $footerSocialLinks ?? collect();
    $legalLinks = $footerLegalLinks ?? collect();
?>

<footer class="site-footer">
    <div class="footer-glow footer-glow-one"></div>
    <div class="footer-glow footer-glow-two"></div>
    <div class="footer-stars"></div>

    <div class="footer-shell">
        <div class="footer-brand-card">
            <a href="<?php echo e(url('/')); ?>" class="footer-brand-link" aria-label="Go to homepage">
                <img class="footer-logo" src="<?php echo e(asset('favicons/logo.png')); ?>" alt="<?php echo e($footerTitle); ?> logo">

                <div>
                    <h2><?php echo e($footerTitle); ?></h2>
                    <span><?php echo e($siteSettings['footer_tagline'] ?? 'Fan-made ARMY learning universe'); ?></span>
                </div>
            </a>

            <p><?php echo e($footerText); ?></p>

            <div class="footer-mini-badges">
                <?php $__empty_1 = true; $__currentLoopData = $quickLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <a href="<?php echo e(url($link->url ?: '/')); ?>">
                        <?php echo e($link->icon); ?> <?php echo e($link->label); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <a href="<?php echo e(url('/learn')); ?>">📚 Learn BTS</a>
                    <a href="<?php echo e(url('/quizzes')); ?>">🧠 Take quizzes</a>
                    <a href="<?php echo e(url('/leaderboard')); ?>">🏆 Earn points</a>
                <?php endif; ?>
            </div>
        </div>

        <div class="footer-grid">
            <div class="footer-column">
                <h3>Explore</h3>

                <?php $__empty_1 = true; $__currentLoopData = $navItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <a href="<?php echo e(url($item->url)); ?>">
                        <span class="footer-link-emoji">✦</span>
                        <?php echo e($item->label); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <a href="<?php echo e(url('/')); ?>">
                        <span class="footer-link-emoji">✦</span>
                        Home
                    </a>
                <?php endif; ?>
            </div>

            <div class="footer-column">
                <h3>Members</h3>

                <div class="footer-links-grid">
                    <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('member.show', $member->slug ?: $member->name)); ?>">
                            <span class="footer-link-emoji">💜</span>
                            <span><?php echo e($member->name); ?></span>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="footer-column footer-bt21-column">
                <h3>BT21</h3>

                <div class="bt21-footer-buttons">
                    <?php $__empty_1 = true; $__currentLoopData = ($footerBt21Characters ?? collect()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $character): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="<?php echo e(url('/bt21#' . strtolower($character->name))); ?>">
                            <?php echo e($character->emoji ?? '💜'); ?> <?php echo e($character->name); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <a href="<?php echo e(url('/bt21#koya')); ?>">🐨 KOYA</a>
                        <a href="<?php echo e(url('/bt21#rj')); ?>">🦙 RJ</a>
                        <a href="<?php echo e(url('/bt21#shooky')); ?>">🍪 SHOOKY</a>
                        <a href="<?php echo e(url('/bt21#mang')); ?>">🕺 MANG</a>
                        <a href="<?php echo e(url('/bt21#chimmy')); ?>">🐶 CHIMMY</a>
                        <a href="<?php echo e(url('/bt21#tata')); ?>">💜 TATA</a>
                        <a href="<?php echo e(url('/bt21#cooky')); ?>">🐰 COOKY</a>
                        <a href="<?php echo e(url('/bt21#van')); ?>">🤖 VAN</a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="footer-column footer-community-column">
                <h3>Community</h3>

                <p class="footer-contact-line"><?php echo e($adminEmail); ?></p>
                <p class="footer-contact-line"><?php echo e($location); ?></p>

                <?php if(auth()->guard()->guest()): ?>
                    <a class="footer-login-link" href="<?php echo e(route('register')); ?>">Join the leaderboard</a>
                <?php else: ?>
                    <a class="footer-login-link" href="<?php echo e(route('user.dashboard')); ?>">Open dashboard</a>
                <?php endif; ?>

                <div class="footer-legal-links">
                    <?php $__empty_1 = true; $__currentLoopData = $legalLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="<?php echo e(url($link->url ?: '/')); ?>">
                            <span class="footer-link-emoji"><?php echo e($link->icon ?: '✦'); ?></span>
                            <?php echo e($link->label); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <a href="<?php echo e(url('/about')); ?>">About</a>
                        <a href="<?php echo e(url('/contact')); ?>">Contact</a>
                        <a href="<?php echo e(url('/privacy-policy')); ?>">Privacy Policy</a>
                        <a href="<?php echo e(url('/terms')); ?>">Terms of Use</a>
                        <a href="<?php echo e(url('/disclaimer')); ?>">Disclaimer</a>
                        <a href="<?php echo e(url('/cookies')); ?>">Cookie Policy</a>
                        <a href="<?php echo e(url('/community-guidelines')); ?>">Community Guidelines</a>
                        <a href="<?php echo e(url('/copyright')); ?>">Copyright & Credits</a>
                        <a href="<?php echo e(url('/data-deletion')); ?>">Data Deletion</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="footer-social-zone">
            <div class="footer-social-heading">
                <span><?php echo e($siteSettings['footer_social_kicker'] ?? 'Connect with the BangTan ARMY hub'); ?></span>
                <h3><?php echo e($siteSettings['footer_social_title'] ?? 'Find us across the Universe'); ?></h3>
                <p><?php echo e($siteSettings['footer_social_text'] ?? 'Follow, subscribe, pin, share, and stay connected with every purple corner of BangTan.'); ?></p>
            </div>

            <div class="social-galaxy-grid">
                <?php $__empty_1 = true; $__currentLoopData = $socialLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <a
                        href="<?php echo e($social->url); ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="social-galaxy-card social-<?php echo e($social->css_class ?: 'default'); ?>"
                        aria-label="Open <?php echo e($social->label); ?>"
                    >
                        <span class="social-card-shine"></span>

                        <span class="social-icon-orb">
                            <?php echo e($social->icon ?: '💜'); ?>

                        </span>

                        <span class="social-info">
                            <strong><?php echo e($social->label); ?></strong>
                            <small><?php echo e($social->handle ?: 'Follow us'); ?></small>
                            <em><?php echo e($social->note ?: 'Tap to visit'); ?></em>
                        </span>

                        <span class="social-arrow">↗</span>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="social-empty-card">
                        <strong>No social links added yet.</strong>
                        <span>We'll give you a way to connect with us soon, until then contact us through out Contact page :)</span>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="footer-bottom">
            <span>© <?php echo e(date('Y')); ?> <?php echo e($footerTitle); ?>.</span>
            <span class="footer-credit-line">
                Created by <a href="https://pixelcraftslab.com" target="_blank" rel="noopener noreferrer"><?php echo e($creatorName); ?></a> · Fan-made · Support official BTS content.
            </span>
        </div>
    </div>
</footer>
<?php /**PATH D:\My real data\Biz\PixelCraftsLab\Projects\BangTan\website\BangTan_3.0\resources\views/layouts/frontend/partials/footer.blade.php ENDPATH**/ ?>