<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php echo e($siteSettings['site_subtitle'] ?? 'A dark purple BangTanSonyeondan fan website for BTS learning, quizzes, points, BT21, songs, gallery, and ARMY community.'); ?>">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta name="app-url" content="<?php echo e(url('/')); ?>">
<title><?php echo $__env->yieldContent('title', $siteSettings['site_title'] ?? 'BangTanSonyeondan'); ?></title>
<link rel="shortcut icon" href="<?php echo e(asset('favicons/logo.png')); ?>" type="image/x-icon">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&family=Poppins:wght@500;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(asset('css/bts-ui.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/bts-learn-quiz.css')); ?>"><?php /**PATH D:\My real data\Biz\PixelCraftsLab\Projects\BangTan\website\BangTan_3.0\resources\views/layouts/frontend/partials/head.blade.php ENDPATH**/ ?>