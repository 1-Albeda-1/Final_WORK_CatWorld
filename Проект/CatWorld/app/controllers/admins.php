<?php

include SITE_ROOT . "/app/database/db.php"; 

$isSubmit = false;
$msgError = '';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-auth'])){
  $login = trim($_POST['login']);
  $password = trim($_POST['password']);

  if($login === '' || $password === ''){
    $msgError = "Заполните все поля перед входом!";
  } else{
    $existence = SelectOne('admins', ['login' => $login]);
    if($existence && password_verify($password, $existence['password'])){
      $_SESSION['id_admin'] = $existence['id_admin'];
      $_SESSION['login'] = $existence['username'];
      
      header('location: ' . BASE_URL . "admin/post/index.php");
    } else{
      $msgError = "Неверный логин или пароль!";     
    }
  }
} else{
  $login = '';
}
?>