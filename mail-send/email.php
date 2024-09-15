<?php
include('db.php');
session_start();

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$sql = "select * from user where email='$email'";
	$chk = mysqli_query($db, $sql);
	if (mysqli_num_rows($chk)) {
		$otp = rand(10000, 20000);

		include('smtp/PHPMailerAutoload.php');

		$mail = new PHPMailer;

		$mail->isSMTP();                                   // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                            // Enable SMTP authentication
		$mail->Username = "jainishkanpariya@gmail.com";
		$mail->Password = "ayunatmgbhuflobg"; 	// SMTP password
		$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                 // TCP port to connect to

		$mail->setFrom(' ', 'CodexWorld');
		$mail->addReplyTo('', 'CodexWorld');
		$mail->addAddress(@$email);   // Add a recipient
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		$mail->isHTML(true);  // Set email format to HTML



		$mail->Subject = 'OTP';
		$mail->Body    = "Welcome to car Solution <br> Your OTP is : " . @$otp;

		if (!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			$_SESSION['otp'] = $otp;
			$_SESSION['email'] = $email;
			header('location:otp.php');
			echo 'Message has been sent';
		}
	} else {
		echo "Email Not Register";
	}
}
?>

<form action="" method="post">
	<input type="email" name="email">
	<input type="submit" name="submit">
</form>