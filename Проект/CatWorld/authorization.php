<?php 
  include "path.php";
  include "app/controllers/admins.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/favicons/favicon-16x16.png">
  <link rel="manifest" href="assets/favicons/site.webmanifest">
  <link rel="mask-icon" href="assets/favicons/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="assets/CSS/normalize.css">
  <link rel="stylesheet" href="assets/CSS/style-menu.css">
  <link rel="stylesheet" href="assets/CSS/style-footer.css">
  <link rel="stylesheet" href="assets/CSS/style-authorization.css">
  <title>Авторизация админинистраторов</title>
</head>
<body>

  <header>
    <div class="header-logo">
      <img src="assets/img/Logo.png" alt="" onclick="window.location.href='<?php echo BASE_URL . 'main.php'; ?>'">
    </div> 
    <div class="create-line-horizontal"></div>
    <div class="conteiner">
      <div class="header-text">
        <p>Данное окно предназначено для пользователей в статусе администратор. Если по какой-либо причине вы не обладатель данного статуса, пожалуйста кликните на логотип сайта чтобы вернуться на главную страницу.</p>
      </div> 
    </div>
    <div class="create-line-horizontal"></div>
  </header>

  <div class="authorization">
    <div class="conteiner">
      <div class="authorization-content">     
        <div class="form">
          <p class="form-error"><?=$msgError; ?></p>
          <div class="title">Авторизация</div>
            <form action="#" id="form" class="authorization-form" method="POST">      
              <input id="formLogin" class="form-input" type="text" name="login" placeholder="Логин">
              <input id="formPassword" class="form-input" type="password" name="password" placeholder="Пароль">
              <div class="form-button-select">
                <button class="form-button" type="submit" name="button-auth">Войти</button>
              </div>
            </form>         
        </div>       
      </div>
    </div>
  </div>

  <?php include("app/include/footer.php")?>

</body>
</html>
