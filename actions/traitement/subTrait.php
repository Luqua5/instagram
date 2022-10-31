<?php
require_once 'actions/traitement/function.php';

$searchAbo = rechercheCompte($_POST['search'], $_SESSION['id']);



echo $blade->make("subscription", ["searchAbo" => $searchAbo])->render();
?>