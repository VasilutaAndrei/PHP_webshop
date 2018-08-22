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
        error_reporting(0);
        include('session.php');
        if (!isset($_SESSION["cart"]))
        {
            $_SESSION["cart"] = "";
        }
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
        $params = "";
        $price = "";
        $brand = "";
        $type = "";
        $os = "";
        $color = "";
        foreach ($_GET as $k => $v)
        {
            $params = $params.$k.'='.$v.'&';
            if ($k == 'price')
                $price = $v;
            if ($k == 'brand')
                $brand = $v;
            if ($k == 'type')
                $type = $v;
            if ($k == 'os')
                $os = $v;
            if ($k == 'color')
                $color = $v;
        }
        $params = rtrim($params,"& ");
        //echo $params;
        
        if ($price != "")
            echo $price;
    ?>
	
	<a href="cart.php">Shopping cart  <img  src="https://cdn4.iconfinder.com/data/icons/shopping-set-1/512/18-256.png" height="22" width="22"></a>
	<input type="text" placeholder="Search..">
	<img  src="http://www.grencomm.com/Images/rushphonelogo_small.gif"  height="50">
	<a id="homebutton" href="index.php">Home   <img  src="https://cdn4.iconfinder.com/data/icons/pictype-free-vector-icons/16/home-512.png" height="22" width="22"></a>
	</div>
</header>

<div class="navbar">
  <div class="dropdown">
    <button class="dropbtn">Price
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="index.php?<?php echo $params.'&price=0-1000'; ?>">Under 1000</a>
      <a href="index.php?<?php echo $params.'&price=1000-1500'; ?>">1000 - 1500</a>
      <a href="index.php?<?php echo $params.'&price=1500-2000'; ?>">1500 - 2000</a>
      <a href="index.php?<?php echo $params.'&price=2000-3000'; ?>">2000 - 3000</a>
      <a href="index.php?<?php echo $params.'&price=3000-6000'; ?>">Over 3000</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Brand 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="index.php?<?php echo $params.'&brand=samsung'; ?>">Samsung</a>
      <a href="index.php?<?php echo $params.'&brand=apple'; ?>">Apple</a>
      <a href="index.php?<?php echo $params.'&brand=lg'; ?>">LG</a>
      <a href="index.php?<?php echo $params.'&brand=sony'; ?>">Sony</a>
      <a href="index.php?<?php echo $params.'&brand=nokia'; ?>">Nokia</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Type 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="index.php?<?php echo $params.'&type=smartphone'; ?>">Smartphone</a>
      <a href="index.php?<?php echo $params.'&type=classic'; ?>#">Classic</a>
    </div>
  </div>
 <!-- <div class="dropdown">
	    <button class="dropbtn">Display(inch) 
	      <i class="fa fa-caret-down"></i>
	    </button>
	    <div class="dropdown-content">
	      <a href="index.php?<?php //echo $params.'&display=0-3.5'; ?>">Under 3.5</a>
	      <a href="index.php?<?php //echo $params.'&display=3.5-3.9'; ?>">3.5 - 3.9</a>
	      <a href="index.php?<?php //echo $params.'&display=4-4.9'; ?>">4 - 4.9</a>
	      <a href="index.php?<?php //echo $params.'&display=5-5.5'; ?>">5 - 5.5</a>
	      <a href="index.php?<?php //echo $params.'&display=5.5-10'; ?>">Over 5.5</a>
	    </div>
	  </div>  -->
	<div class="navbar">
	  <div class="dropdown">
	    <button class="dropbtn">OS
	      <i class="fa fa-caret-down"></i>
	    </button>
	    <div class="dropdown-content">
	      <a href="index.php?<?php echo $params.'&os=android'; ?>">Android</a>
	      <a href="index.php?<?php echo $params.'&os=ios'; ?>">IOS</a>
	      <a href="index.php?<?php echo $params.'&os=other'; ?>">Other</a>
          
	    </div>
	  </div>
	  <div class="dropdown">
	    <button class="dropbtn">Color 
	      <i class="fa fa-caret-down"></i>
	    </button>
	    <div class="dropdown-content">
	      <a href="index.php?<?php echo $params.'&color=black'; ?>">Black</a>
	      <a href="index.php?<?php echo $params.'&color=white'; ?>">White</a>
	      <a href="index.php?<?php echo $params.'&color=grey'; ?>">Grey</a>
	    </div>
	  </div>
      <div class="dropdown">
        <a href="index.php">
	    <button class="dropbtn">Remove filters 
	      <i class="fa fa-caret-down"></i>
	    </button>
        </a>
	  </div>
	</div>
</div>


<article class="article">
    <table cellpadding="1" cellspacing="2" >
    <?php
        $sql = "SELECT * FROM products WHERE ";
        $sql2 = "SELECT * FROM products";
        if ($price != "")
        {
            $price = explode("-", $price);
            $sql = $sql.'price >= '.$price[0].' AND price <= '.$price[1].' AND ';
        }
        if ($brand != "")
        {
            $sql = $sql."brand = '".$brand."' AND ";
        }
        if ($type != "")
        {
            $sql = $sql."type = '".$type."' AND ";
        }
        if ($os != "")
        {
            $sql = $sql."os = '".$os."' AND ";
        }
        if ($color != "")
            $sql = $sql."color = '".$color."' AND ";
        if ($params != "")
        {
            $sql = rtrim($sql," AND  ");
            $sql = $sql.';';
        }else{
            $sql = $sql2;
        }
        $sql = $sql.' LIMIT 20';
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<TR><TD><img  src="'.$row['img'].'" ></TD><TD><a> <h3>'.$row['name'].'</h3>';
                echo '<b>Brand: </b>'.$row['brand'].' <br>';
                echo '<b>Type: </b>'.$row['type'].' <br>';
                echo '<b>Display(inch): </b>'.$row['display'].'  <br>';
                echo '<b>OS: </b>'.$row['os'].' <br>';
                echo '<b>Camera rezolution(Mp): </b>'.$row['camera'].' <br>';
                echo '<b>Color: </b>'.$row['color'].'<br></a></TD><TD>
                            <img  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAA1BMVEX///+nxBvIAAAASElEQVR4nO3BgQAAAADDoPlTX+AIVQEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwDcaiAAFXD1ujAAAAAElFTkSuQmCC" >
                    </TD>
                    <Th >
                        <b>Price: </b> '.$row['price'].' Lei 
                        <h3><a id="hover" href="cart_add.php?id='.$row['id'].'">Add to cart</a></h3>
                    </Th>
                </TR>';
            }
        } else {
            echo "0 results";
        }
    ?>

</table>
	
	
  
</article>

<footer>Copyright &copy; RUSHPhone.com</footer>
</div>

</body>
</html>
