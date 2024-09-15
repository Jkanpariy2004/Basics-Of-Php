<?php
include("db.php");

$view = " select * from state ";
$GetData = mysqli_query($db, $view);

if (isset($_REQUEST['btnsubmit'])) {
    $state = $_REQUEST['state_name'];
    $insert = " insert into state (state_name) values ('$state') ";
    mysqli_query($db, $insert);

    header("location:State.php");
}

if (isset($_REQUEST['delete'])) {
    $id = $_REQUEST['delete'];
    $sql = "delete from state where state_id='$id' ";
    mysqli_query($db, $sql);
    header("location:State.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>State</title>
</head>

<body>
    <form action="" method="post">
        <table border="1" align="center">
            <tr>
                <td>State Name:</td>
                <td><input type="text" name="state_name"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnsubmit">
                </td>
            </tr>
        </table>
    </form>
    <br>
    <table border="1" align="center">
        <tr>
            <th>State ID</th>
            <th>State Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_array($GetData)) {
        ?>
            <tr align="center">
                <td><?php echo $row['state_id'] ?></td>
                <td><?php echo $row['state_name'] ?></td>
                <td><a href="State_edit.php?edit=<?php echo $row['state_id'] ?>">Edit</a></td>
                <td><a href="State.php?delete=<?php echo $row['state_id'] ?>" onclick=" return confirm('Are You Sure Record Delete !!!') ">Delete</a></td>
            </tr>
        <?php
        }
        ?>

    </table>
</body>

</html>