<?php
include("db.php");

$view1 = " select * from state ";
$GetStateData = mysqli_query($db, $view1);

$view = " select * from city ";
$GetData = mysqli_query($db, $view);

if (isset($_REQUEST['edit'])) {
    $id = $_REQUEST['edit'];
    $sql = "select * from city where city_id='$id' ";
    $fatch = mysqli_query($db, $sql);
    $return = mysqli_fetch_array($fatch);
}

if (isset($_REQUEST['btnsubmit'])) {
    $state_id = $_REQUEST['state_id'];
    $city = $_REQUEST['city_name'];
    $update = " update city set state_id='$state_id',city_name='$city' where city_id='$id'";
    mysqli_query($db, $update);

    header("location:city.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City</title>
</head>

<body>
    <form action="" method="post">
        <table border="1" align="center">
            <tr>
                <td>State name:</td>
                <td>
                    <select name="state_id" id="">
                        <option value="" hidden>Select State</option>
                        <?php
                        while ($row = mysqli_fetch_array($GetStateData)) {
                            if ($return['state_id'] == $row['state_id']) {
                        ?>
                                <option value="<?php echo $row['state_id'] ?>" selected><?php echo $row['state_name']; ?></option>
                            <?php
                            } else {
                            ?>
                                <option value="<?php echo $row['state_id'] ?>"><?php echo $row['state_name']; ?></option>
                            <?php
                            }
                            ?>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>City Name:</td>
                <td><input type="text" name="city_name" value="<?php echo $return['city_name']; ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnsubmit">
                </td>
            </tr>
        </table>
    </form>
    <br><br>
    <table border="1" align="center">
        <tr>
            <th>city ID</th>
            <th>State Name</th>
            <th>city Name</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_array($GetData)) {
            $state1 = $row['state_id'];
            $view2 = " select * from state where state_id='$state1'";
            $GetStateData1 = mysqli_query($db, $view2);
            $GetStatename = mysqli_fetch_array($GetStateData1);
        ?>
            <tr align="center">
                <td><?php echo $row['city_id'] ?></td>

                <td><?php echo $GetStatename['state_name'] ?></td>

                <td><?php echo $row['city_name'] ?></td>
            </tr>
        <?php
        }
        ?>

    </table>

</body>

</html>