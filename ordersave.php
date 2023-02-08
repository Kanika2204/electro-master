<?php
  session_start();
  include 'dbcon.php';
  $user_id = $_SESSION['id'];
  
?>
        <?php

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                //Validate the name:
                if (!empty($_POST['firstname'])) {
                    $fname = $_POST['firstname'];
                } else {
                    echo "You forgot to enter your first name.";
                }

                if (!empty($_POST['lastname'])) {
                    $lname = $_POST['lastname'];
                } else {
                    echo "You forgot to enter your  last name.";
                }

                
                if (!empty($_POST['email'])) {
                    $email = $_POST['email'];
                } else {
                    echo "You forgot to enter your e-mail.";
                }

            
                if (!empty($_POST['country'])) {
                    $country = $_POST['country'];
                } else {
                    echo "You forgot to enter your country.";
                }

                
                if (!empty($_POST['phone'])) {
                    $phone = $_POST['phone'];
                } else {
                    echo "Please enter phone number.";
                }

                if (!empty($_POST['city'])) {
                    $city = $_POST['city'];
                } else {
                    echo "Please enter city.";
                }

                if (!empty($_POST['state'])) {
                    $state = $_POST['state'];
                } else {
                    echo "Please enter state.";
                }

                if (!empty($_POST['pin'])) {
                    $pin = $_POST['pin'];
                } else {
                    echo "Please enter pin.";
                }

                if (!empty($_POST['address'])) {
                    $address = $_POST['address'];
                } else {
                    echo "Please enter address.";
                }

                $fname = ($_POST['firstname']);
                $lname = ($_POST['lastname']);
                $email = ($_POST['email']);
                $phone = ($_POST['phone']);
                $address = ($_POST['address']);
                $sql = "SELECT * FROM usersignup where id=$user_id";
                $result = $conn->query($sql); 
                $row = $result->fetch_assoc();
                
            if(($row['email'] == $email) &&
                ($row['phoneno'] == $phone)) {
                   echo "successfull order completion";           
                }
            else {
                echo "<script language='javascript'>";
                echo "alert('WRONG INFORMATION')";
                echo "</script>";
                die();
            }
            }

            $sql = "INSERT INTO checkout VALUES('','$user_id','$fname','$lname','$email','$country','$phone','$city','$state','$pin','$address')"; 
            var_dump($sql);
            $result = mysqli_query($conn,$sql);


        ?>

       
