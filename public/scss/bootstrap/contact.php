<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST)['send'])){
  $mail = new PHPMailer(true);

  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com'
  $mail->SMTPAuth = true;
  $mail->Username = 'healmemail@gmail.com'; // Your Gmail
  $mail->Password = 'zpamwaidjrphnnpy'; // Your Gmail app password
  $mail->SMTPSecure = 'ssl';
  $mail->Port = '465';

  $mail->setFrom = 'healmemail@gmail.com'; // Your Gmail
 
  $mail->addAddress = ($_POST['email']);

  $mail->isHTML = (true);

  $mail->Subject = $_POST["name"];
  $mail->Body = $_POST["messege"];

  $mail->send();

  echo
  "
  <script>
  alert('sent Succesfully')
  document.location.href = 'contact.html';
  </script>
  "

}
