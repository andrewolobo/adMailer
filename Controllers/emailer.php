<?php
//Include Libraries for SendGrid
include "../Libraries/email/SendGrid.php";
include "../Libraries/email/SendGrid/Email.php";

//Capture variables from Form Sender
$to = $_POST['to'];
$from = $_POST['from'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$cc = $_POST['cc'];
//Split email list into an array
$to = explode(";", $to);
//Send The emails to each individual in the list
for ($x = 0; $x < count($to); $x++) {
	emailer::sendEmail($to[$x], $from, $subject, $message,$cc);
}
//Echo a complete statement once its done
echo "complete";



//Emailer class
class emailer {
	static function sendEmail($to, $from, $subject, $message,$cc) {
		//User credentials
		$sendgrid_username = "atushabe";
		$sendgrid_password = "atushabe123";
		//Set SendGrid Parameters

		$sendgrid = new SendGrid($sendgrid_username, $sendgrid_password, array("turn_off_ssl_verification" => true));
		//instantiate library class
		$email = new SendGrid\Email();
		//Set variables(to,cc,from,subject, message & headers for email) and send email
		$email -> addTo($to)->addTo($cc) -> setFrom($from) -> setSubject($subject) -> setCc($cc) -> setHtml($message) -> addHeader('X-Sent-Using', 'SendGrid-API') -> addHeader('X-Transport', 'web');
		//Wait for email response
		$response = $sendgrid -> send($email);
	}

}
?>
