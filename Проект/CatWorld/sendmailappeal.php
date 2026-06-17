<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'phpmailer/src/Exception.php';
  require 'phpmailer/src/PHPMailer.php';
  require 'phpmailer/src/SMTP.php';
  
  $mail = new PHPMailer(true);
  $mail->CharSet = 'UTF-8';
  $mail->setLanguage('ru', 'phpmailer/language/');
  $mail->IsHTML(true);

  $mail->isSMTP();   
  $mail->SMTPAuth = true;

  $mail->Host = 'smtp.yandex.ru'; // SMTP сервера почты
  $mail->Username = 'kristina.smirnova.work1310@yandex.ru'; // Логин на почте
  $mail->Password = 'rookoqdynoaknlvb'; // Пароль на почте
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;

  //От кого письмо
  $mail->setFrom('kristina.smirnova.work1310@yandex.ru', 'Пользователь');
  //Кому письмо
  $mail->addAddress('kristina.smirnova.work1310@yandex.ru');
  //Тема письма
  $mail->Subject = 'Обращение пользователя';

  $body = '<h1>Вопрос или жалоба пользователя!</h1>';

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

	//Отправляем
	if (!$mail->send()) {
		$message = 'Ошибка';
	} else {
		$message = 'Данные отправлены!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>