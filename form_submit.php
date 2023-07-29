<?php

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $alias = $_POST['alias'];
    $answer = $_POST['answer'];
    $status = 'empty';

    if (!empty($name) || !empty($email) || !empty($phone_number) || !empty($alias) || !empty($answer)) {
        // Initialize PHPMailer
        $mail = new PHPMailer(true);
        try {
            // SMTP Configuration

            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->SMTPAuth = true;
            $mail->Port = 465;
            $mail->Username = '369ee7a49d0884';
            $mail->Password = '3c3df1d1920e82';

            // Set From, To, Subject, and Body
            $mail->setFrom($email, 'Mailtrap Website');
            $mail->addAddress('support@northimmigration.com', 'Me');
            $mail->addReplyTo($email, $name);
            $mail->Subject = 'Saint lucia contact request landing page';
            $bodyParagraphs = '<html>
                    <head>
                        <title>Birthday Reminders for August</title>
                    </head>
                    <body>
                        <table  border="1" cellspacing="3" width="60%">
                            <tr>
                                <td>Name:</td>
                                <td>' . $name . '</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>' . $email . '</td>
                            </tr>
                            <tr>
                                <td>Phone Number:</td>
                                <td>' . $phone_number . '</td>
                            </tr>
                            <tr>
                                <td>Alais:</td>
                                <td>' . $alias . '</td>
                            </tr>
                            <tr>
                                <td>Answer:</td>
                                <td>' . $answer . '</td>
                            </tr>
                        </table>
                    </body>
                </html>';
            $mail->Body = $bodyParagraphs;
            $mail->IsHTML(true);

            // Send the email
            $mail->send();

            $status = 'success';
        } catch (Exception $e) {
            die(var_dump($e->getMessage()));
            $status = 'error';
        }
    }
    echo $status;
    die;
}
?>