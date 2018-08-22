<?php
   session_start();
   unset($_SESSION["login_user"]);
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
   }
?>