<?php
include("db.php");


if (isset($_REQUEST['edit'])) {
    $id = $_REQUEST['edit'];
    $sql = "select * from city where state_id='$id' ";
    $fatch = mysqli_query($db, $sql);
}

if (isset($_REQUEST['edit'])) {
    $id = $_REQUEST['edit'];
    $sql1 = "select * from state where state_id='$id' ";
    $fatch1 = mysqli_query($db, $sql1);
}

$view1 = " select * from state ";
$GetData1 = mysqli_query($db, $view1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="display: flex;">

        <table border="1" cellpadding="15" cellspacing="5">
            <tr align="center">
                <th>State Name</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($GetData1)) {
                $state1 = $row['state_name'];
                $view2 = " select * from state where state_name='$state1'";
                $GetStateData1 = mysqli_query($db, $view2);
                $GetStatename = mysqli_fetch_array($GetStateData1);

                $count = "SELECT COUNT(*) AS city_name FROM city WHERE state_id='" . $row['state_id'] . "'";
                $city = mysqli_query($db, $count);
                $cityCount = 0;

                if ($city->num_rows > 0) {
                    while ($rowCity = $city->fetch_assoc()) {
                        $cityCount = $rowCity["city_name"];
                    }
                }
            ?>
                <tr align="center">
                    <td>
                        <a href="Show_state_data.php?edit=<?php echo $row['state_id'] ?>">
                            <?php echo $GetStatename['state_name'] ?>
                            (<?php echo $cityCount; ?>)
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <table border="1" style="margin-left: 30px;" cellpadding="15" cellspacing="5">
            <?php
            while ($return = mysqli_fetch_array($fatch1)) {
            ?>
                <tr>
                    <th>City Name-<?php echo $return['state_name']; ?></th>
                </tr>
            <?php
            }
            ?>
            <?php
            while ($return = mysqli_fetch_array($fatch)) {
            ?>
                <tr>
                    <td align="center">
                        <?php echo $return['city_name']; ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>