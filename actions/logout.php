<?php

unset($_SESSION['email']);
unset($_SESSION['id']);
setcookie('token', '', time()-1);


header('location: index.php');
?>