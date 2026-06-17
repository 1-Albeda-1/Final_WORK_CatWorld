<?php

session_start();
require('connect.php');

function tt($value){
  echo '<pre>';
  print_r($value);
  echo '</pre>';
}

//Проверяем выполнение запроса к БД
function dbCheckError($query){
  $errInfo = $query->errorInfo();
  if($errInfo[0] !== PDO::ERR_NONE){
    echo $errInfo[2];
    exit();
  }
  return true;
}

//Запрос на получение данных одной таблицы
function SelectAll($table){
  global $pdo;
  $sql = "SELECT * FROM $table";

  $query = $pdo->prepare($sql);
  $query->execute();

  dbCheckError($query);

  return $query->fetchAll(); 
}

//Подсчет кол-ва записей в таблице
function CountRow($table){
  global $pdo;
  $sql = "SELECT COUNT(*) FROM $table";

  $query = $pdo->prepare($sql);
  $query->execute();

  dbCheckError($query);

  return $query->fetchColumn(); 
}

//Запрос на получение данных таблицы с пагинацией
function SelectAllPagination($table, $limit, $offset){
  global $pdo;
  $sql = "SELECT * FROM $table";

  if($table == 'kittens'){
    $sql = $sql . " WHERE reserved != 1";
  }
  if(!empty($limit)){
    $sql = $sql . " LIMIT $limit OFFSET $offset";
  }
  $sql = strip_tags(stripcslashes(htmlspecialchars($sql)));
  
  $query = $pdo->prepare($sql);
  $query->execute();

  dbCheckError($query);

  return $query->fetchAll(); 
}

//Запрос на получение одной строки таблицы
function SelectOne($table, $params = []){
  global $pdo;
  $sql = "SELECT * FROM $table";

  if(!empty($params)){
    $i = 0;
    foreach($params as $key => $value){
      if(!is_numeric($value)){
        $value = "'".$value."'";
      }
      if($i === 0){
        $sql = $sql . " WHERE $key = $value";
      }else{
        $sql = $sql . " AND $key = $value";
      }
      $i++;
    }
  }
  $sql = strip_tags(stripcslashes(htmlspecialchars($sql)));
  $sql = $sql . " LIMIT 1";

  $query = $pdo->prepare($sql);
  $query->execute();

  dbCheckError($query);

  return $query->fetch(); 
}

//Фильтрация таблицы породы
function CheckFilterBreeds($params = [], $limit, $offset){
  global $pdo;
  $sql = "SELECT * FROM breeds";

  if(!empty($params)){
    foreach($params as $key => $value){
      if($value == 1){
        $sql = $sql . " WHERE $key > 0 AND $key <= 2";
      }else if($value == 2){
        $sql = $sql . " WHERE $key=3";
      }else if($value == 3){
        $sql = $sql . " WHERE $key > 3 AND $key <= 5";
      } else {
        header('location: ' . BASE_URL . "main.php");
      }
    }
  }

  if(!empty($limit)){
    $sql = $sql . " LIMIT $limit OFFSET $offset";
  }

  $query = $pdo->prepare($sql);
  $query->execute();

  dbCheckError($query);

  return $query->fetchAll(); 
}

//Подсчет кол-ва записей в отфильтрованных породах
function CountRowFilterBreeds($params){
  global $pdo;
  $sql = "SELECT COUNT(*) FROM breeds";

  if(!empty($params)){
    foreach($params as $key => $value){
      if($value == 1){
        $sql = $sql . " WHERE $key > 0 AND $key <= 2";
      }else if($value == 2){
        $sql = $sql . " WHERE $key = 3";
      }else if($value == 3){
        $sql = $sql . " WHERE $key > 3 AND $key <= 5";
      } else {
        header('location: ' . BASE_URL . "main.php");
      }
    }
  }

  $query = $pdo->prepare($sql);
  $query->execute();

  dbCheckError($query);

  return $query->fetchColumn(); 
}

//Вывод статус баров для конкретной породы
function StatusBarBreeds($params = []){
  $statusIMG = '';

  if(!empty($params)){
    if($params == 1){
      $statusIMG = "assets/img/breeds-select/Line/OrangeAndGrayLine1.png";;
    }else if($params == 2){
      $statusIMG = "assets/img/breeds-select/Line/OrangeAndGrayLine2.png";;
    }else if($params == 3){
      $statusIMG = "assets/img/breeds-select/Line/OrangeAndGrayLine3.png";;
    }else if($params == 4){
      $statusIMG = "assets/img/breeds-select/Line/OrangeAndGrayLine4.png";;
    }else{
      $statusIMG = "assets/img/breeds-select/Line/OrangeLine.png";
    }        
  }

  return $statusIMG; 
}

//Запись данных в таблицу котята
function Insert($params){
  global $pdo;

  $i = 0;
  $coll = '';
  $mask = '';

  if(!empty($params)){
    foreach($params as $key => $value){   
      if($i === 0){
        $coll = $coll . "$key";
        $mask = $mask . "'" . "$value" . "'";
      }else{
        $coll = $coll . ", $key";
        $mask = $mask . ", '" . "$value" . "'";
      }
      $i++;
    }
  }
  $coll = strip_tags(stripcslashes(htmlspecialchars($coll)));
  $mask = strip_tags(stripcslashes(htmlspecialchars($mask)));

  $sql = "INSERT INTO kittens ($coll) VALUES ($mask)";

  $query = $pdo->prepare($sql);
  $query->execute();

  dbCheckError($query);

  return $query->fetch(); 
}

