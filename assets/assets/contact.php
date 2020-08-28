<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$out1="<style>#resp1{display:none;}</style>Message Recorded<br>Thank you for contacting us.";
$html="<table><tr><td>Name : </td><td>$name</td</tr><tr><td>Email : </td><td>$email</td</tr><tr><td>Message : </td><td>$message</td</tr></table>";

$conn = new mysqli('sql103.unaux.com', 'unaux_26575698', 'smouwxg', 'unaux_26575698_my2');
if ($conn->connect_error) {
  die('Connection Failed : ' . $conn->connect_error);
  echo($out1);
} else {
  $stmt = $conn->prepare("insert into contact(Name,Email,Message)
                                  values(?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $message);
  $stmt->execute();
  echo($out1);
  $stmt->close();
  $conn->close();
}
/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug = 2;
$mail->SMTPAuth   = true;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "tirth357@gmail.com";
$mail->Password   = "airforce2605";

$mail->IsHTML(true);
$mail->AddAddress("tirth357@gmail.com", "Tirth Jadvani");
$mail->SetFrom("t_softwares@gmail.com", "t softwares");
$mail->Subject = "Contact form submited";
$content = $html;


$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo '<p id="al">Error while sending Email.</p>';
  var_dump($mail);
} else {
  echo "<br>Email sent successfully<br>Thank you for contacting us.";
}

*/
?>