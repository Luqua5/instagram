<?php
require_once 'actions/traitement/function.php';

//Si le mec arrive et doit se faire reconnecter grâce au cookie
if(empty($_COOKIE['token']) == false AND empty($_SESSION['id']) == true ){
    $token = $_COOKIE['token'];
    $email = verifToken($token);
    if(isset($email)){
        $_SESSION['email'] = $email[0]['email'];
        $_SESSION['id'] = $email[0]['id'];
        $actus = actu($_SESSION['id'], $_SESSION['id']);
        echo $blade->make("index", ["actus" => $actus])->render();
    }
}
//si le mec est déjà connecté alors on affiche juste les actus
elseif(empty($_SESSION['id']) == false) {
    $actus = actu($_SESSION['id'], $_SESSION['id']);
    echo $blade->make("index", ["actus" => $actus])->render();
}

//si le mec est pas connecté
else {
    echo $blade->make("login")->render();
}








?>
