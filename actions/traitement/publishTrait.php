<?php
require_once 'actions/traitement/function.php';


$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
$detectedType = exif_imagetype($_FILES['publier']['tmp_name']);

if(in_array($detectedType, $allowedTypes)){ //verifie si l'extension de l'image appartient a l'une de celle dans le tab allowedtype
    $titre = $_POST['titre'];
    $tags = filter_var($_POST['tags'], FILTER_VALIDATE_REGEXP, array("options" =>array("regexp" =>'(#+[a-zA-Z0-9(_)]{1,})')));
    $nom = $_SESSION['id'].time().".".pathinfo($_FILES['publier']['name'], PATHINFO_EXTENSION); //on crée un nouveau nom pour le fichier: id de la personne+le temps écoulé de puis 1970+l'extension
    $emplacement = "./public/upload/$nom";
    $date = date('Y-m-d H:i:s');

    move_uploaded_file($_FILES['publier']['tmp_name'], $emplacement); //fonction qui permet de deplacer le fichier qu'on a upload

    publish($titre, $date, $emplacement, $_SESSION['id'], $tags);

    header('Location: index.php?action=index');

}

else{
    header('Location: index.php?action=publish');
}


//IL RESTE LE TRUC AVEC REGEXP
?>