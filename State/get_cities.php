<?php
include("db.php");

if (isset($_GET['cit'])) {
    $state_id = $_GET['cit'];
    $query = "SELECT * FROM city WHERE state_id='$state_id'";
    $result = mysqli_query($db, $query);
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['city_id'] . "'>" . $row['city_name'] . "</option>";
        }
    } else {
        echo "<option value='' hidden>No cities found</option>";
    }
}
?>
