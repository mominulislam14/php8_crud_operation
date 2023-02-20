<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update data</title>
</head>
<body>
    <h1>update data</h1>
    <?php
        $host="localhost";
        $user="root";
        $password ="";
        $db ="php8_crud";

        $data=mysqli_connect($host,$user,$password,$db);
        $s_id=$_GET['id'];

        $sql="SELECT * FROM student where id='$s_id' ";

        $result = mysqli_query($data,$sql);
        $info = $result->fetch_assoc();

        // echo "{$info['name']}";
        // echo "{$info['phone']}";
        // echo "<img height='200' width='200' src='{$info['image']}' />";

    ?>
    <form action="update_data.php" method="POST" enctype="multipart/form-data">
        <div>
            <input type="text" name="id" value="<?php echo "{$info['id']}"; ?>" hidden>
        </div>
        <div>
            <label>Name</label>
            <input type="text" name="name" value="<?php echo "{$info['name']}"; ?>">
        </div>
        <div>
            <label>phone number</label>
            <input type="number" name="phone" value="<?php echo "{$info['phone']}"; ?>">
        </div>
        <div>
            <label>Old image</label>
            <img height='150' width='150' src="<?php echo "{$info['image']}" ?>">
        </div>
        <div>
            <label>Change image</label>
            <input type="file" name="image">
        </div>
        <div>
            <input type="submit" name="update" value="update data">
        </div>
    </form>


    <?php


    ?>
</body>
</html>