<?php 
  include "../../path.php";
  include "../../app/controllers/posts.php";
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
      <div class="title">Редактирование записи таблицы "Котята"</div>
      <div class="posts col-12">
        <div class="error">
          <?php include("../../app/helps/errorinfo.php")?>
        </div>
        <div class="row add-post">
          <form action="#" method="POST" enctype="multipart/form-data">
            <input value="<?=$id_kitten; ?>" name="id_kitten" type="hidden">
            <div class="col">
              <input value="<?=$name; ?>" name="name" type="text" class="form-control" placeholder="Кличка">
            </div>
            <select name="breed_id"  class="form-select" aria-label="Default select example">
              <option disabled>Выберите породу котенка</option>
              <?php foreach($breeds as $key => $breed) : ?>
                <option value="<?=$breed['id_breed']; ?>"><?=$breed['breed_title']; ?></option>
              <?php endforeach; ?>
            </select>
            <select name="age_id" class="form-select" aria-label="Default select example">
              <option disabled>Выберите возраст котенка</option>
              <?php foreach($ages as $key => $age) : ?>
                <option value="<?=$age['id_age']; ?>"><?=$age['age_title']; ?></option>
              <?php endforeach; ?>
            </select>
            <select name="gender_id"  class="form-select" aria-label="Default select example">
              <option disabled>Выберите пол котенка</option>
              <?php foreach($genders as $key => $gender) : ?>
                <option value="<?=$gender['id_gender']; ?>"><?=$gender['gender_title']; ?></option>
              <?php endforeach; ?>
            </select>
            <select name="color_id"  class="form-select" aria-label="Default select example">
              <option disabled>Выберите окрас шерсти</option>
              <?php foreach($colors as $key => $color) : ?>
                <option value="<?=$color['id_color']; ?>"><?=$color['color_title']; ?></option>
              <?php endforeach; ?>
            </select>
            <div class="col">
              <input value="<?=$characteristic; ?>" name="characteristic" type="text" class="form-control" placeholder="Характеристика">
            </div>
            <div class="col">
              <input value="<?=$coat_lenght; ?>" name="coat_lenght" type="text" class="form-control" placeholder="Длинна шерсти">
            </div>
            <div class="col">
              <input value="<?=$house_trained; ?>" name="house_trained" type="text" class="form-control" placeholder="Дрессировка">
            </div>
            <div class="col">
              <input value="<?=$health; ?>" name="health" type="text" class="form-control" placeholder="Здоровье">
            </div>
            <div class="col">
              <input value="<?=$welcome; ?>" name="welcome" type="text" class="form-control" placeholder="Приветствуется наличие...">
            </div>
            <div class="col">
              <label for="content" class="form-label">Описание котенка</label>
              <textarea name="description" id="content" class="form-control" placeholder="Описание" rows="3"><?=$description; ?></textarea>
            </div>
            <div class="input-group col">
              <input name="img" type="file" class="form-control" id="inputGroupFile02">
              <label class="input-group-text" for="inputGroupFile02">Загрузить</label>
            </div>
            <div class="col">
              <div class="header-button-select">
                <button name="edit_post" class="form-button" type="submit">Сохранить запись</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php include("../../app/include/footer-admin.php")?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
</body>
</html>

