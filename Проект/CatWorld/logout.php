<?php
session_start();

include "path.php";

unset($_SESSION['id_admin']);
unset($_SESSION['login']);

header('location: ' . BASE_URL . 'main.php');
?>