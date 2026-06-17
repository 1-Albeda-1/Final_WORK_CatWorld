<?php

include SITE_ROOT . "/app/database/db.php"; 

// if(!$_SESSION) {
//   header('location: ' . BASE_URL . 'logout.php');
// }

$errMsg = [];
$id_kitten = '';
$name = '';
$breed_id = '';
$age_id = '';
$gender_id = '';
$color_id = '';
$description = '';
$characteristic = '';
$coat_lenght = '';
$house_trained = '';
$health = '';
$welcome = '';
$reserved = '';
$img = '';

$breeds = SelectAll('breeds');
$genders = SelectAll('genders');
$ages = SelectAll('ages');
$colors = SelectAll('colors');
$kittens = SelectAll('kittens');

//Код для формы создания записи
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])) {
  error_reporting(E_ALL & ~E_NOTICE);

  //Загрузка изображения
  if (!empty($_FILES['img']['name'])) {
    $imgName = $_FILES['img']['name'];
    $fileTmpName = $_FILES['img']['tmp_name'];
    $fileType = $_FILES['img']['type'];
    $destination = ROOT_PATH . "\assets\img\kittens\Котята\\" . $imgName;

    if (strpos($fileType, 'image') === false) {
        array_push($errMsg, "Подгружаемый файл не является изображением!");
    } else {
        $result = move_uploaded_file($fileTmpName, $destination);

        if ($result) {
            $_POST['img'] = $imgName;
        } else {
            array_push($errMsg, "Ошибка загрузки изображения на сервер");
        }
    }
  } else {
    array_push($errMsg, "Ошибка получения изображения");
  } 

  //Добавлнение записи
  $name = trim($_POST['name']);
  $characteristic = trim($_POST['characteristic']);
  $coat_lenght = trim($_POST['coat_lenght']);
  $house_trained = trim($_POST['house_trained']);
  $health = trim($_POST['health']);
  $welcome = trim($_POST['welcome']);
  $description = trim($_POST['description']);
  $breed_id = trim($_POST['breed_id']);
  $age_id = trim($_POST['age_id']);
  $gender_id = trim($_POST['gender_id']);
  $color_id = trim($_POST['color_id']);
  $img = trim($_POST['img']);

  if($name === '' || $characteristic === '' || $coat_lenght === '' || $house_trained === '' || $health === '' || $welcome === '' || $description === '' || $breed_id === '' || $age_id === '' || $gender_id === '' || $color_id === '' || $img === '') {
    array_push($errMsg, "Заполните все поля перед добавлением!");
  } else {
    $post = [
      'name' => $name,
      'breed_id' => $breed_id,
      'age_id' => $age_id,
      'gender_id' => $gender_id,
      'color_id' => $color_id,
      'kitten_description' => $description,
      'characteristic' => $characteristic,
      'coat_lenght' => $coat_lenght,
      'house_trained' => $house_trained,
      'health' => $health,
      'welcome' => $welcome,
      'img' =>  "assets/img/kittens/Котята/" . $img,
      'reserved' => 0,
    ];
    $post = Insert($post);
    $post = SelectOne('kittens', ['id_kitten' => $id_kitten]);
    header('location: ' . BASE_URL . "admin/post/index.php");
  }    
} else {
  $name = '';
  $description = '';
  $characteristic = '';
  $coat_lenght = '';
  $house_trained = '';
  $health = '';
  $welcome = '';
}

//Редактирование записи
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {  
  $post = SelectOne('kittens', ['id_kitten' => $_GET['id']]);
  
  $id_kitten = $post['id_kitten'];
  $name = $post['name'];
  $characteristic = $post['characteristic'];
  $coat_lenght = $post['coat_lenght'];
  $house_trained = $post['house_trained'];
  $health = $post['health'];
  $welcome = $post['welcome'];
  $description = $post['kitten_description'];
  $breed_id = $post['breed_id'];
  $age_id = $post['age_id'];
  $gender_id = $post['gender_id'];
  $color_id = $post['color_id'];
}

//Код для формы редактирования записи
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_post'])) {
  error_reporting(E_ALL & ~E_NOTICE);
  
  //Загрузка изображения
  if (!empty($_FILES['img']['name'])) {
    $imgName = $_FILES['img']['name'];
    $fileTmpName = $_FILES['img']['tmp_name'];
    $fileType = $_FILES['img']['type'];
    $destination = ROOT_PATH . "\assets\img\kittens\Котята\\" . $imgName;

    if (strpos($fileType, 'image') === false) {
        array_push($errMsg, "Подгружаемый файл не является изображением!");
    } else {
        $result = move_uploaded_file($fileTmpName, $destination);

        if ($result) {
            $_POST['img'] = $imgName;
        } else {
            array_push($errMsg, "Ошибка загрузки изображения на сервер");
        }
    }
  } else {
    array_push($errMsg, "Ошибка получения изображения");
  } 
  
  $id_kitten = trim($_POST['id_kitten']);
  $name = trim($_POST['name']);
  $characteristic = trim($_POST['characteristic']);
  $coat_lenght = trim($_POST['coat_lenght']);
  $house_trained = trim($_POST['house_trained']);
  $health = trim($_POST['health']);
  $welcome = trim($_POST['welcome']);
  $description = trim($_POST['description']);
  $breed_id = trim($_POST['breed_id']);
  $age_id = trim($_POST['age_id']);
  $gender_id = trim($_POST['gender_id']);
  $color_id = trim($_POST['color_id']);
  $img = trim($_POST['img']);


  if($name === '' || $characteristic === '' || $coat_lenght === '' || $house_trained === '' || $health === '' || $welcome === '' || $description === '' || $breed_id === '' || $age_id === '' || $gender_id === '' || $color_id === '' || $img === '') {
    array_push($errMsg, "Заполните все поля перед сохранением!");
  } else {
    $post = [
      'name' => $name,
      'breed_id' => $breed_id,
      'age_id' => $age_id,
      'gender_id' => $gender_id,
      'color_id' => $color_id,
      'kitten_description' => $description,
      'characteristic' => $characteristic,
      'coat_lenght' => $coat_lenght,
      'house_trained' => $house_trained,
      'health' => $health,
      'welcome' => $welcome,
      'img' => "assets/img/kittens/Котята/" . $img,
    ];
    $post = Update($id_kitten, $post);
    header('location: ' . BASE_URL . "admin/post/index.php");
  }
}

//Присвоение записи статуса резерва
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['res_id'])) {  
  $id_kitten = $_GET['res_id'];
  $reserved = $_GET['reserved'];
  
  $post = Update($id_kitten, ['reserved' => $reserved]);
  header('location: ' . BASE_URL . "admin/post/index.php");
  exit();
}

//Удаление записи
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])) {  
  $id_kitten = $_GET['del_id'];

  Delete($id_kitten);
  header('location: ' . BASE_URL . "admin/post/index.php");
}
?>