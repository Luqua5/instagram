<?php
require_once 'actions/traitement/function.php';

$recherche = $_POST['search'];

$tags = recherche($_POST['search']);



echo $blade->make("search", ["tags" => $tags], ["recherches" => $recherche])->render();

?>