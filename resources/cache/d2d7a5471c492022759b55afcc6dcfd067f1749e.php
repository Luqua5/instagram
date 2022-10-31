<?php $__env->startSection('content'); ?>



<form action="index.php?action=loginTrait" class="form_co" method="POST">
          <input type="email" name="email" id="email" placeholder="Email" required/>
          <input type="password" name="password" id="password" placeholder="Mot de passe" required/>
         
        <div id="souvenir"> <input type="checkbox" id="souvenir" name="souvenir"> <label for="souvenir"> Se souvenir de moi </label> </div>
          <input type="submit" value="Connexion" name="connecter">
</form>

<div id="compte">
<p>Vous n'avez pas de compte ? <a href="index.php?action=register"> Inscrivez-vous </a> </p>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>