<?php 
  include "path.php";
  include "app/controllers/posts.php"; 
  
  $page = isset($_GET['page']) ? $_GET['page']: 1;
  if(is_numeric($page)){
    $limit = 6;
    $offset = $limit * ($page - 1);
    $total_pages = ceil(CountRow('kittens') / $limit);
    $kittens = SelectAllPagination('kittens', $limit, $offset);
  }
  else {
    header('location: ' . BASE_URL . "main.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
  <link rel="stylesheet" href="assets/CSS/style-pagination.css">
  <link rel="stylesheet" href="assets/CSS/style-button-up.css">
  <link rel="stylesheet" href="assets/CSS/style-kittens.css">
  <title>Наши котята</title>
</head>
<body>

  <header>
    <?php include("app/include/menu.php")?>
      <div class="conteiner">
        <div class="header-flex">
          <div class="header-img">
            <img src="assets/img/kittens/Кот.png">
          </div>
          <div class="header-text">
            <div class="text-hight _anim-items">Покупка котёнка на нашем сайте — это простой и удобный процесс!</div>
            <div class="text-small _anim-items">Мы предоставляем информацию о каждом котёнке, включая его возраст, пол, окрас и породу.</div>
          </div>
        </div>
      </div> 
  </header>

  <div class="kittens">
    <div class="conteiner">
      <button class="filter-button-hidden">
        <a href="#popup" class="popup-link">Фильтрация</a>
      </button>
      <div class="kittens-content">
        <div class="kittens-flex">
          <?php foreach ($kittens as $key => $kitten): ?>
            <div class="kitten-select">
              <div class="kitten">
                <img class="kittens-img" src="<?=$kitten['img']; ?>">
                <form class="kitten-select-form" action="kittens-select.php" method="POST">
                  <input name="id_kitten" type="hidden" value="<?=$kitten['id_kitten']; ?>">
                  <input type="submit" class="kittens-text" value="<?=$kitten['name']; ?>">
                </form>
              </div>
            </div>
          <?php endforeach; ?>           
        </div> 
        <div class="vertical-line"></div>
        <div class="kittens-filter">
          <?php include("app/include/kittens-filter-select.php")?> 
        </div>        
      </div>    
      <?php include("app/include/pagination.php")?>            
    </div>   
  </div>

  <div id="popup" class="popup">
    <div class="popup-body">
      <div class="popup-content">
        <a href="#header" class="popup-close">
          <img class="popup-close-img" src="assets/img/kittens/close.png">
        </a>
        <div class="popup-title">Фильтрация</div>
        <div class="kittens-filter-popup">
          <?php include("app/include/kittens-filter-select.php")?> 
        </div>
      </div>
    </div>
  </div>

  <div class="btn-up btn-up_hide"></div>

  <?php include("app/include/footer.php")?>

  <script src="assets/JS/script-button-scroll.js"></script>
  <script src="assets/JS/script-animation.js"></script>
</body>
</html>
