<?php 
require_once 'actions/traitement/function.php';

$email = $_POST['email'];
$login = $_POST['login'];
$password = $_POST['password'];
$passwordC = $_POST['passwordC'];

$verif = verif($email, $login);


if ($password == $passwordC AND $verif == FALSE) {
  sign_in($login, $password, $email);
  header('Location: index.php?action=login');
}
else{header('Location: index.php?action=register');}

?>