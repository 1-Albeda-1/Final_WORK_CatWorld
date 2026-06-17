<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'phpmailer/src/Exception.php';
  require 'phpmailer/src/PHPMailer.php';

  $mail = new PHPMailer(true);
  $mail->CharSet = 'UTF-8';
  $mail->setLanguage('ru', 'phpmailer/language/');
  $mail->IsHTML(true);

  //От кого письмо
  $mail->setForm('info@mail.ru', 'Пользователь');
  //Кому письмо
  $mail->addAddress('Kristina.Smirnova1310@yandex.ru');
  //Тема письма
  $mail->Subject = 'Обращение пользователя';

  $body = '<h1>Обращение пользователя!</h1>';

  // Присвоение переменных в письмо
  if(trim(!empty($_POST['fio']))) {
    $body.= '<p><strong>ФИО:</strong> '.$_POST['fio'].'</p>';
  }
  if(trim(!empty($_POST['email']))) {
    $body.= '<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
  }
  if(trim(!empty($_POST['message']))) {
    $body.= '<p><strong>Сообщение:</strong> '.$_POST['message'].'</p>';
  }

  $mail->Body = $body;

  // Отправка
  if(!$mail->send()) {
    $message = 'Ошибка';
  } else {
    $message = 'Данные отправлены';
  }

  $response = ['message' => $message];

  header('Content-type: application/json');
  echo json_encode($response);

  ?>