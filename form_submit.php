<?php

//require "vendor/autoload.php";
//
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $alias = $_POST['alias'];
    $answer = $_POST['answer'];
    $ip_address = get_client_ip();
    $status = 'empty';

    if (!empty($name) || !empty($email) || !empty($phone_number) || !empty($alias) || !empty($answer)) {

//        $conn = mysqli_connect("localhost:8889", "root", "root",
//            "north_immegration") or die("Connection Error: " . mysqli_error($conn));
//        $sql = "INSERT INTO tbl_contact_us(name, email, phone_number, alias, answer, ip_address, date) VALUES ('" . $name . "', '" . $email . "', '" . $phone_number . "', '" . $alias . "', '" . $answer . "', '" . $ip_address . "', '" . date('Y-m-d H:i:s') . "')";
//        $result = mysqli_query($conn, $sql);
//        if (!$result) {
//            die(var_dump($conn->connect_error));
//        }

        try {
            $subject = 'Saint lucia contact request landing page';
            $bodyParagraphs = '<html>
                    <head>
                        <title>Saint lucia contact request landing page</title>
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


            $headers = "From: " . $email . "\r\n";
            $headers .= "Reply-To: ". $email . "\r\n";
            $headers .= "X-Mailer: PHP/". phpversion();
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\n";

            $email_to = "shbailat57@gmail.com";

            mail($email_to, $subject, $bodyParagraphs, $headers);

            $status = 'success';
        } catch (Exception $e) {
            $status = 'error';
        }
    }
    echo $status;
    die;
}
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
?>