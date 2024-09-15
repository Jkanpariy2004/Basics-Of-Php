<?php
session_start();
include("db.php");
$session = $_SESSION['first_name'];
$sql = "select * from registration where first_name='$session'";
$check = mysqli_query($db, $sql);
$row = mysqli_fetch_array($check);

if (mysqli_num_rows($check)) {

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
        <tr>
            <td colspan="2" align="center">
                <h1>
                    <a href="profile_edit.php?edit=<?php echo $row['id']; ?>">Edit</a>
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

</body>

</html>