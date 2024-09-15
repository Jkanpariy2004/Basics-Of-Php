<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>First Page</title>
</head>

<body>
    <center>
        <form method="POST" action="view.php">
            <table>
                <tr>
                    <td>Enter Username : </td>
                    <td><input type="text" name="txtuser" value="<?php if (isset($_COOKIE['username'])) { echo $_COOKIE['username'];} ?>" required></td>
                </tr>
                <tr>
                    <td>Enter Password : </td>
                    <td><input type="Password" name="txtpass" value="<?php if (isset($_COOKIE['password'])) { echo $_COOKIE['password'];} ?>" required></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="remember">Remember Me</td>
                </tr>
                <tr>
                    <td><input type="submit" name="btnlogin" value="Login"></td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>