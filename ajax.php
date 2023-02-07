<?php
 session_start();
 include 'dbcon.php';
 require_once( "cart.php" );
 $cart = new cart();
 $action = strip_tags( $_GET["action"] );
 switch ($action) {
  case "add":
   $cart->addToCart();
   break;
 }
?>