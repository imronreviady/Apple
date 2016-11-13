/* 
 * Form PHP
 * @Author Imron Reviady 
 */

<?php
$to = 'support@maleslabs.id';
$subject = 'Message from Your site';
$headers = 'From: (Your site) <mailer@apple.maleslabs.id>' . "\r\n" . 'Content-type: text/html; charset=utf-8';
$message = '
<html>
	<head>
		<title>Your Site Contact Form</title>
	</head>
	<body>
		<h3>Name: <span style="font-weight: normal;">' . $_POST['name'] . '</span></h3>
		<h3>Email: <span style="font-weight: normal;">' . $_POST['email'] . '</span></h3>
		<div>
			<h3 style="margin-bottom: 5px;">Comment:</h3>
			<div>' . $_POST['message'] . '</div>
		</div>
	</body>
</html>';

if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	    mail($to, $subject, $message, $headers) or die('<span style="color: #c3293a;">Error sending Mail</span>');
	    echo '<span style="color: #3aeb89;">Your email was sent successfully!</span>';
	}
} else {
	echo '<span style="color: #c3293a;">All fields must be filled!</span>';
}
?>