<?php
include("database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <form action="database.php" method="post">
            <div class="mb-3">
                <label for="exampleInputUser1" class="form-label">UserName:</label>
                <input type="text" class="form-control" name="username" id="exampleInputUser1" aria-describedby="userHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary mb-2 w-100" name="btnsubmit">Submit</button>
        </form>
    </div>
    <div class="container">
        <table class="table table-bordered table-inverse border-dark table-hover">
            <thead class="bg-info text-white text-center">
                <tr>
                    <th>id</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                foreach ($fetch_data as $arr) {
                ?>
                    <tr>
                        <td><?php echo $arr['id']; ?></td>
                        <td><?php echo $arr['username']; ?></td>
                        <td><?php echo $arr['password']; ?></td>
                        <td><a href="edit-data.php?edit=<?php echo $arr['id']; ?>">Edit</a></td>
                        <td><a href="view-data.php?delete=<?php echo $arr['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>