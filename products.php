<?php
    include("session.php");
    print_r($_SESSION);
    
    $sql = "SELECT * FROM products";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo $row["name"].' <a href="cart_add.php?id='.$row["id"].'">Add to cart</a></br>';
        }
    } else {
        echo "0 results";
    }
?>