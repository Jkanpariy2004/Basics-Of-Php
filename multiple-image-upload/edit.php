<?php
$db = mysqli_connect('localhost', 'root', '', 'multiple_image_upload');

if (isset($_REQUEST['editid'])) {
    $id = $_REQUEST['editid'];
    $sql = "select * from image where id='$id' ";
    $asd = mysqli_query($db, $sql);
    $return = mysqli_fetch_array($asd);
}

$view = "Select * from image";
$GetData = mysqli_query($db, $view);

if (isset($_REQUEST['btnUpdatePhoto'])) {
    $id = $_POST['id'];
    $old_photo = $_POST['old_photo'];
    
    $new_photo = $_FILES['new_photo']['name'];
    $temp_new_photo = $_FILES['new_photo']['tmp_name'];

    move_uploaded_file($temp_new_photo, 'image/' . $new_photo);

    $old_photo_path = 'image/' . $old_photo;
    if (file_exists($old_photo_path)) {
        unlink($old_photo_path);
    }
    
    $update_photo_query = "update image set image = REPLACE(image, '$old_photo', '$new_photo') where id = $id";
    // print_r($update_photo_query); die();
    mysqli_query($db, $update_photo_query);

    header("location: multi-image.php");
}

if (isset($_REQUEST['deleteid'])) {
    $id = $_REQUEST['deleteid'];
    $imageQuery = "select image from image where id='$id'";
    $imageResult = mysqli_query($db, $imageQuery);
    $row = mysqli_fetch_array($imageResult);
    $images = explode(',', $row['image']);
    $deleted_image = $_REQUEST['imgname'];
    if (($key = array_search($deleted_image, $images)) !== false) {
        unset($images[$key]);
    }
    $new_images = implode(',', $images);
    $delete_image_query = "update image set image='$new_images' where id='$id'";

    mysqli_query($db, $delete_image_query);
    $deleted_image_path = 'image/' . $deleted_image;
    if (file_exists($deleted_image_path)) {
        unlink($deleted_image_path);
    }
    header("location: multi-image.php");
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
                <div class="text-center">
                    <h1>Update & Delete Photo</h1>
                </div>                
                <div class="text-center">
                    <?php if (!empty($return['image'])){ ?>
                        <?php $photos = explode(',', $return['image']); ?>
                        <?php foreach ($photos as $photo){ ?>
                            <div>
                                <img style="object-fit: fill; margin:3px;" src="image/<?php echo $photo; ?>" alt="Car Photo" height="100px" width="100px">
                                <p><?php echo $photo; ?></p>
                                <!-- Update and delete links for each image -->
                                <form method="post" action="" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $return['id']; ?>">
                                    <input type="hidden" name="old_photo" value="<?php echo $photo; ?>">
                                    <input type="file" name="new_photo">
                                    <button type="submit" name="btnUpdatePhoto" class="btn btn-primary">Update</button>
                                </form>
                                <form method="post" action="">
                                    <input type="hidden" name="deleteid" value="<?php echo $return['id']; ?>">
                                    <input type="hidden" name="imgname" value="<?php echo $photo; ?>">
                                    <button type="submit" name="btnDeletePhoto" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </form>
    </div>

    <div class="image-container">
        <table class="table table-bordered border-dark w-100 m-auto mt-5 mb-5 text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Images</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($GetData)){ ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td>
                            <?php $images = explode(',', $row['image']); ?>
                            <?php foreach ($images as $image){ ?>
                                <img src="image/<?php echo $image; ?>" alt="Car Photo">
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
