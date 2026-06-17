<?php 
  include "path.php";
  include "app/controllers/posts.php"; 

  $URL = '?paramsTitle=' . $_GET['paramsTitle'] . '&paramsValue=' . $_GET['paramsValue'];

  $page = isset($_GET['page']) ? $_GET['page']: 1;
  if(is_numeric($page)){
  $limit = 9;
  $offset = $limit * ($page - 1);
  $total_pages = ceil(CountRowFilterBreeds([$_GET['paramsTitle'] => $_GET['paramsValue']]) / $limit);
  $breeds = CheckFilterBreeds([$_GET['paramsTitle'] => $_GET['paramsValue']], $limit, $offset);
  } else {
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
  <link rel="stylesheet" href="assets/CSS/style-breeds.css">
  <title>Породы</title>
</head>
<body>
  
  <header> 
    <?php include("app/include/menu.php")?>
      <div class="header-content">
        <div class="header-img _anim-items">
          <div class="conteiner">
            <p class="header-text">Найди лучшую породу для твоего образа жизни</p>
            <button class="filter-button-header">
                <a href="#popup" class="popup-link">Фильтрация</a>
            </button>
          </div>  
        </div>               
      </div>  
  </header>
  
  <div class="breeds">
    <div class="conteiner">
      <div class="breeds-content">
        <div class="breeds-cats">
          <?php foreach ($breeds as $key => $breed): ?>
          <div class="breeds-cat-select">
            <div class="breeds-cat">
              <img class="cat-img" src="<?=$breed['img']; ?>">
              <form class="breeds-select-form" action="breeds-select.php" method="POST">
                <input name="id_breed" type="hidden" value="<?=$breed['id_breed']; ?>">
                <input type="submit" class="cat-text" value="<?=$breed['breed_title']; ?>">
              </form>
            </div>
          </div>
          <?php endforeach; ?>
        </div> 
        <div class="vertical-line"></div>
        <div class="breeds-filter">
          <?php include("app/include/breeds-filter-button.php")?> 
        </div>
        <?php include("app/include/pagination-filter.php")?> 
      </div>
    </div>   
  </div>

  <div id="popup" class="popup">
    <div class="popup-body">
      <div class="popup-content">
        <a href="#header" class="popup-close">
          <img class="popup-close-img" src="assets/img/breeds/close.png">
        </a>
        <div class="popup-title">Фильтрация</div>
        <div class="breeds-filter-popup">
          <?php include("app/include/breeds-filter-button.php")?> 
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
