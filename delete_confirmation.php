<?php
    if (isset($_GET['code']))
    {
        if ($_GET['code'] == 1)
        {
            echo '<center>Your account has been deleted!</br>';
            echo '<a href="index.php">Index page</a></center>';
        }else{
            echo '<center>Something went wrong!</br>';
            echo '<a href="index.php">Go back</a></center>';
        }
    }
    
?>