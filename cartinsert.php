<?php
require 'dbcon.php';
$sql= "SELECT * FROM products";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
foreach($result as $key=>$cartvalue){
  $id=$cartvalue['id'];
  $name=$cartvalue['name'];
  $quantity=$cartvalue['quantity'];
  $price=$cartvalue['price'];

  $query = "INSERT INTO cart VALUES ('$id','$name','$quantity','$price')";
  var_dump($query);
  $result = mysqli_query($conn, $query);

  if($result){
      echo"Data succesfully store";
  }
  else{
       echo"error";
      }
}
  
?>