<?php
    include('session.php');
    $products = $_SESSION['cart'];
    $arr = explode(";",$products);
    $new = "";
    foreach($arr as $key => $value)
        if (ctype_digit($value))
            if ($value != (int)$_GET['id'])
                $new = $new.$value.';';
    $_SESSION["cart"] = $new;
    echo "<center>The product has been removed from your cart</br>";
    echo '<a href="cart.php">Back</a></center>';
?>