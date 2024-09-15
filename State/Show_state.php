<?php
include("db.php");

$view1 = "SELECT * FROM state";
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
    <table border="1" cellpadding="15" cellspacing="5">
        <tr align="center">
            <th>State Name</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($GetData1)) {
            $state1 = $row['state_name'];
            $view2 = "SELECT * FROM state WHERE state_name='$state1'";
            $GetStateData1 = mysqli_query($db, $view2);
            $GetStatename = mysqli_fetch_array($GetStateData1);

            $state2 = $row['state_id'];
            $view3 = "SELECT * FROM city WHERE state_id='$state2'";
            $GetStateData2 = mysqli_query($db, $view3);
            $GetStatename1 = mysqli_num_rows($GetStateData2);
        ?>
            <tr align="center">
                <td>
                    <a href="Show_state_data.php?edit=<?php echo $row['state_id'] ?>">
                        <?php echo $GetStatename['state_name'] ?>
                       (<?php echo $GetStatename1;?>)
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>