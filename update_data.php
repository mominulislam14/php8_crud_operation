<?php
     $host = "localhost";
     $user = "root";
     $password = "";
     $db = "php8_crud";

     $data = mysqli_connect($host,$user,$password,$db);

    if(isset($_POST['update']))
    {
        $s_id = $_POST['id'];
        $s_name = $_POST['name'];
        $s_phone = $_POST['phone'];
        $file = $_FILES['image']['name'];

        $dst = "./image/".$file;
        $dst_db = "image/".$file;

        move_uploaded_file($_FILES['image']['tmp_name'],$dst);

        if($file)
        {
            $sql = "UPDATE student SET name='$s_name' , phone ='$s_phone' , image = '$dst_db' where id='$s_id' ";
        }
        else
        {
            $sql = "UPDATE student SET name='$s_name' , phone ='$s_phone' where id='$s_id' ";
        }
        $result = mysqli_query($data,$sql);

        if($result)
        {
            echo "update success";
        }
        else
        {
            echo "update failed";
        }
    }
    
?>