<?php
include("db.php");

$view1 = "SELECT * FROM state";
$GetStateData = mysqli_query($db, $view1);

$view = "SELECT * FROM city";
$GetData = mysqli_query($db, $view);

if (isset($_REQUEST['btnsubmit'])) {
    $state_id = $_REQUEST['state_id'];
    $city = $_REQUEST['city_name'];
    $insert = "INSERT INTO city (state_id, city_name) VALUES ('$state_id','$city')";
    mysqli_query($db, $insert);
    header("location:city.php");
}

if (isset($_REQUEST['delete'])) {
    $id = $_REQUEST['delete'];
    $sql = "DELETE FROM city WHERE city_id='$id'";
    mysqli_query($db, $sql);
    header("location:city.php");
}

if (isset($_REQUEST['aa'])) {
    $state_id1 = $_REQUEST['aa'];
    $query = "SELECT * FROM city WHERE state_id='$state_id1'";
    $result = mysqli_query($db, $query);
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['city_id'] . "'>" . $row['city_name'] . "</option>";
        }
    } else {
        echo "<option value=''>No cities found</option>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        var xyz;
        function GetCity()
        {
                xyz=$('#state_id').val();
                $('#city_id').load('city.php?aa='+xyz);
        }
    </script>
</head>

<body>
    <form action="" method="post">
        <table border="1" align="center">
            <tr>
                <td>State name:</td>
                <td>
                    <select name="state_id" id="state_id" onchange="GetCity()">
                        <option value="" hidden>Select State</option>
                        <?php
                        while ($row = mysqli_fetch_array($GetStateData)) {
                            echo "<option value='" . $row['state_id'] . "'>" . $row['state_name'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>City name:</td>
                <td>

                    <select name="city_id" id="city_id">
                        <option value="" hidden>Select City</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnsubmit">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <h2>
                        <a href="State.php">Add State here</a>
                    </h2>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <h2>
                        <a href="Show_state.php">Show City State Wise</a>
                    </h2>
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
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_array($GetData)) {
            $state1 = $row['state_id'];
            $view2 = "SELECT * FROM state WHERE state_id='$state1'";
            $GetStateData1 = mysqli_query($db, $view2);
            $GetStatename = mysqli_fetch_array($GetStateData1);
        ?>
            <tr align="center">
                <td><?php echo $row['city_id'] ?></td>
                <td><?php echo $GetStatename['state_name'] ?></td>
                <td><?php echo $row['city_name'] ?></td>
                <td><a href="city_edit.php?edit=<?php echo $row['city_id'] ?>">Edit</a></td>
                <td><a href="city.php?delete=<?php echo $row['city_id'] ?>" onclick=" return confirm('Are You Sure Record Delete !!!') ">Delete</a></td>
            </tr>
        <?php
        }
        ?>

    </table>
</body>

</html>
