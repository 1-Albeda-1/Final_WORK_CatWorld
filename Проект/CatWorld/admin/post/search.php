<?php 
  include "../../path.php";
  include "../../app/controllers/posts.php";
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $kittens = SearchKittens($_POST['search']);
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="apple-touch-icon" sizes="180x180" href="../../assets/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../assets/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../assets/favicons/favicon-16x16.png">
  <link rel="manifest" href="../../assets/favicons/site.webmanifest">
  <link rel="mask-icon" href="../../assets/favicons/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="../../assets/CSS/normalize.css">
  <link rel="stylesheet" href="../../assets/CSS/style-menu.css">
  <link rel="stylesheet" href="../../assets/CSS/style-footer.css">
  <link rel="stylesheet" href="../../assets/CSS/style-admin.css">
  <title>Панель администратора</title>
</head>
<body>
  <?php include("../../app/include/header-admin.php")?>

 
  <div class="conteiner">
    <div class="admin-content">
      <div class=admin-content-up>
      <div class="title">Управление таблицей "Котята"</div>
      <div class="table-search">
        <form class="form-search" action="search.php" method="POST">
          <input name="search" placeholder="Поиск" type="search">
          <button type="submit"></button>
        </form>
      </div>
      </div>
      
      <div class="posts col-12">
        <div class="row title-table">
          <div class="id col-1">ID</div>
          <div class="name col-1">Кличка</div>
          <div class="breed col-1">Порода</div>
          <div class="age col-1">Возраст</div>
          <div class="gender col-1">Пол</div>
          <div class="color col-1">Окрас</div>
          <div class="description	col-2">Описание</div>
          <div class="edit col-1">Редактировать</div>
          <div class="delete col-1">Удалить</div>    
          <div class="reserved col-1">Резервация</div>
        </div>
        <div class="create-line-horizontal"></div>  
        <?php foreach($kittens as $key => $kitten) : ?>
        <div class="row post">
          <div class="id col-1"><?=$kitten['id_kitten']; ?></div>
          <div class="name col-1"><?=$kitten['name']; ?></div>
          <div class="breed col-1"><?=$kitten['breed_title']; ?></div>
          <div class="age col-1"><?=$kitten['age_title']; ?></div>
          <div class="gender col-1"><?=$kitten['gender_title']; ?></div>
          <div class="color col-1"><?=$kitten['color_title']; ?></div>
          <div class="description	col-2"><?=$kitten['kitten_description']; ?></div>
          <form class="popup-form" action="#popup" method="POST">
            <input name="id" type="hidden" value="<?=$kitten['id_kitten']; ?>">
            <input name="reserved" type="hidden" value="<?=$kitten['reserved']; ?>">
            <button class="setting-button col-1" type="submit"></button>
          </form>   
          <div class="edit col-1"><a href="edit.php?id=<?=$kitten['id_kitten']; ?>">edit</a></div>
          <div class="delete col-1"><a href="edit.php?del_id=<?=$kitten['id_kitten']; ?>">delete</a></div>
          <?php if($kitten['reserved'] == 0) : ?>
          <div class="reserved col-1"><a href="edit.php?reserved=1&res_id=<?=$kitten['id_kitten']; ?>">Зарезервировать</a></div>
          <?php else : ?>
            <div class="reserved col-1"><a href="edit.php?reserved=0&res_id=<?=$kitten['id_kitten']; ?>">Снять с резерва</a></div>
          <?php endif; ?>
        </div>
        <div class="create-line-horizontal"></div>  
        <?php endforeach; ?>
      </div>
    </div>
  </div>


  <div id="popup" class="popup">
  <div class="popup-body">
    <div class="popup-content">
      <div class="popup-content-up">
        <div class="popup-title">Настройка</div>
        <div class="popup-close-content">
          <a href="#" class="popup-close">
            <img class="popup-close-img" src="../../assets/img/kittens/close.png">
          </a>
        </div>
      </div>
      <div class="admin-popup">
        <div class="edit-popup"><a href="edit.php?id=<?=$_POST['id']; ?>">Редактировать</a></div>
        <div class="delete-popup"><a href="edit.php?del_id=<?=$_POST['id']; ?>">Удалить</a></div>
        <?php if($_POST['reserved'] == 0) : ?>
          <div class="reserved-popup"><a href="edit.php?reserved=1&res_id=<?=$_POST['id']; ?>">Зарезервировать</a></div>
        <?php else : ?>
          <div class="reserved-popup"><a href="edit.php?reserved=0&res_id=<?=$_POST['id']; ?>">Снять с резерва</a></div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>


  <div class="btn-up btn-up_hide"></div>

  <?php include("../../app/include/footer-admin.php")?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="../../assets/JS/script-button-scroll.js"></script>
</body>
</html>

