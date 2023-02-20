<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
</head>
<body>
    <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $db = "php8_crud";

        $data = mysqli_connect($host,$user,$password,$db);

        $query ="SELECT*from student";
        $result = mysqli_query($data,$query);

        if(isset($_GET['search']))
        {
            $text = $_GET['search_text'];
            $sql = "SELECT * From student where name LIKE '%".$text."%' ";
            $result = mysqli_query($data,$sql);
        }

    ?>

    <form action="display.php" method="GET" align="center" action="">
        <input type="text" name="search_text">
        <input type="submit" name="search" value="Search something">
    </form>

    <table border="1px" align="center">
        <tr>
            <th>Name</th>
            <th>Phone number</th>
            <th>Student Image</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>

        <?php
            
            while($info = $result -> fetch_assoc())
            {
            ?>

            
            <tr>
                <?php
                    echo "<td>{$info['name']}</td>";
                    echo "<td>{$info['phone']}</td>";
                    echo "<td><img height='100' width='100' src='{$info['image']}'></td>";
                    echo "<td><a href='delete.php?id={$info['id']}'>Delete</a></td>";
                    echo "<td>
                        <a href='update.php?id={$info['id']}'>Update</a>
                    </td>";
                }
                ?>
            </tr>

        <?php
        ?>
    </table>
    
</body>
</html>l