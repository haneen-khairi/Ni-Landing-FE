<?php
  // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to       = "info@northimmigration.com";
    $email_subject  = "New Membership Form Submission";
	$error_message  = '';
    // validation
    if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['subject']) || !isset($_POST['Countrycode'])  || !isset($_POST['phone']) || !isset($_POST['message']))
    {
        echo "Fields are not filled properly";
        die();
    }
    $name      = $_POST['name']; // required
	$email     = $_POST['email']; // required
	//$country = $_POST['Country'];
	$countrycode= $_POST['Countrycode'];//required
	$telephone  = $_POST['phone']; 
//	$program = $_POST['program'];
	$subject   = $_POST['subject']; // required
	$message = $_POST['message'];
	

	
     
$email_message = '<html>';
$email_message = '<body>';
$email_message = '<head>';
$email_message = '<title>Your Details Are Below</title>';
$email_message = '</head>';
$email_message .= '<h1>Your Details Are Below</h1>';
$email_message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$email_message .= "<tr style='background: #eee;'><td><strong>First Name:</strong> </td><td>" . strip_tags($_POST['name']) . "</td></tr>";
$email_message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
//$email_message .= "<tr><td><strong>Country:</strong> </td><td>" . strip_tags($_POST['Country']) . "</td></tr>";
$email_message .= "<tr><td><strong>CountryCode:</strong> </td><td>" . strip_tags($_POST['Countrycode']) . "</td></tr>";
$email_message .= "<tr><td><strong>Telephone:</strong> </td><td>" . strip_tags($_POST['phone']) . "</td></tr>";

$email_message .= "<tr><td><strong>Subject:</strong> </td><td>" . strip_tags($_POST['subject']) . "</td></tr>";

$email_message .= "<tr><td><strong>Message:</strong> </td><td>" . strip_tags($_POST['message']) . "</td></tr>";

$email_message .= "</table>";
$email_message .= "</body></html>";	


$headers = 'From:Grenada@northimmigration.com' . "\r\n".'Reply-To: info@northimmigration.com' . "\r\n";
//$headers = "From: " . $email . "\r\n";
//$headers .= "Reply-To: ". $email . "\r\n";
//$headers .= "CC: northimmigration@hotmail.com\r\n";
$headers .= "X-Mailer: PHP/". phpversion();
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\n";
//$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


//arabic translation code
// $headers .= "X-Mailer: PHP/". phpversion();
  //  $headers .= "X-Priority: 3 \n";
  //  $headers .= "MIME-version: 1.0\n";
  // $headers .= "Content-Type: text/html; charset=UTF-8\n";
// end arabic


$emailarray = array('info@northimmigration.com');
foreach ($emailarray as $key => $value) {
    
    mail($value, $email_subject, $email_message, $headers); 
}
//mail($email_to, $email_subject, $email_message, $headers);



?>