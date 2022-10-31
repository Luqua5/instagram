<?php $__env->startSection('topMenu'); ?>

<?php if(isset($recherches)): ?>
    <header>
        <form action="index.php?action=subscription" method="POST" id="form-search">
        <input type="text" value=<?php echo e($recherches); ?> name="search" id="search" placeholder="Rechercher" >
        <button type="submit" class="search"> <img src="public/images/search-regular-24.png" alt="recherche" > </button>
        </form>
    </header>

<?php else: ?>
    <header>
        <form action="index.php?action=subscription" method="POST" id="form-search">
        <input type="text" name="search" id="search" placeholder="Rechercher" >
        <button type="submit" class="search"> <img src="public/images/search-regular-24.png" alt="recherche" > </button>
        </form>
    </header>

<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php if(isset($searchAbos)): ?>
<div id="maRecherche">

    <h1>Ma recherche</h1>
    <?php $__currentLoopData = $searchAbos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $searchAbo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="resultat">
            <div>
                <h2><?php echo e($searchAbo['login']); ?></h2>
                <?php if(isset($searchAbo['dateAbonnement'])): ?>
                <p>Depuis le <?php  $date = new DateTime($searchAbo['dateAbonnement']); echo $date->format('d F Y');    ?></p>
                <?php endif; ?>
            </div>
            <?php if($searchAbo['idAmi'] == $_SESSION['id']): ?>
                <a href='index.php?action=delFriend&id=<?php echo e($searchAbo['id']); ?>'> Se désabonner </a>
            <?php else: ?>
                <a href='index.php?action=addFriend&id=<?php echo e($searchAbo['id']); ?>'> S'abonner </a>
            <?php endif; ?>
        </div>

        </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>


<div id="mesAbonnement">

<h1>Mes abonnements</h1>
<?php if(isset($abos)): ?>
    <?php $__empty_1 = true; $__currentLoopData = $abos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <form action="index.php?action=subscription" method="POST">
        <div class="resultat">

            <div>
                <h2><?php echo e($abo['login']); ?></h2>
                <p>Depuis le <?php  $date = new DateTime($abo['dateAbonnement']); echo $date->format('d F Y');    ?></p>
            </div>

            <a href='index.php?action=delFriend&id=<?php echo e($abo['id']); ?>'> Se désabonner </a>
        </div>

        </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

        Pas d'abonnement



    <?php endif; ?>
<?php endif; ?>

</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.connected', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>