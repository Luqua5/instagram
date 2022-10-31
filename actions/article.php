<?php

require_once 'actions/traitement/function.php';

$articles = article($_SESSION['id']);

echo $blade->make("article", ["articles" => $articles])->render();


?>