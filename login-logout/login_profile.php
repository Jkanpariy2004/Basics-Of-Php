<?php
    session_start();
    include("db.php");

    if(isset($_REQUEST['btnsubmit'])){
        $username=$_REQUEST['username'];
        $password=$_REQUEST['password'];

        $sql=" select * from registration where first_name='$username' AND password='$password' ";
        $check=mysqli_query($db, $sql);

        if(mysqli_num_rows($check))
        {
            $_SESSION['first_name']=$username;
            echo "Login Success";
            header("location:profile.php");
        }
        else
        {
            echo "Login invalid!!";
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