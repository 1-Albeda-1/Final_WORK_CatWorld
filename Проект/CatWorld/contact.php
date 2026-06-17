<?php 
  include "path.php";
  include "app/controllers/posts.php"; 
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
  <link rel="stylesheet" href="assets/CSS/style-contact.css">
  <title>Контакты</title>
</head>
<body>
  
  <header>
    <?php include("app/include/menu.php")?>
  </header>

  <div class="contact">
    <div class="conteiner">
      <div class="contact-content">
        <img class="contact-img" src="assets/img/contact/LeftBlock.png">
        <div class="contact-data">
          <div class="title">Служба поддержки</div>
          <div class="form">
            <form action="#" id="form" class="contact-form">  
              <input id="formFio" class="form-input _req" type="text" name="fio" placeholder="Ваше ФИО">
              <input id="formEmail" class="form-input _req _email" type="text" name="email" placeholder="Введите почту">
              <textarea id="formMessage" class="form-input" type="text" name="message" placeholder="Введите проблему или вопрос"></textarea>
              <div class="form-button-select">
                <button class="form-button" type="submit">Отправить</button>
              </div>
            </form>         
          </div>       
        </div>
      </div>
    </div>
  </div>

  <script src="assets/JS/script-contact.js"></script>

  <?php include("app/include/footer.php")?>
</body>
</html>
