<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 8 CRUD Operation</title>
</head>
<body>
    <h1>Php 8 CRUD operation</h1>

    <?php
        $host = "localhost";
        $user = "root";
        $password= "";
        $db = "php8_crud";

        $data = mysqli_connect($host,$user,$password,$db);

        if($data === false)
        {
            die("connection error");
        }
        
        if(isset($_POST['submit']))
        {
            $sname = $_POST['name'];
            $sphone = $_POST['phone'];

            $file = $_FILES['image']['name'];
            $dst = "./image/".$file;
            $dst_db = "image/".$file;

            move_uploaded_file($_FILES['image']['tmp_name'],$dst);

            $query = "INSERT INTO student(name,phone,image) VALUES('$sname','$sphone','$dst_db')";
            $result = mysqli_query($data,$query);

            if($result)
            {
                echo "upload success";
            }
            else
            {
                echo "not success";
            }
        }
    ?>

    <div align="center">
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="">Student Name:</label>
                <input type="text" name="name">
            </div>
            <div>
                <label for="">Student Phone:</label>
                <input type="number" name="phone">
            </div>
            <div>
                <label for="">Student Image:</label>
                <input type="file" name="image">
            </div>
            <div>
                <input type="submit" name="submit" value="upload data">
            </div>
        </form>
    </div>
</body>
</html>