<?php  $menu = 3;  ?>


<?php $__env->startSection('content'); ?>


<?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>


<div class="article">
<span class="nom"> <?php echo e($article['login']); ?> </span>
<img src="<?php echo e($article['img_url']); ?>">
<h3> <?php echo e($article['titre']); ?> </h3>
<div class="dessous"> 
    <p><?php echo e($article['tags']); ?></p> 
    <div class="icone"> <a href=""> <i class='bx bx-message-rounded-dots bx-lg'></i> </a> <a href=""> <i class='bx bx-heart bx-lg'> </i> </a>  </div>

</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

<p>RIEN</p>

<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.connected', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>