<?php
    session_start();
    include("db.php");

    if(isset($_REQUEST['edit'])){
        $id = $_REQUEST['edit'];
        $sql = "select *from registration where id='$id' ";
        $asd = mysqli_query($db, $sql);
        $return = mysqli_fetch_array($asd);
    }

    if(isset($_REQUEST['btnedit']))
    {
        $first=$_REQUEST['first_name'];
        $last=$_REQUEST['last_name'];
        $father=$_REQUEST['father_name'];
        $mother=$_REQUEST['mother_name'];
        $mobile=$_REQUEST['mobile'];
        $email=$_REQUEST['email'];
        $pass=$_REQUEST['password'];
        $hobby=implode(',',$_REQUEST['hobby']);
        $gender=$_REQUEST['gender'];
        $city=$_REQUEST['city'];
        $date=$_REQUEST['birth'];

        $sql="update registration set first_name='$first',last_name='$last',father_name='$father',mother_name='$mother',mobile_no='$mobile',email_id='$email',password='$pass',hobby='$hobby',gender='$gender',city='$city',birth_date='$date' where id='$id'";
        mysqli_query($db,$sql);
        header("location:profile.php");
    }

    $session = $_SESSION['first_name'];
    $sql = "select * from registration where first_name='$session'";
    $check = mysqli_query($db, $sql);

    if (mysqli_num_rows($check)) {
        $row = mysqli_fetch_array($check);
?>
    <table border="1" cellspacing="5" cellpadding="5" align="center">
        <tr>
            <td>First Name:</td>
            <td>
                <?php echo $row["first_name"]; ?>
            </td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td>
                <?php echo $row["last_name"]; ?>
            </td>
        </tr>
        <tr>
            <td>Father Name:</td>
            <td>
                <?php echo $row["father_name"]; ?>
            </td>
        </tr>
        <tr>
            <td>Mother Name:</td>
            <td>
                <?php echo $row["mother_name"]; ?>
            </td>
        </tr>
        <tr>
            <td>Mobile No.:</td>
            <td>
                <?php echo $row["mobile_no"]; ?>
            </td>
        </tr>
        <tr>
            <td>Email id:</td>
            <td>
                <?php echo $row["email_id"]; ?>
            </td>
        </tr>
        <tr>
            <td>Password:</td>
            <td>
                <?php echo $row["password"]; ?>
            </td>
        </tr>
        <tr>
            <td>Hobby:</td>
            <td>
                <?php echo $row["hobby"]; ?>
            </td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td>
                <?php echo $row["gender"]; ?>
            </td>
        </tr>
        <tr>
            <td>City:</td>
            <td>
                <?php echo $row["city"]; ?>
            </td>
        </tr>
        <tr>
            <td>Birth Date:</td>
            <td>
                <?php echo $row["birth_date"]; ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <h1>
                    <a href="profile_logout.php">Logout</a>
                </h1>
            </td>
        </tr>
    </table>
<?php
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
</head>
<body>
<form action="" method="post">
        <table border="1" align="center">
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="first_name" value="<?php echo $return['first_name'];?>"></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="last_name" value="<?php echo $return['last_name'];?>"></td>
            </tr>
            <tr>
                <td>Father Name:</td>
                <td><input type="text" name="father_name" value="<?php echo $return['father_name'];?>"></td>
            </tr>
            <tr>
                <td>Mother Name:</td>
                <td><input type="text" name="mother_name" value="<?php echo $return['mother_name'];?>"></td>
            </tr>
            <tr>
                <td>Mobile No.:</td>
                <td><input type="number" name="mobile" value="<?php echo $return['mobile_no'];?>"></td>
            </tr>
            <tr>
                <td>Email Id:</td>
                <td><input type="email" name="email" value="<?php echo $return['email_id'];?>"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" value="<?php echo $return['password'];?>"></td>
            </tr>
            <tr>
                <td>Hobby:</td>
                <td>
                    <?php  $ex=explode(",",$return['hobby']);?>
                    
                    <input type="checkbox" name="hobby[]" value="reading" <?php if(in_array('reading',$ex)){echo "checked";}?>>reading
                    <input type="checkbox" name="hobby[]" value="writing" <?php if(in_array('writing',$ex)){echo "checked";}?>>writing
                    <input type="checkbox" name="hobby[]" value="playing" <?php if(in_array('playing',$ex)){echo "checked";}?>>playing
                </td>
            </tr>
            0
            <tr>
                <td>City:</td>
                <td>
                    <select name="city">
                        <option value="" hidden>Select City</option>
                        <option value="Surat" <?php if($return['city']=='Surat'){echo "selected";}?>>Surat</option>
                        <option value="Vapi" <?php if($return['city']=='Vapi'){echo "selected";}?> >Vapi</option>
                        <option value="Valsad" <?php if($return['city']=='Valsad'){echo "selected";}?>>Valsad</option>
                        <option value="Bharuch" <?php  if($return['city']=='Bharuch'){echo "selected";}?>>Bharuch</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Birth Date:</td>
                <td>
                    <input type="date" name="birth" value="<?php echo $return['birth_date'];?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnedit" value="Update">
                    <input type="reset" name="btnreset">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>