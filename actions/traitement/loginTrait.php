<?php

require_once 'actions/traitement/function.php';

$email = $_POST['email'];
$password = $_POST['password'];



$login = log_in($email, $password);

if (empty($login)){ //si ce qu'on a rentré est pas dans la bdd alors il renvoit sur le formulaire
    echo $blade->make("login")->render();
}
else{ // si c'est bon il stock le mail dans la variable de session et si le souvenir est coché alors il crée un token et le met dans la bdd
    $_SESSION['email'] = $email;
    $_SESSION['id'] = $login['id'];
    if(empty($_POST['souvenir']) == false){
        $token = base_convert(hash('sha256', time() . mt_rand()), 16, 36);
        setcookie('token', $token, time()+432000);
        token($token, $email);
        
    }
    header('Location: index.php');
}




?>