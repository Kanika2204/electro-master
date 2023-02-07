<?php
    session_start();
    include( 'dbcon.php');
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = ($_POST["email"]);
        $password = ($_POST["password"]);
        var_dump($email, $password);
        $sql = "SELECT * FROM usersignup WHERE email = '$email' and password = '$password'";
        $result = mysqli_query($conn,$sql); 
        $row =mysqli_fetch_array($result, MYSQLI_ASSOC);
             
            if($row) {
                    $_SESSION['id'] = $row['id'];
                    header("location: index.php");            
                }
            else {
                echo "<script language='javascript'>";
                echo "alert('WRONG INFORMATION,please enter correct credentials')";

                echo "</script>";
                header("location: userloginform.php");            
                
            }
        
    }
?>

