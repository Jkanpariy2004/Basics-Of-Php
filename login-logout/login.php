<?php
session_start();
include("db.php");

if (isset($_REQUEST['btnsubmit'])) {
    $user = $_REQUEST['first_name'];
    $pass = $_REQUEST['password'];

    $sql = "select *from registration where first_name='$user' AND password='$pass' ";
    $chk = mysqli_query($db, $sql);

    if (mysqli_num_rows($chk)) 
    {
        $_SESSION['users'] = $user;
        echo "Login Success";
        header("location:Registration_form.php");
    } 
    else 
    {
        echo "Login Invalid";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <form action="" method="post">
        <table align="center" border="1">
            <tr>
                <td>user Name:</td>
                <td><input type="text" name="first_name"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="text" name="password"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnsubmit">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>