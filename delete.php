<?php
session_start();
   include 'header.php';
   include 'dbcon.php';
   if(isset($_POST['action']) && $_POST['action'] == 'delete') {  
        $prod_id = $_POST['id'];
        $user_id = $_SESSION['id'];

        $sql="DELETE from CART where user_id=".$user_id." and prod_id=".$prod_id;
        $result = $conn->query($sql);

        if(!$result)
        {
                return false;
        }
        return true;
    }
      
?>