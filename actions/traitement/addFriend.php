<?php
require_once 'actions/traitement/function.php';
$comptes = verifAmi($_SESSION['id']);
$abos = abonnement($_SESSION['id']);
$verif = TRUE;

foreach($comptes as $compte){ // boucle qui verifie si la personne qu'on veut ajotuer est pas deja dans nos amis
    
    if ($compte['idAmi'] == $_GET['id']){
        $verif = FALSE;
    }
}


if($verif == TRUE){
    add($_SESSION['id'], $_GET['id']);
}
echo $blade->make("subscription", ["abos" => $abos])->render();

?>