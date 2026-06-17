<?php 
  include "path.php";
  include SITE_ROOT . "/app/database/db.php"; 
  $post = SelectOne('breeds', ['id_breed' => $_POST['id_breed']]);
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
  <link rel="stylesheet" href="assets/CSS/style-breeds-select.css">
  <title>Породы</title>
</head>
<body>
  
  <header>
    <?php include("app/include/menu.php")?>
      <div class="conteiner">
        <img class="header-buy" src="assets/img/breeds-select/БлокКупи.png">
        <div class="header-img">
          <img src="assets/img/breeds-select/Кот.png">
        </div>
      </div>   
      </div>  
  </header>

  <div class="breed">
    <div class="conteiner">
      <div class="breed-title _anim-items"><?=$post['breed_title']; ?></div>
      <div class="breed-content">
        <div class="breed-img">
          <img src="<?=$post['img']; ?>">
        </div>
        <div class="breed-description _anim-items"><?=$post['breed_description']; ?></div>
      </div>
      <div class="breed-statistic">
        <div class="breed-statistic-left _anim-items">
          <div class="statistic-item">
            <div class="statistic-title">Игривость</div>
            <img class="statistic-line" src="<?=StatusBarBreeds($post['playfulness']);?>">
          </div>
          <div class="statistic-item">
            <div class="statistic-title">Дружелюбие к животным</div>
            <img class="statistic-line" src="<?=StatusBarBreeds($post['friendly_pets']);?>">
          </div>
          <div class="statistic-item">
            <div class="statistic-title">Требования к уходу</div>
            <img class="statistic-line" src="<?=StatusBarBreeds($post['requirements']);?>">
          </div>
          <div class="statistic-item">
            <div class="statistic-title">Потребность во внимании</div>
            <img class="statistic-line" src="<?=StatusBarBreeds($post['attention']);?>">
          </div>
          <div class="statistic-item">
            <div class="statistic-title">Послушание</div>
            <img class="statistic-line" src="<?=StatusBarBreeds($post['doclity']);?>">
          </div>
          <div class="statistic-item">
            <div class="statistic-title">Независимость</div>
            <img class="statistic-line" src="<?=StatusBarBreeds($post['independence']);?>">
          </div>
        </div>
        <div class="breed-statistic-right _anim-items">
          <div class="statistic-item">
            <div class="statistic-title">Уровень активности</div>
            <img class="statistic-line" src="<?=StatusBarBreeds($post['activity']);?>">
          </div>
          <div class="statistic-item">
            <div class="statistic-title">Дружелюбие к детям</div>
            <img class="statistic-line" src="<?=StatusBarBreeds($post['friendly_children']);?>">
          </div>
          <div class="statistic-item">
            <div class="statistic-title">Громкость</div>
            <img class="statistic-line" src="<?=StatusBarBreeds($post['vocality']);?>">
          </div>
          <div class="statistic-item">
            <div class="statistic-title">Привязанность к владельцам</div>
            <img class="statistic-line" src="<?=StatusBarBreeds($post['affection']);?>">
          </div>
          <div class="statistic-item">
            <div class="statistic-title">Интеллект</div>
            <img class="statistic-line" src="<?=StatusBarBreeds($post['inteligence']);?>">
          </div>
          <div class="statistic-item">
            <div class="statistic-title">Выносливость</div>
            <img class="statistic-line" src="<?=StatusBarBreeds($post['hardiness']);?>">
          </div>
        </div>
      </div>  
      <div class="responsibility-text">Отказ от ответственности: Хотя упомянутые здесь характеристики часто могут характеризовать эту породу, кошки — это личности, чей характер и внешний вид могут различаться. Пожалуйста, обратитесь в организацию по усыновлению для получения подробной информации о конкретном домашнем животном.</div> 
    </div>
  </div>

  <?php include("app/include/footer.php")?>
  <script src="assets/JS/script-animation.js"></script>
</body>
</html>
