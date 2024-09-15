<?php
    session_start();
    include("db.php");

    if(isset($_REQUEST['btnsubmit']))
    {
        $user=$_REQUEST['username'];
        $password=$_REQUEST['password'];

        $sql = "select *from login where username='$user' AND password='$password' ";
        $chk=mysqli_query($db,$sql);

        if(mysqli_num_rows($chk))
        {
            $_SESSION['user']=$user;
            echo "Login Successfull";
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
        <table border="1" align="center">
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password"></td>
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