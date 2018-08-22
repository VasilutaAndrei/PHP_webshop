<?php
    include('../session.php');
    
    if ($_SESSION['login_user'] != 'admin')
    {
        header("location:../index.php");
    }else{
        $sql = "INSERT INTO `products` (`id`, `name`, `price`, `img`, `brand`, `type`, `display`, `os`, `camera`, `color`) VALUES (NULL, '".$_POST['name']."', '".$_POST['price']."', '".$_POST['img']."', '".$_POST['brand']."', '".$_POST['type']."', '".$_POST['display']."', '".$_POST['os']."', '".$_POST['camera']."', '".$_POST['color']."');";
        $result = mysqli_query($db,$sql);
        if ($result == 1)
        {
            echo "<center>The product has been added!</br>";
            echo '<a href="../admin.php">Back</a></center>';
        }else{
            echo '<center>There has been an issue</center>';
        }
    }
?>