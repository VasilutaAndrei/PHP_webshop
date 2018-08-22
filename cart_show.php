<?php
    include('session.php');
    $products = $_SESSION['cart'];
    $arr = explode(";",$products);
    for ($i = 0; $i <= count($arr); $i++)
    {
        $arr[$i] = str_replace(' ', '', $arr[$i]);
        if (!ctype_digit($arr[$i]))
            unset($arr[$i]);
    }
    
    $sql = "SELECT * FROM products";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            foreach($arr as $key => $value)
            {
                if ((int)$value == $row['id'])
                    echo $row["name"].' <a href="cart_remove.php?id='.$row["id"].'">Remove from cart</a></br>';
            }
        }
    } else {
        echo "0 results";
    }
?>
