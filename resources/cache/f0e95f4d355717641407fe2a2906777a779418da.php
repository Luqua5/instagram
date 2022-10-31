<?php  $menu = 2;  ?>



<?php $__env->startSection('topMenu'); ?>

<?php if(isset($recherches)): ?>
<header>
    <form action="index.php?action=searchTrait" method="POST" id="form-search">
    <input type="text" value=<?php echo e($recherches); ?> name="search" id="search" placeholder="Rechercher" >
    <button type="submit" class="search"> <img src="public/images/search-regular-24.png" alt="recherche" > </button>
    </form>
</header>

<?php else: ?>
<header>
    <form action="index.php?action=searchTrait" method="POST" id="form-search">
    <input type="text" name="search" id="search" placeholder="Rechercher" >
    <button type="submit" class="search"> <img src="public/images/search-regular-24.png" alt="recherche" > </button>
    </form>
</header>

<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<?php if(isset($tags)): ?>

<?php $__empty_1 = true; $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>


<div class="article">
<span class="nom"> <?php echo e($tag['login']); ?> </span>
<img src="<?php echo e($tag['img_url']); ?>">
<h3> <?php echo e($tag['titre']); ?> </h3>
<div class="dessous"> 
    <p><?php echo e($tag['tags']); ?></p> 
    <div class="icone"> <a href=""> <img src="public/images/message-rounded-dots-regular-24.png"> </a> <a href=""> <img src="public/images/heart-regular-24.png"> </a>  </div>

</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

<p>Aucun article</p>

<?php endif; ?>

<?php endif; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.connected', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>