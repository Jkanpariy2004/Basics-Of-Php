<?php
session_start();
include("db.php");

$view = "Select * from registration";
$GetData = mysqli_query($db, $view);

if (isset($_REQUEST['btnsubmit'])) {
    $first = $_REQUEST['first_name'];
    $last = $_REQUEST['last_name'];
    $father = $_REQUEST['father_name'];
    $mother = $_REQUEST['mother_name'];
    $mobile = $_REQUEST['mobile'];
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['password'];
    $hobby = implode(',', $_REQUEST['hobby']);
    $gender = $_REQUEST['gender'];
    $city = $_REQUEST['city'];
    $date = $_REQUEST['date'];

    $errors = array();

    if (empty($first)) {
        $errors['first_name'] = 'Username cannot be blank.';
    }
    if (empty($errors)) {
        $sql = " insert into registration (first_name,last_name,father_name,mother_name,mobile_no,email_id,password,hobby,gender,city,birth_date,status) values ('$first','$last','$father','$mother','$mobile','$email','$pass','$hobby','$gender','$city','$date','inactive') ";
        mysqli_query($db, $sql);

        header("location:Registration_form.php");
    }
}

if (isset($_REQUEST['del'])) {
    $id = $_REQUEST['del'];
    $sql = "delete from registration where id='$id' ";
    mysqli_query($db, $sql);
    header("location:Registration_form.php");
}

// if (isset($_REQUEST['active'])) {
//     $id = $_REQUEST['active'];

//     $query = "select status from registration where id='$id'";
//     $result = mysqli_query($db, $query);

//     if ($result) {
//         $row = mysqli_fetch_assoc($result);
//         $currentStatus = $row['status'];
//         $newStatus = ($currentStatus == 'active') ? 'inactive' : 'active';
//         $sql = "update registration set status='$newStatus' WHERE id='$id'";
//         mysqli_query($db, $sql);
//         header("location:Registration_form.php");
//     }
// }

if (isset($_REQUEST['active']) || isset($_REQUEST['inactive'])) {
    if (isset($_REQUEST['active'])) {
        $id = $_REQUEST['active'];
        $updateQuery = "update registration set status='active' where id='$id'";
    } elseif (isset($_REQUEST['inactive'])) {
        $id = $_REQUEST['inactive'];
        $updateQuery = "update registration set status='inactive' where id='$id'";
    }

    mysqli_query($db, $updateQuery);
    header("location: Registration_form.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>

<body>
    <h1 style="text-align: center;">
        Welcome : <?php echo $_SESSION['users']; ?> || <a href="logout.php">Logout</a>
    </h1>
    <form action="" method="post">
        <table border="1" align="center">
            <tr>
                <td>First Name:</td>
                <td>
                    <input type="text" name="first_name">
                    <?php
                    if (isset($errors['first_name'])) {
                        $errors['first_name'];
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="last_name"></td>
            </tr>
            <tr>
                <td>Father Name:</td>
                <td><input type="text" name="father_name"></td>
            </tr>
            <tr>
                <td>Mother Name:</td>
                <td><input type="text" name="mother_name"></td>
            </tr>
            <tr>
                <td>Mobile No.:</td>
                <td><input type="number" name="mobile"></td>
            </tr>
            <tr>
                <td>Email Id:</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Hobby:</td>
                <td>
                    <input type="checkbox" name="hobby[]" value="reading">reading
                    <input type="checkbox" name="hobby[]" value="writing">writing
                    <input type="checkbox" name="hobby[]" value="playing">playing
                </td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="gender" value="Male">Male
                    <input type="radio" name="gender" value="female">Female
                </td>
            </tr>
            <tr>
                <td>City:</td>
                <td>
                    <select name="city">
                        <option value="" hidden>Select City</option>
                        <option value="Surat">Surat</option>
                        <option value="Vapi">Vapi</option>
                        <option value="Valsad">Valsad</option>
                        <option value="Bharuch">Bharuch</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Birth Date:</td>
                <td>
                    <input type="date" name="date">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnsubmit" value="Register">
                    <input type="reset" name="btnreset">
                </td>
            </tr>
        </table>
    </form>
    <br><br>
    <table align="center" border="1">
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Father Name</th>
            <th>Mother Name</th>
            <th>Mobile No.</th>
            <th>Email id</th>
            <th>Password</th>
            <th>Hobby</th>
            <th>Gender</th>
            <th>City</th>
            <th>Birth Date</th>
            <th>Delete</th>
            <th>Edit</th>
            <th>Status</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_array($GetData)) {

        ?>
            <tr align="center">
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['first_name'] ?></td>
                <td><?php echo $row['last_name'] ?></td>
                <td><?php echo $row['father_name'] ?></td>
                <td><?php echo $row['mother_name'] ?></td>
                <td><?php echo $row['mobile_no'] ?></td>
                <td><?php echo $row['email_id'] ?></td>
                <td><?php echo $row['password'] ?></td>
                <td><?php echo $row['hobby'] ?></td>
                <td><?php echo $row['gender'] ?></td>
                <td><?php echo $row['city'] ?></td>
                <td><?php echo $row['birth_date'] ?></td>
                <td><a href="Registration_form.php?del=<?php echo $row['id'] ?> " onclick=" return confirm('Are You Sure Record Delete !!!') ">Delete</a></td>
                <td><a href="Registration_edit.php?edit=<?php echo $row['id'] ?>">Edit</a></td>
                <td>
                    <?php
                    if ($row['status'] == 'active') {
                        echo '<a href="Registration_form.php?inactive=' . $row['id'] . '">' . $row['status'] . '</a>';
                    } elseif ($row['status'] == 'inactive') {
                        echo '<a href="Registration_form.php?active=' . $row['id'] . '">' . $row['status'] . '</a>';
                    }
                    ?>
                </td>

            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>