
<?php $__env->startSection('title', 'Quiz Arena · BangTanSonyeondan'); ?>
<?php $__env->startSection('content'); ?>
<section class="quiz-arena-hero">
    <div>
        <span class="eyebrow">Blooket-style BTS Quiz Arena</span>
        <h1>Search quizzes. Play levels. Earn points.</h1>
        <p>Quizzes are now totally separate from learning material. Learn in the gallery, then come here to test your ARMY brain and climb the leaderboard.</p>
        <div class="hero-actions">
            <a class="btn primary" href="<?php echo e(route('learn.index')); ?>">Open Learning Gallery</a>
            <a class="btn ghost" href="<?php echo e(route('leaderboard')); ?>">Leaderboard</a>
        </div>
    </div>
    <div class="quiz-score-tower">
        <span>Quiz modes</span>
        <b><?php echo e($quizzes->count()); ?></b>
        <small>available now</small>
    </div>
</section>

<section class="quiz-filter-panel glass-panel">
    <form method="GET" action="<?php echo e(route('quizzes.index')); ?>" class="learning-filter-form">
        <label>
            Search quizzes
            <input type="search" name="q" value="<?php echo e($query); ?>" placeholder="Try: rookie, MV, members, borahae...">
        </label>
        <label>
            Category
            <select name="category">
                <option value="">All categories</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item); ?>" <?php if($category === $item): echo 'selected'; endif; ?>><?php echo e($item); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </label>
        <label>
            Level
            <select name="difficulty">
                <option value="">All levels</option>
                <?php $__currentLoopData = $difficulties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item); ?>" <?php if($difficulty === $item): echo 'selected'; endif; ?>><?php echo e(ucfirst($item)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </label>
        <button class="btn primary" type="submit">Find Quiz</button>
    </form>
</section>

<?php if($quizzes->isEmpty()): ?>
    <section class="empty-state-card">
        No quizzes found yet. Admin can add quizzes from <strong>Admin → Quizzes</strong>.
    </section>
<?php else: ?>
    <section class="quiz-game-grid">
        <?php $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="quiz-game-card difficulty-<?php echo e($quiz->difficulty); ?> <?php echo e($quiz->is_featured ? 'featured' : ''); ?>">
                <div class="quiz-card-top">
                    <?php if($quiz->cover_image): ?>
                        <img src="<?php echo e(asset($quiz->cover_image)); ?>" alt="<?php echo e($quiz->title); ?>">
                    <?php else: ?>
                        <div class="quiz-cover-fallback">?</div>
                    <?php endif; ?>
                    <span><?php echo e($quiz->levelLabel()); ?></span>
                </div>
                <div class="quiz-card-body">
                    <small><?php echo e($quiz->category); ?> · <?php echo e($quiz->questions_count); ?> questions</small>
                    <h2><?php echo e($quiz->title); ?></h2>
                    <p><?php echo e($quiz->description); ?></p>
                    <div class="quiz-reward-row">
                        <b>+<?php echo e(number_format($quiz->points_per_question)); ?></b><span>per correct</span>
                        <?php if($quiz->bonus_points): ?>
                            <b>+<?php echo e(number_format($quiz->bonus_points)); ?></b><span>perfect bonus</span>
                        <?php endif; ?>
                    </div>
                    <a class="btn primary" href="<?php echo e(route('quizzes.show', $quiz->slug)); ?>">Play Quiz</a>
                </div>
            </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\My real data\Biz\PixelCraftsLab\Projects\BangTan\website\BangTan_3.0\resources\views/quizzes/index.blade.php ENDPATH**/ ?>