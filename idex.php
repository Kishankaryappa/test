<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyCampus Feedback Form</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Original+Surfer&family=Righteous&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <h1>MyCampus</h1>
</head>
<body>
  <div class="container">
    <div class="glassy-card">
      <h1>Feedback Form</h1>
      <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter Name">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter Email" required>

        <label for="feedback">Feedback:</label>
        <textarea id="feedback" name="feedback" rows="5" placeholder="Your Message..."></textarea>

        <button type="submit" name="send">Submit</button>
      </form>
    </div>
  </div>
</body>
</html>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['send']))
{

$name =$_POST['name'];
$email =$_POST['email'];
$feedback =$_POST['feedback'];



//Load Composer's autoloader
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
                        //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'reachmycampus@gmail.com';                     //SMTP username
    $mail->Password   = 'rtxsrhthjayqxzun';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom("reachmycampus@gmail.com", 'Contact');
    $mail->addAddress('reachmycampus@gmail.com', 'Admin');     //Add a recipient
   

    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'New FeedBack';
    $mail->Body    = "Name : $name <br> Email : $email <br> FeedBak : $feedback";
    

    $mail->send();
    echo "<div class='sucess'>Message Has Been Sent!!</div>";
} catch (Exception $e) {
    echo "<div class='alert'>Could't Send the Message...</div>";
}
}
?>