<?php
    include("db.php");

    if(isset($_REQUEST['btnsubmit'])){
        $user=$_REQUEST['username'];
   
        $sql="select *from login where username='$user'";
        $chk=mysqli_query($db,$sql);

        if(mysqli_num_rows($chk))
        {
            $row = mysqli_fetch_array($chk) ;
            echo "<br>"."Username: " . $row["username"];
            echo "<br>"."password: " . $row["password"];
        }
        else
        {
           echo "username is not valid";
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
                <td><input type="text" name="username"></td>
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