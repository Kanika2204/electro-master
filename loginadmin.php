<?php
    include( 'dbcon.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
        $username = ($_POST["username"]);
        $password = ($_POST["password"]);
        $sql=" SELECT * FROM login ";
        $result = $conn->query($sql); 
        $row = $result->fetch_assoc();
        
        
             
            if(($row['username'] == $username) &&
                ($row['password'] == $password)) {
                    header("location: product-form.php");            
                }
            else {
                echo "<script language='javascript'>";
                echo "alert('WRONG INFORMATION')";
                echo "</script>";
                die();
            }
        
    }
?>

