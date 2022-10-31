<?php 

function log_in($email, $password){
    global $pdo;
    $sql = "SELECT * FROM user WHERE email=? AND mdp=?";
    $query=$pdo->prepare($sql);
    $query->execute(array($email, sha1($password)));
    $line=$query->fetch();
    if(isset($line['id'])==true){
      return  array("email" => $email,
                    "id" => $line['id']);  
    }
}


function sign_in($login, $password, $email){
    global $pdo;
    $sql = "INSERT INTO user (login, mdp, email)
    VALUES (?,sha1(?), ?)";
    $query=$pdo->prepare($sql);
    $query->execute(array($login,$password,$email));
}
  
function verif($email, $login){ //vérifie si le mec s'est deja inscrit avec cette adresse ou si ya deja ce pseudo
    global $pdo;
    $sql = "SELECT email FROM user WHERE email = ? or login=?";
    $query=$pdo->prepare($sql);
    $query->execute(array($email, $login));
    $line=$query->fetch();
    if (empty($line)){
        return FALSE;
    }
    else {
        return TRUE;
    }
}

function token($token, $email){ //Insertion du token dans la table
    global $pdo;
    $sql = "UPDATE user 
    SET remember = ?
    WHERE email=?";
    $query=$pdo->prepare($sql);
    $query->execute(array($token, $email));
}


function verifToken($token){ //Vérification du token dans la base
    global $pdo;
    $sql = "SELECT email, id FROM user WHERE remember=?";
    $query=$pdo->prepare($sql);
    $query->execute(array($token));
    $line=$query->fetchAll();
    return $line;
}

function publish($titre,$date, $img_url,$id, $tags){//insertion des infos sur la publication dans la bdd
    global $pdo;
    $sql = "INSERT INTO article (titre, dateEcrit, img_url, idAuteur, tags)
    VALUES (?, ?, ?, ?, ?)";
    $query=$pdo->prepare($sql);
    $query->execute(array($titre,$date, $img_url,$id, $tags));

}


function article($id) { //recuperation des articles de la personne connecté 
    global $pdo;
    $sql = "SELECT article.*, user.login FROM article INNER JOIN user ON user.id= article.idAuteur 
    WHERE idAuteur = ? 
    ORDER BY dateEcrit DESC";
    $query=$pdo->prepare($sql);
    $query->execute(array($id));
    $line = $query->fetchAll();
    return $line;

}


function recherche($tag) {
    global $pdo;
    $sql = "SELECT article.*, user.login FROM article INNER JOIN user ON user.id= article.idAuteur 
    WHERE article.tags LIKE ?
    ORDER BY dateEcrit DESC";
    $query=$pdo->prepare($sql);
    $query->execute(array('%'.$tag.'%'));
    $line = $query->fetchAll();
    return $line;
}

function abonnement($abo) { //recuperer les infos sur les personnes a qui on est abonné
    global $pdo;
    $sql = "SELECT user.id,user.login,friend.dateAbonnement from friend INNER JOIN user ON user.id = friend.idAmi
    WHERE friend.idAbonne = ?";
    $query=$pdo->prepare($sql);
    $query->execute(array($abo));
    $line = $query->fetchAll();
    return $line;
}

function rechercheCompte($recherche, $id) { //Pour la recherche de compte
    global $pdo;
    $sql = "SELECT user.id, user.login, friend.dateAbonnement, friend.idAmi from user  left join friend on user.id=friend.idAmi
    WHERE login like ? and user.id != ?";
    $query=$pdo->prepare($sql);
    $query->execute(array('%'.$recherche.'%', $id));
    $line = $query->fetchAll();
    return $line;
}

function add($idAbo, $idAmi){ //ajouter des amis
    global $pdo;
    $sql = "INSERT INTO friend (idAbonne, idAmi, dateAbonnement) values (?, ?, NOW())";
    $query=$pdo->prepare($sql);
    $query->execute(array($idAbo, $idAmi));
    $line = $query->fetchAll();
    return $line;
}


function del($idAbo, $idAmi){ //supprimer des amis 
    global $pdo;
    $sql = "DELETE FROM friend WHERE idAbonne = ? AND idAmi = ?";
    $query=$pdo->prepare($sql);
    $query->execute(array($idAbo, $idAmi));
    $line = $query->fetchAll();
    return $line;
}

function verifAmi($id){ //vérfie si on a le mec en ami
    global $pdo;
    $sql = "SELECT idAmi FROM friend WHERE idAbonne = ?";
    $query=$pdo->prepare($sql);
    $query->execute(array($id));
    $line = $query->fetchAll();
    return $line;
}

function actu($id, $id1){
    global $pdo;
    $sql = "SELECT article.*,user.login FROM article
    INNER JOIN user on user.id = article.idAuteur
    WHERE idAuteur in (SELECT friend.idAmi FROM friend WHERE idAbonne= ? UNION select ?)
    ORDER BY dateEcrit DESC";
    $query=$pdo->prepare($sql);
    $query->execute(array($id, $id1));
    $line = $query->fetchAll();
    return $line;
}


?>
