<?php
session_start();
include("db.php");

if (isset($_REQUEST['btnsubmit'])) {
    $user = $_REQUEST['username'];
    $pass = $_REQUEST['password'];
    $new=$_REQUEST['new_password'];
    $con_pass=$_REQUEST['confirm_password'];

    $sql = " select * from login where username='$user' AND password='$pass' ";
    $check = mysqli_query($db, $sql);

    if (mysqli_num_rows($check)) {
        if($new == $con_pass)
        {
           $up="update login set password='$new' where username='$user'  ";
           mysqli_query($db,$up);
           echo "Password Changed !!!";
        }
        else
        {
            echo "New Password & Confirm Password Did Not Match";
        }
    } else {
        echo "Login Invalid!!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <table border="1" align="center">
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" value="<?php echo $_SESSION['users']; ?>"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="text" name="password"></td>
            </tr>
            <tr>
                <td>New Password:</td>
                <td><input type="text" name="new_password"></td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td><input type="text" name="confirm_password"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnsubmit">
                </td>
            </tr>
        </table>
    </form>
    <h1 align="center">
        <a href="logout.php">Logout</a>
    </h1>
</body>

</html>