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
            if ($_SESSION['permissions'] == 1)
            {
                echo '<a href="admin.php">Admin   <img  src="https://cdn0.iconfinder.com/data/icons/superuser-web-kit/512/686909-user_people_man_human_head_person-512.png" height="22" width="22"></a>';
            }
        }else{
            echo '<a href="user.php">User   <img  src="https://cdn0.iconfinder.com/data/icons/superuser-web-kit/512/686909-user_people_man_human_head_person-512.png" height="22" width="22"></a>';
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
    <table cellpadding="1" cellspacing="2" >
    
    <?php
    if (isset($_SESSION['login_user']))
    {
        echo "<center><h2>Hello, ".$_SESSION['login_user']."</h2></center>";
        
        $result = mysqli_query($db,"SELECT * FROM orders WHERE user='".$_SESSION['login_user']."'");
        $all_property = array();  //declare an array for saving property

        //showing property
        echo 'Your orders';
        echo '<center><table style="border: 1px solid black;">
                <tr>';  //initialize table tag
        while ($property = mysqli_fetch_field($result)) {
            if ($property->name != 'products'){
                echo '<td>' . $property->name . '</td>';  //get field name for header
                array_push($all_property, $property->name);  //save those to array
            }
        }
        echo '</tr>'; //end tr tag

        //showing all data
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            foreach ($all_property as $item) {
                echo '<td>' . $row[$item] . '</td>'; //get items using property value
            }
            echo '</tr>';
        }
        echo "</table>";
        
        echo '<a href="delete.php">Delete account</a>';
    }else
    {
        echo "<center>You need to log in before accessing this area!</br>";
        echo '<a href="login.php">Log In</a></center>';
    }
?>
</table>

	
	
  
</article>

<footer>Copyright &copy; RUSHPhone.com</footer>
</div>

</body>
</html>
