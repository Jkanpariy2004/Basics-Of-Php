<?php
include("db.php");

$view = " select * from state ";
$GetData = mysqli_query($db, $view);

if (isset($_REQUEST['edit'])) {
    $id = $_REQUEST['edit'];
    $sql = "select * from state where state_id='$id' ";
    $fatch = mysqli_query($db, $sql);
    $return = mysqli_fetch_array($fatch);
}

if (isset($_REQUEST['btnsubmit'])) {
    $state = $_REQUEST['state_name'];
    $update = " update state set state_name='$state' where state_id='$id' ";
    mysqli_query($db, $update);

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
                <td><input type="text" name="state_name" value="<?php echo $return['state_name'];?>"></td>
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
        </tr>

        <?php
        while ($row = mysqli_fetch_array($GetData)) {
        ?>
            <tr align="center">
                <td><?php echo $row['state_id'] ?></td>
                <td><?php echo $row['state_name'] ?></td>
            </tr>
        <?php
        }
        ?>

    </table>
</body>

</html>