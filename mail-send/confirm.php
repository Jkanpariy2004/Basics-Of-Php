<?php
session_start();
include('db.php');

if ($_SESSION['email'] == '') {
  header("location:email.php");
}

if (isset($_POST['submit'])) {
  $npass = $_POST['npass'];
  $cpass = $_POST['cpass'];
  if ($npass == $cpass) {
    $eee = $_SESSION['email'];
    $que = "update user set `password`='$cpass' where email='$eee'";

    $re =  mysqli_query($db, $que);
    if ($re) {
      // header('location:email.php');
      echo "Your Password has been changed.";
    }
  } else {
    echo "New Password and Confirm Password Does not Match";
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
    <h2>Password</h2>
    <form action="confirm.php" method="post">
      <div class="form-group">
        <label for="email">New Password :</label>
        <input type="text" class="form-control" placeholder="Enter New Password" name="npass">
      </div>
      <div class="form-group">
        <label for="email">Confirm Password :</label>
        <input type="text" class="form-control" placeholder="Enter Confirm Password" name="cpass">
      </div>
      <input type="submit" class="btn btn-default" value="Save" name="submit">
      <div>
        <a href="logout.php">logout</a>
      </div>
    </form>
  </div>

</body>

</html>