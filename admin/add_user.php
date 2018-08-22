<?php
    include('../session.php');
    
    if ($_SESSION['login_user'] != 'admin')
    {
        header("location:../index.php");
    }else{
        $sql = "INSERT INTO `users` (`id`, `username`, `password`, `permissions`) VALUES (NULL, '".$_POST['username']."', '".$_POST['password']."', '".$_POST['permissions']."');";
        $result = mysqli_query($db,$sql);
        if ($result == 1)
        {
            echo "<center>The user has been added!</br>";
            echo '<a href="../admin.php">Back</a></center>';
        }else{
            echo '<center>There has been an issue</center>';
        }
    }
?>