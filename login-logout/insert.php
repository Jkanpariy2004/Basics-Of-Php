<?php
session_start();
include("db.php");

if($_SESSION['user']=='')
{
    header("location:login1.php");
}

$sql = "select *from login";
$GetLoginData = mysqli_query($db, $sql);

if (isset($_REQUEST['add'])) {
    $user = $_REQUEST['username'];
    $pass = $_REQUEST['password'];
    $mob = $_REQUEST['mobile_no'];

    $image = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'], 'upload/' . $image);

    $sql = "insert into login (username,password,mobile_no,img) values ('$user','$pass','$mob','$image')";
    mysqli_query($db, $sql);
    echo "Data Insert Successfully !!!";
    header("location:insert.php");
}

if (isset($_REQUEST['del'])) {
    $id = $_REQUEST['del'];
    $editimg = "select *from login where login_id='$id'";
    $img1 = mysqli_query($db, $editimg);
    $return = mysqli_fetch_array($img1);
    unlink('upload/' . $return['img']);

    $sql = "delete from login where login_id='$id' ";
    mysqli_query($db, $sql);

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
    <!-- Welcome : <?php echo $_SESSION['user'];?>
    ||
    <a href="logout.php">Logout</a> -->
 
    <form action="" method="post" align="center" enctype="multipart/form-data">

        <div>Username</div>
        <div><input type="text" name="username"></div>

        <div>Password</div>
        <div><input type="password" name="password"></div>

        <div>Mobile No</div>
        <div><input type="text" name="mobile_no"></div>

        <div>Image Upload</div>
        <div><input type="file" name="img"></div>

        <div>
            <input type="submit" name='add'>
            <input type="reset">
        </div>
    </form>

    <table align="center" border="1">

        <tr>
            <th>Sr.No</th>
            <th>Username</th>
            <th>Password</th>
            <th>Mobile No</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>
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
                <td style="text-align: center;"><a href="edit.php?edt=<?php echo $row['login_id']; ?>">Edit</a></td>
                <td style="text-align: center;"><a href="insert.php?del=<?php echo $row['login_id'] ?> " onclick=" return confirm('Are You Sure Record Delete !!!') ">Delete</a></td>
            </tr>
        <?php
        }
        ?>
    </table>

</body>

</html>