<?php 
  include "path.php";
  include SITE_ROOT . "/app/database/db.php"; 
  $post = SelectKittenWhithFK($_POST['id_kitten']);
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
  <link rel="stylesheet" href="assets/CSS/style-kitten-select.css">
  <title>Наши котята</title>
</head>
<body>
  
  <header id="header">
    <?php include("app/include/menu.php")?>
  </header>

  <div class="card">
    <div class="conteiner">
      <div class="card-content">
        <img class="kitten-img" src="<?=$post['img']; ?>">
        <div class="card-backgroung">
          <div class="card-content-text">
            <div class="card-text card-text-title"><?=$post['name']; ?></div>
            <div class="card-text card-text-information">
              <form action="breeds-select.php" method="POST">
                <input name="id_breed" type="hidden" value="<?=$post['breed_id']; ?>">
                <input type="submit" class="button-card-text" value="<?=$post['breed_title']; ?>">
              </form>
            </div>
            <div class="dividing-line"></div>
            <div class="card-filter">
              <div class="card-text card-text-information"><?=$post['age_title']; ?></div>
              <div class="card-text card-text-information"><?=$post['gender_title']; ?></div>
              <div class="card-text card-text-information"><?=$post['color_title']; ?></div>
            </div>
            <div class="dividing-line"></div>
            <div class="card-text card-text-title">О котенке</div>
            <div class="about-kitten">
              <div class="card-text-title-information">ХАРАКТЕРИСТИКА</div>
              <div class="card-text-information"><?=$post['characteristic']; ?></div>
              <div class="card-text-title-information">ДЛИННА ШЕРСТИ</div>
              <div class="card-text-information"><?=$post['coat_lenght']; ?></div>
              <div class="card-text-title-information">ДРЕССИРОВКА</div>
              <div class="card-text-information"><?=$post['house_trained']; ?></div>
              <div class="card-text-title-information">ЗДОРОВЬЕ</div>
              <div class="card-text-information"><?=$post['health']; ?></div>
              <div class="card-text-title-information">ПРИВЕТСТВУЕТСЯ</div>
              <div class="card-text-information"><?=$post['welcome']; ?></div>
            </div>
            <div class="dividing-line"></div>
            <div class="card-text card-text-title">Знакомтесь, <?=$post['name']; ?></div>
            <div class="card-text card-text-information card-text-description"><?=$post['kitten_description']; ?></div> 
          </div>
          <div class="reserve-button-select">
              <button class="reserve-button">
                <a href="#popup" class="popup-link">Зарезервировать</a>
              </button>
            </div> 
        </div>    
      </div>   
    </div>   
  </div>
  
  <div id="popup" class="popup">
    <div class="popup-body">
      <div class="popup-content">
        <a href="#header" class="popup-close">
          <img class="popup-close-img" src="assets/img/kitten-select/close.png">
        </a>
        <div class="popup-title">Зарезервировать <?=$post['name']; ?></div>
          <div class="form">
            <form action="#" id="form" class="reservation-form">  
              <div class="input-items">
                <input id="formFio" class="form-input _req" type="text" name="fio" placeholder="ФИО">
                <input id="formEmail" class="form-input _req _email" type="text" name="email" placeholder="Почта">
                <input id="formPhone" class="form-input _req" type="text" name="phone" placeholder="+7(000)000-00-00">
              </div>
              <div class="form-title">Выберите удобный для вас способ обратной связи:</div>
              <div class="options">
                <div class="option-item">
                  <input id="formMail" class="option-input" checked type="radio" name="feedbackType" value="mail">
                  <label for="formMail" class="option-label"><span>Почта</span></label>
                </div> 
                <div class="option-item">
                  <input id="formWhatsApp" class="option-input" type="radio" name="feedbackType" value="whatsapp">
                  <label for="formWhatsApp" class="option-label"><span>WhatsApp</span></label>
                </div>
                <div class="option-item">
                  <input id="formCall" class="option-input" type="radio" name="feedbackType" value="call">
                  <label for="formCall" class="option-label"><span>Звонок</span></label>
                </div>             
              </div>
              <input type="hidden" name="kitten" value=<?=$post['name']; ?>>
              <input type="hidden" id="kittenId" name="kittenId" value=<?=$post['id_kitten']; ?>>
              <div class="form-button-select">
                <button class="form-button" type="submit">Отправить</button>
              </div>
            </form>         
          </div>
      </div>
    </div>
  </div>

  <script src="https://unpkg.com/imask"></script>
  <script src="assets/JS/script-kitten-select.js"></script>

  <?php include("app/include/footer.php")?>
</body>
</html>
