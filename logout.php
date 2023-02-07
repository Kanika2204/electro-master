<?php
session_start();
if(isset($_SESSION['id'])){
    session_destroy();
    header("location: userloginform.php");
}
else{
    header('location: index.php');
}
    ?>