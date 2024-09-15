<?php
if (isset($_POST['btnlogin'])) {
    if (isset($_POST['remember'])) {
        setcookie("username", $_POST['txtuser'], time() + 3600);
        setcookie("password", $_POST['txtpass'], time() + 3600);
        echo "Cookie Set Successfully...";
    } else {
        setcookie("username", "");
        setcookie("password", "");
        echo "Cookie Not Set";
    }
}
if (isset($_POST['btndelete'])) {
    setcookie("username", "", time() - 3600);
    setcookie("password", "", time() - 3600);
    echo "Cookie Successfully Deleted";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>

<body>
    <p><a href="login.php">Go To Login Page </a></p><br><br>
    <form method="POST" action="">
        <input type="submit" name="btndelete" value="Delete Cookie">
    </form>
</body>

</html>