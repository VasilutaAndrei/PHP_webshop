<?php
    include('session.php');
    if ($_SESSION['permissions'] == 1)
    {
        
    }else{
        echo "<center>Looks like you got lost, go back</center>";
    }
?>

<html>
   
   <head>
      <title>Admin</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Add user</b></div>
				
            <div style = "margin:30px">
               
               <form action = "admin/add_user.php" method = "post">
                  <label>Username  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "text" name = "password" class = "box" /><br/><br />
                  <label>Permissions  :</label><input type = "text" name = "permissions" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error_1; ?></div>
					
            </div>
				
         </div>
			
      </div>
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Add product</b></div>
				
            <div style = "margin:30px">
               
               <form action="admin/add_product.php" method = "post">
                  <label>Name  :</label><input type = "text" name = "name" class = "box"/><br /><br />
                  <label>Price :</label><input type = "text" name = "price" class = "box" /><br/><br />
                  <label>Image :</label><input type = "text" name = "img" class = "box" /><br/><br />
                  <label>Brand :</label><input type = "text" name = "brand" class = "box" /><br/><br />
                  <label>Type :</label><input type = "text" name = "type" class = "box" /><br/><br />
                  <label>Display :</label><input type = "text" name = "display" class = "box" /><br/><br />
                  <label>OS :</label><input type = "text" name = "os" class = "box" /><br/><br />
                  <label>Camera :</label><input type = "text" name = "camera" class = "box" /><br/><br />
                  <label>Color :</label><input type = "text" name = "color" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error_1; ?></div>
					
            </div>
				
         </div>
			
      </div>
      
      <div align = "center">
         <div style = "width:700px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Products</b></div>
				
            <div style = "margin:30px">
               
                <?php
                    $result = mysqli_query($db,"SELECT * FROM products");
                    $all_property = array();  //declare an array for saving property

                    //showing property
                    echo '<center><table style="border: 1px solid black;">
                            <tr>';  //initialize table tag
                    while ($property = mysqli_fetch_field($result)) {
                        if ($property->name != 'img'){
                            echo '<td>' . $property->name . '</td>';  //get field name for header
                            array_push($all_property, $property->name);  //save those to array
                        }
                    }
                    echo '<td>Remove</td>';
                    echo '<td>Edit</td>';
                    echo '</tr>'; //end tr tag

                    //showing all data
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        foreach ($all_property as $item) {
                            echo '<td>' . $row[$item] . '</td>'; //get items using property value
                        }
                        echo '<td><a href="admin/remove_product.php?id='.$row['id'].'">remove</a></td>';
                        echo '<td><a href="admin/edit_product.php?id='.$row['id'].'">edit</a></td>';
                        echo '</tr>';
                    }
                    echo "</table></center>";
               ?>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error_2; ?></div>
					
            </div>
				
         </div>
			
      </div>
      <div align = "center">
         <div style = "width:700px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Users</b></div>
				
            <div style = "margin:30px">
               <?php
                    $result = mysqli_query($db,"SELECT * FROM users");
                    $all_property = array();  //declare an array for saving property

                    //showing property
                    echo '<center><table style="border: 1px solid black;">
                            <tr>';  //initialize table tag
                    while ($property = mysqli_fetch_field($result)) {
                        echo '<td>' . $property->name . '</td>';  //get field name for header
                        array_push($all_property, $property->name);  //save those to array
                    }
                    echo '<td>Remove</td>';
                    echo '<td>Edit</td>';
                    echo '</tr>'; //end tr tag

                    //showing all data
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        foreach ($all_property as $item) {
                            echo '<td>' . $row[$item] . '</td>'; //get items using property value
                        }
                        echo '<td><a href="admin/remove_user.php?id='.$row['id'].'">remove</a></td>';
                        echo '<td><a href="admin/edit_user.php?id='.$row['id'].'">edit</a></td>';
                        echo '</tr>';
                    }
                    echo "</table></center>";
               ?>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error_3; ?></div>
					
            </div>
				
         </div>
			
      </div>
      
      <div align = "center">
         <div style = "width:700px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Orders</b></div>
				
            <div style = "margin:30px">
               
                <?php
                    $result = mysqli_query($db,"SELECT * FROM orders");
                    $all_property = array();  //declare an array for saving property

                    //showing property
                    echo '<center><table style="border: 1px solid black;">
                            <tr>';  //initialize table tag
                    while ($property = mysqli_fetch_field($result)) {
                        echo '<td>' . $property->name . '</td>';  //get field name for header
                        array_push($all_property, $property->name);  //save those to array
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
                    echo "</table></center>";
               ?>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error_2; ?></div>
					
            </div>
				
         </div>

   </body>
</html>