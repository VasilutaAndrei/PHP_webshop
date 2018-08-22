<?php
    include('session.php');
    
    $_SESSION["cart"] = $_SESSION["cart"].$_GET["id"].';';
    echo "<center>The product has been added to your cart</br>";
    echo '<a href="index.php">Back</a></center>';
?>