<?php
     $host = "localhost";
     $user = "root";
     $password = "";
     $db = "php8_crud";

     $data = mysqli_connect($host,$user,$password,$db);

     $s_id = $_GET['id'];
     $query = "DELETE FROM student where id='$s_id'";

     $result = mysqli_query($data,$query);

     if($result)
     {
        echo "Delete successful";
     }
     else
     {
        echo "Delete not successful";
     }
?>