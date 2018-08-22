<!DOCTYPE html>
<html>
<head>
	<title>RUSHPhone</title>
	<link rel="stylesheet" href="page.css"/>
</head>
<body>

<div class="flex-container">
<header>
	<div class="topnav">
    <?php
        include('session.php');
        if (isset($_SESSION['login_user']))
        {
            echo '<a href="logout.php">Logout   <img  src="https://cdn0.iconfinder.com/data/icons/superuser-web-kit/512/686909-user_people_man_human_head_person-512.png" height="22" width="22"></a>';
            echo '<a href="user.php">User   <img  src="https://cdn0.iconfinder.com/data/icons/superuser-web-kit/512/686909-user_people_man_human_head_person-512.png" height="22" width="22"></a>';
         if ($_SESSION['permissions'] == 1)
            {
                echo '<a href="admin.php">Admin   <img  src="https://cdn0.iconfinder.com/data/icons/superuser-web-kit/512/686909-user_people_man_human_head_person-512.png" height="22" width="22"></a>';
            }
        }else{
            
            echo '<a href="login.php">Log in   <img  src="https://cdn0.iconfinder.com/data/icons/superuser-web-kit/512/686909-user_people_man_human_head_person-512.png" height="22" width="22"></a>';
        }
    ?>
	
	<a href="cart.php">Shopping cart  <img  src="https://cdn4.iconfinder.com/data/icons/shopping-set-1/512/18-256.png" height="22" width="22"></a>
	<input type="text" placeholder="Search..">
	<img  src="http://www.grencomm.com/Images/rushphonelogo_small.gif"  height="50">
	<a id="homebutton" href="index.php">Home   <img  src="https://cdn4.iconfinder.com/data/icons/pictype-free-vector-icons/16/home-512.png" height="22" width="22"></a>
	</div>
</header>




<article class="article">
    <center><h2>Shopping cart</h2></center>
    <table cellpadding="1" cellspacing="2" >
    <?php
        if (isset($_SESSION['cart']))
        {
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
            $total_price = 0;
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    foreach($arr as $key => $value)
                    {
                        if ((int)$value == $row['id'])
                        {
                            $total_price = $total_price + (int)$row['price'];
                            echo '<TR><TD><img  src="'.$row['img'].'" ></TD><TD><a> <h3>'.$row['name'].'</h3>';
                            echo '<b>Brand: </b>'.$row['brand'].' <br>';
                            echo '<b>Type: </b>'.$row['type'].' <br>';
                            echo '<b>Display(inch): </b>'.$row['display'].' <br>';
                            echo '<b>OS: </b>'.$row['os'].' <br>';
                            echo '<b>Camera rezolution(Mp): </b>'.$row['camera'].' <br>';
                            echo '<b>Color: </b>'.$row['color'].'<br></a></TD><TD>
                                        <img  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAA1BMVEX///+nxBvIAAAASElEQVR4nO3BgQAAAADDoPlTX+AIVQEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwDcaiAAFXD1ujAAAAAElFTkSuQmCC" >
                                </TD>
                                <Th >
                                    <b>Price: </b> '.$row['price'].' Lei 
                                    <h3><a id="hover" href="cart_remove.php?id='.$row['id'].'">Remove from cart</a></h3>
                                </Th>
                            </TR>';
                        }
                    }
                }
                echo '</table>';
                if ($_SESSION['cart'] != "")
                    echo '<center><h3>Total price: '.$total_price.'</h3></br><a href="validate_order.php?total_price='.$total_price.'"><button class="button">Validate your order</button></a></center>';
                else
                    echo "<center>Your shopping cart is empty</center>";
                    
            } else {
                echo "0 results";
            }
        }else
        {
            echo "<center>Your shopping cart is empty</center>";
        }
    ?>


	
	
  
</article>

<footer>Copyright &copy; RUSHPhone.com</footer>
</div>

</body>
</html>
