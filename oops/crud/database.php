<?php

class databse
{
    public $host;
    public $user;
    public $pass;
    public $database;

    public function connect()
    {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->database = 'oops_crud';

        $con = new mysqli($this->host, $this->user, $this->pass, $this->database);

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        return $con;
    }
}

class queries extends databse
{
    public function GetData()
    {
        $sql = "SELECT * FROM user";
        $data = $this->connect()->query($sql);

        if ($data->num_rows > 0) {
            while ($result = $data->fetch_assoc()) {
                $arr[] = $result;
            }
            return $arr ?? [];
        } else {
            echo "Data Not Found.";
        }
    }

    public function AddData($data)
    {
        $username = $data['username'];
        $password = $data['password'];

        $insert = "INSERT INTO user(username, password) VALUES ('$username', '$password')";
        $result = $this->connect()->query($insert);

        if ($result) {
            echo '<script>
                alert("Data inserted Successfully!");
                window.location.href = "view-data.php";
            </script>';
        } else {
            echo '<script>
                alert("Data insertion Error");
                window.location.href = "view-data.php";
            </script>';
        }
    }

    public function deleteData($delid)
    {
        $delete = "DELETE FROM user WHERE id=$delid";
        $result = $this->connect()->query($delete);
        if ($result) {
            echo '<script>
                alert("Data deleted successfully!");
                window.location.href = "view-data.php";
            </script>';
        } else {
            echo '<script>
                alert("Data deletion error: ' . $this->connect()->error . '");
                window.location.href = "view-data.php";
            </script>';
        }
    }

    public function UpdateData($data)
    {
        $username = $data['username'];
        $password = $data['password'];

        $update = "UPDATE user SET username='$username', password='$password' WHERE id=$username";
        $result = $this->connect()->query($update);
        if ($result) {
            echo '<script>
                alert("Data updated successfully!");
                window.location.href = "view-data.php";
            </script>';
        } else {
            echo '<script>
                alert("Data update error: ' . $this->connect()->error . '");
                window.location.href = "view-data.php";
            </script>';
        }
    }

    public function ShowDataUpdate($id)
    {
        $sql = "SELECT * FROM user WHERE id=$id";
        $data = $this->connect()->query($sql);
        $result = $data->fetch_assoc();
        return $result;
    }
}

$object = new queries();
$fetch_data = $object->GetData();

if (isset($_REQUEST['btnsubmit'])) {
    $object->AddData($_REQUEST);
}

if (isset($_REQUEST['btnupdate'])) {
    $object->UpdateData($_REQUEST);
}

if (isset($_REQUEST['delete'])) {
    $object->deleteData($_REQUEST['delete']);
}
?>
