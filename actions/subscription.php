<?php
require_once 'actions/traitement/function.php';


$abos = abonnement($_SESSION['id']);
if(isset($_POST['search'])) {
    $searchAbo = rechercheCompte($_POST['search'], $_SESSION['id']);
    echo $blade->make("subscription", ["abos" => $abos, "searchAbos" => $searchAbo])->render();

}
else{
    echo $blade->make("subscription", ["abos" => $abos])->render();
}
?>