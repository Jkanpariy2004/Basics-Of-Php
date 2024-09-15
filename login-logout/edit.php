<?php
include("db.php");

$sql = "select *from login";
$GetLoginData = mysqli_query($db, $sql);

if (isset($_REQUEST['edt'])) {
    $id = $_REQUEST['edt'];
    $sql = "select *from login where login_id='$id' ";
    $asd = mysqli_query($db, $sql);
    $return = mysqli_fetch_array($asd);
}

if (isset($_REQUEST['add'])) {
    $im = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'], 'upload/' . $im);

    if ($im == '') {
        $im = $return['img'];
    }
    else{
        unlink('upload/' . $return['img']);
    }

    $daata = "update login set img='$im' where login_id='$id'";
    mysqli_query($db, $daata);
    header("location:insert.php");
}

if (isset($_REQUEST['add'])) {
    $user = $_REQUEST['username'];
    $pass = $_REQUEST['password'];
    $mob = $_REQUEST['mobile_no'];

    $sql = "update login set username='$user',password='$pass',mobile_no='$mob' where login_id='$id'";
    mysqli_query($db, $sql);
    echo "Data Insert Successfully !!!";
    header("location:insert.php");
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
    <form action="" method="post" align="center" enctype="multipart/form-data">

        <div>Username</div>
        <div><input type="text" name="username" value="<?php echo $return['username']; ?>"></div>

        <div>Password</div>
        <div><input type="password" name="password" value="<?php echo $return['password']; ?>"></div>

        <div>Mobile No</div>
        <div><input type="text" name="mobile_no" value="<?php echo $return['mobile_no']; ?>"></div>

        <div>img</div>
        <div>
            <input type="file" name="img" id="">
            <img src="upload/<?php echo $return['img']; ?>" alt="" height="30px" width="20px">
            <?php echo $return['img']; ?>
        </div>

        <div>
            <input type="submit" name="add">
            <input type="reset">
        </div>
    </form>

    <table align="center" border="1">

        <tr>
            <th>Sr.No</th>
            <th>Username</th>
            <th>Password</th>
            <th>Mobile No</th>
            <th>image</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($GetLoginData)) {
        ?>
            <tr>
                <td style="text-align: center;"><?php echo $row['login_id']; ?></td>
                <td style="text-align: center;"><?php echo $row['username']; ?></td>
                <td style="text-align: center;"><?php echo $row['password']; ?></td>
                <td style="text-align: center;"><?php echo $row['mobile_no']; ?></td>
                <td style="text-align: center;"><img src="upload/<?php echo $row['img']; ?>" width="90" height="90"></td>
            </tr>
        <?php
        }
        ?>
    </table>

</body>

</html>