<?php
$db = mysqli_connect('localhost', 'root', '', 'multiple_image_upload');

$view = "SELECT * FROM image";
$GetData = mysqli_query($db, $view);

if (isset($_POST['btnsubmit'])) {
    $carphotos = array();

    if (!empty($_FILES['carphotos']['name'][0])) {
        $totalFiles = count($_FILES['carphotos']['name']);
        for ($i = 0; $i < $totalFiles; $i++) {
            $carphoto = $_FILES['carphotos']['name'][$i];
            move_uploaded_file($_FILES['carphotos']['tmp_name'][$i], 'image/' . $carphoto);
            $carphotos[] = $carphoto;
        }
    }

    $carphotos_str = implode(',', $carphotos);

    $insert = "INSERT INTO image (image) VALUES ('$carphotos_str')";
    mysqli_query($db, $insert);

    header("Location: multi-image.php");
}

if (isset($_GET['deleteid'])) {
    $delete_id = $_GET['deleteid'];

    // Fetch all photos associated with the record to delete
    $get_photos_query = "SELECT image FROM image WHERE id = $delete_id";
    $photos_result = mysqli_query($db, $get_photos_query);
    while ($row = mysqli_fetch_assoc($photos_result)) {
        $car_photos = explode(',', $row['image']);

        // Delete each photo from the directory
        foreach ($car_photos as $photo) {
            $file_path = 'image/' . $photo;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
    }

    // Delete the record from the table
    $delete_query = "DELETE FROM image WHERE id = $delete_id";
    mysqli_query($db, $delete_query);

    header("Location: multi-image.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Image Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .adminbg {
            margin: auto;
            margin-top: 50px;
            width: 100%;
            padding: 15px;
            max-width: 700px;
            background: white;
            border-radius: 4px;
            box-shadow: rgba(60, 66, 87, 0.12) 0px 7px 14px 0px, rgba(0, 0, 0, 0.12) 0px 3px 6px 0px;
        }

        .image-container {
            margin-top: 20px;
        }

        .image-container img {
            width: 200px;
            height: 200px;
            margin-right: 10px;
            margin-bottom: 10px;
            object-fit: fill;
        }
    </style>
</head>
<body>
    <div class="adminbg">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="formFileMultiple">Your Car's Photos</label>
                <input type="file" class="form-control bg-white rounded-3" name="carphotos[]" id="formFileMultiple" required multiple>
            </div>
            <button type="submit" name="btnsubmit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
    <div class="image-container">
        <table class="table table-bordered border-dark w-100 m-auto text-center">
            <tr>
                <th>ID</th>
                <th>Images</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php 
            while ($row = mysqli_fetch_assoc($GetData)) {
                $images = explode(',', $row['image']);
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td>
                        <?php
                            foreach ($images as $image) {
                        ?>
                            <img src="image/<?php echo $image ?>" alt="Car Photo">
                        <?php
                            }
                        ?>
                    </td>
                    <td><a class="btn btn-success" href="edit.php?editid=<?php echo $row['id']; ?>">Edit</a></td>
                    <td><a class="btn btn-danger" href="multi-image.php?deleteid=<?php echo $row['id']; ?>">Delete All</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
