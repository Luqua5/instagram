<?php  $menu = 1;  ?>


<?php $__env->startSection('content'); ?>

<div id='actu'> 
<?php $__empty_1 = true; $__currentLoopData = $actus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

    <div class="article">
        <span class="nom"> <?php echo e($actu['login']); ?> </span>
        <img src="<?php echo e($actu['img_url']); ?>">
    </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

<p>Il n'y a pas de publication</p>

<?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.connected', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>