<?php
  if(isset($_REQUEST['ins']))
  {
        ?>
        <div>First Name : <?php echo $_REQUEST['first_name'];?></div>
        <div>Last Name : <?php echo $_REQUEST['last_name'];?></div>
        <div>Father Name : <?php echo $_REQUEST['father_name'];?></div>
        <div>Mother Name : <?php echo $_REQUEST['mother_name'];?></div>
        <div>Mobile No. : <?php echo $_REQUEST['mobile_no'];?></div>
        <div>Email Id : <?php echo $_REQUEST['email_id'];?></div>
        <div>Address : <?php echo $_REQUEST['address'];?></div>
        <?php
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php form</title>
</head>
<body>
    <form method="post">
        <table align="center" border="1" >
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="first_name" placeholder="Enter your first name"></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="last_name" placeholder="Enter your Last name"></td>
            </tr>
            <tr>
                <td>Father Name:</td>
                <td><input type="text" name="father_name" placeholder="Enter your Father name"></td>
            </tr>
            <tr>
                <td>Mother Name:</td>
                <td><input type="text" name="mother_name" placeholder="Enter your Mother name"></td>
            </tr>
            <tr>
                <td>Mobile No.:</td>
                <td><input type="number" name="mobile_no" placeholder="Enter your Mobile No."></td>
            </tr>
            <tr>
                <td>Email Id:</td>
                <td><input type="text" name="email_id" placeholder="Enter your Email Id"></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><textarea cols="20" rows="5" name="address" placeholder="Enter your Address"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="Submit" name="ins">
                    <input type="reset">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>