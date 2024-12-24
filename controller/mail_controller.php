<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $adminEmail = 'prasannasunuwar03@gmail.com';

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Gmail SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'prasannasunuwar03@gmail.com'; 
        $mail->Password = 'qnsz peby oylh vvlq';    
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress($adminEmail);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Message from Contact Form';
        $mail->Body = "<h3>You have received a new message:</h3>
                       <p><strong>Name:</strong> {$name}</p>
                       <p><strong>Email:</strong> {$email}</p>
                       <p><strong>Message:</strong><br>{$message}</p>";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    $_SESSION['msg'] = 'Message has been sent';
    header("Location: ../view/contact.php");

}
?>
