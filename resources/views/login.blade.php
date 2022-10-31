@extends('layouts.app')

@section('content')



<form action="index.php?action=loginTrait" class="form_co" method="POST">
          <input type="email" name="email" id="email" placeholder="Email" required/>
          <input type="password" name="password" id="password" placeholder="Mot de passe" required/>
         
        <div id="souvenir"> <input type="checkbox" id="souvenir" name="souvenir"> <label for="souvenir"> Se souvenir de moi </label> </div>
          <input type="submit" value="Connexion" name="connecter">
</form>

<div id="compte">
<p>Vous n'avez pas de compte ? <a href="index.php?action=register"> Inscrivez-vous </a> </p>
</div>
@endsection