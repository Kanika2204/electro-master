<?php

include 'dbcon.php';


if(isset($_POST['submit'])){
   
    if (empty($_POST["firstname"])) {
        echo "Firstname is required"; die;
    } else if(!preg_match("/^[a-zA-Z ]*$/",$_POST["firstname"])) {
        echo "Only alphabets and white space are allowed";
    } else {
        $firstname = $_POST["firstname"];
    }

    if (empty($_POST["lastname"])) {
        echo "Lastname is required"; die;
    } else if(!preg_match("/^[a-zA-Z ]*$/",$_POST["lastname"])) {
        echo "Only alphabets and white space are allowed";
    } else {
        $lastname = $_POST["lastname"];
    }

    if (empty($_POST["email"])) {
        echo "Email is required"; die;
    }else {
        $email =$_POST["email"];
    }

    if (empty($_POST["password"])) {
        echo "please enter the password"; die;
    }else {
        $password = $_POST["password"];
    }

    if (empty($_POST["address"])) {
        echo "please enter the phone number"; die;
    }else {
        $address = $_POST["address"];
    }

    if (empty($_POST["phoneno"])) {
        echo "please enter the phone number"; die;
    }else {
        $phoneno = $_POST['phoneno'];
        
    }

    

    
    $sql = "INSERT INTO usersignup VALUES ('','$firstname','$lastname','$email','$password','$address','$phoneno')";
    var_dump($phoneno);
    $result = mysqli_query($conn, $sql);

    if($result)
    {
         echo"Data succesfully store";
         header("location:index.php");
    
    }
    else
    {
        echo"error";
    }
}
?>
