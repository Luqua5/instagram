@extends('layouts.app')

@section('content')
<form action="index.php?action=registerTrait" class="form_co" method="POST">
<h3> <input type="email" name="email" id="email" placeholder="Email" required/> </h3>
         <h3>       <input type="text" name="login" id="login" placeholder="login" required/></h3>
         <h3> <input type="password" name="password" id="password" placeholder="Mot de passe" required/> </h3>
         <h3>       <input type="password" name="passwordC" id="passwordC" placeholder="Confirmez le mot de passe" required/></h3>
          <input type="submit" value="S'enregistrer" name="connecter">

          <div id="compte">
        <p>Vous avez déjà un compte ? <a href="index.php?action=login"> Connectez-vous </a> </p>
        </div>
</form>
@endsection