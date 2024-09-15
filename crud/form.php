<?php
    include("db.php");
    
    $view=" select * from form ";
    $Get=mysqli_query($db,$view);

    if(isset($_REQUEST['btnsubmit']))
    {
        $name=$_REQUEST['book_name'];
        $other=$_REQUEST['other_name'];
        $price=$_REQUEST['price'];
        $email=$_REQUEST['email_id'];
        $store=$_REQUEST['store_name'];

        $insert=" insert into form(book_name,other_name,price,email_id,store_name) values ('$name','$other','$price','$email','$store') ";
        mysqli_query($db,$insert);

        header("location:form.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div align="center">
            <div>Book name</div>
            <div><input type="text" name="book_name"></div>
            <div>Other Name</div>
            <div><input type="text" name="other_name"></div>
            <div>Price</div>
            <div><input type="number" name="price"></div>
            <div>Email</div>
            <div><input type="email" name="email_id"></div>
            <div>Store Name</div>
            <div><input type="text" name="store_name"></div>
            <br>
            <div><input type="submit" name="btnsubmit"></div>
        </div>
    </form>

    <table align="center" border="1">
        <tr>
            <th>Book Name</th>
            <th>Other Name</th>
            <th>Price</th>
            <th>Email Id</th>
            <th>Store Name</th>
        </tr>

        <?php
            while($row=mysqli_fetch_array($Get))
            {
        ?>
        <tr>
            <td><?php echo $row['book_name'] ?></td>
            <td><?php echo $row['other_name'] ?></td>
            <td><?php echo $row['price'] ?></td>
            <td><?php echo $row['email_id'] ?></td>
            <td><?php echo $row['store_name'] ?></td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>