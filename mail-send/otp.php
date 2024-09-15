<?php
session_start();

if ($_SESSION['email'] == '') {
  header("location:email.php");
}

if (isset($_POST['submit'])) {
  $otp = $_POST['otp'];
  echo $otp;
  if ($otp == $_SESSION['otp']) {
    header('location:confirm.php');
  } else {
    echo "Wrong otp";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>

  <div class="container">
    <h2>Vertical (basic) form</h2>
    <p>Otp send this Email id: <b><?php echo $_SESSION['email']; ?></b> </p>
    <form action="otp.php" method="post">
      <div class="form-group">
        <label for="email">Enter OTP:</label>
        <input type="text" class="form-control" placeholder="Enter OTP" name="otp">
      </div>
      <input type="submit" class="btn btn-default" value="Submit" name="submit">
    </form>
  </div>

</body>

</html>