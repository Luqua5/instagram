<?php
require_once 'actions/traitement/function.php';

del($_SESSION['id'], $_GET['id']);
$abos = abonnement($_SESSION['id']);
echo $blade->make("subscription", ["abos" => $abos])->render();

?>