//Обновление данных в таблице котята
function Update($kittenId, $params){
  global $pdo;
  $kittenId = trim(strip_tags(stripcslashes(htmlspecialchars($kittenId))));
  $i = 0;
  $str = '';

  if(!empty($params)){
    foreach($params as $key => $value){   
      if($i === 0){
        $str = $str . $key . " = '" . $value . "'";

      }else{
        $str = $str . ", " . $key . " = '" . "$value" . "'";
      }
      $i++;
    }
  }

  $str = strip_tags(stripcslashes(htmlspecialchars($str)));
  $sql = "UPDATE kittens SET $str WHERE id_kitten = $kittenId";
  
  $query = $pdo->prepare($sql);
  $query->execute();

  dbCheckError($query);

  return $query->fetch(); 
}

//Удаление данных в таблице котята
function Delete($kittenId){
  global $pdo;
  $kittenId = trim(strip_tags(stripcslashes(htmlspecialchars($kittenId))));

  $sql = "DELETE FROM kittens WHERE id_kitten = $kittenId";

  $query = $pdo->prepare($sql);
  $query->execute();

  dbCheckError($query);

  return $query->fetch(); 
}

//Фильтрация таблицы котят
function CheckFilterKittens($params = [], $limit, $offset){
  global $pdo;
  $sql = "SELECT * FROM kittens";

  if(!empty($params)){
    $i = 0;
    foreach($params as $key => $value){
      if($value != ''){
        if($i === 0){
          $sql = $sql . " WHERE $key=$value";
        }else{
          $sql = $sql . " AND $key=$value";
        } 
        $i++;
      }
    }
    $sql = $sql . " AND reserved != 1";
  }

  if(!empty($limit)){
    $sql = $sql . " LIMIT $limit OFFSET $offset";
  }

  $query = $pdo->prepare($sql);
  $query->execute();

  dbCheckError($query);

  return $query->fetchAll(); 
}

//Подсчет кол-ва записей в отфильтрованных котятах
function CountRowFilterKittens($params = []){
  global $pdo;
  $sql = "SELECT COUNT(*) FROM kittens";

  if(!empty($params)){
    $i = 0;
    foreach($params as $key => $value){

      if($value != ''){
        if($i === 0){
          $sql = $sql . " WHERE $key=$value";
        }else{
          $sql = $sql . " AND $key=$value";
        } 
        $i++;
      }  
    }
    $sql = $sql . " AND reserved != 1";
  }

  $query = $pdo->prepare($sql);
  $query->execute();

  dbCheckError($query);

  return $query->fetchColumn(); 
}

//Выборка записи о котенке со значениями age, color, gender, breed
function SelectKittenWhithFK($kittenId){
  global $pdo;
  $kittenId = trim(strip_tags(stripcslashes(htmlspecialchars($kittenId))));

  if(is_numeric($kittenId)){
    $sql = "SELECT k.*, g.gender_title, a.age_title, c.color_title, b.breed_title 
    FROM kittens AS k 
    JOIN genders AS g ON k.gender_id = g.id_gender 
    JOIN colors AS c ON k.color_id = c.id_color 
    JOIN ages AS a ON k.age_id = a.id_age 
    JOIN breeds AS b ON k.breed_id = b.id_breed 
    WHERE k.id_kitten = $kittenId AND k.reserved != 1";
  } else {
    header('location: ' . BASE_URL . "main.php");
  }
  
  $query = $pdo->prepare($sql);
  $query->execute();

  dbCheckError($query);

  return $query->fetch(); 
}

//Выборка записей о котятах со значениями age, color, gender, breed
function SelectAllKittensWhithFK(){
  global $pdo;
  $sql = "SELECT k.*, g.gender_title, a.age_title, c.color_title, b.breed_title 
  FROM kittens AS k 
  JOIN genders AS g ON k.gender_id = g.id_gender 
  JOIN colors AS c ON k.color_id = c.id_color 
  JOIN ages AS a ON k.age_id = a.id_age 
  JOIN breeds AS b ON k.breed_id = b.id_breed 
  ORDER BY k.id_kitten ASC";

  $query = $pdo->prepare($sql);
  $query->execute();

  dbCheckError($query);

  return $query->fetchAll(); 
}

//Поиск по таблице котята
function SearchKittens($text){
  $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
  global $pdo;
  $sql = "SELECT k.*, g.gender_title, a.age_title, c.color_title, b.breed_title 
  FROM kittens AS k 
  JOIN genders AS g ON k.gender_id = g.id_gender 
  JOIN colors AS c ON k.color_id = c.id_color 
  JOIN ages AS a ON k.age_id = a.id_age 
  JOIN breeds AS b ON k.breed_id = b.id_breed 
  WHERE k.name LIKE '%$text%' 
  OR g.gender_title LIKE '%$text%' 
  OR a.age_title LIKE '%$text%' 
  OR c.color_title LIKE '%$text%' 
  OR b.breed_title LIKE '%$text%' 
  ORDER BY k.id_kitten ASC";

  $query = $pdo->prepare($sql);
  $query->execute();

  dbCheckError($query);

  return $query->fetchAll(); 
}
?>