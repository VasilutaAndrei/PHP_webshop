<?php
    include('session.php');
    
    if (!isset($_SESSION['login_user']))
    {
        header("location:login.php?message=You need to log in before you validate your order!");
    }else{
        $sql = "INSERT INTO `orders` (`id`, `user`, `products`, `total_price`) VALUES (NULL, '".$_SESSION['login_user']."', '".$_SESSION['cart']."', ".$_GET['total_price'].");";
        $result = mysqli_query($db,$sql);
        if ($result == 1)
        {
            echo "<center>The order has been validated!</br>";
            unset($_SESSION['cart']);
            echo '<a href="index.php">Back</a></center>';
        }else{
            echo '<center>There has been an issue with your order, please try again later</center>';
        }
    }
?>