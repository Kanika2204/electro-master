<?php
include( 'dbcon.php');


if(isset($_POST['submit'])){
   
    if (empty($_POST["name"])) {
        echo "Name is required"; die;
    } else if(!preg_match("/^[a-zA-Z ]*$/",$_POST["name"])) {
        echo "Only alphabets and white space are allowed";
    } else {
        $name = $_POST["name"];
    }

    if (empty($_POST["quantity"])) {
        echo "Quantity is required"; die;
    }else {
        $quantity =$_POST["quantity"];
    }

    if (empty($_POST["price"])) {
        echo "please enter the price"; die;
    }else {
        $price = $_POST["price"];
    }
    
    if(isset($_FILES['image'])){

    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    
    $extensions= array("jpeg","jpg","png");
      
    if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
    if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
    if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"uploads/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
} 


   if (empty($_POST["description"])) {
            echo "please enter some description."; die;
            }else {
            $description = $_POST["description"];
   }
   $published = $_POST["published"];

$sql = "INSERT INTO products VALUES ('','$name','$quantity','$price','$published','$file_name','$description')";
 $result = mysqli_query($conn, $sql);

if($result){
    echo"Data succesfully store";
    header("location:prod-list.php");
    
}
else{
    echo"error";
}
}
    ?>
