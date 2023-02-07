<?php
   include_once 'header.php';
   
?>
<div class="wrapper">
        <h2>Signup-form</h2>
          <form action="usersignupaction.php" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group col-md-6">
                <label>First Name</label>
                <input type="text"  name="firstname" class="form-control" value=""/>
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group col-md-6">
                <label>Last Name</label>
                <input type="text"  name="lastname" class="form-control" value=""/>
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group col-md-6">
                <label>Email</label>
                <input type="email" name="email" class="form-control" 
                  value=""/>
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group col-md-6">
                <label>Password</label>
                <input type="password"  name="password" class="form-control"/>
                
            </div> 

            
            <div class="form-group col-md-6">
                <label>Address</label>
                <input type="text" name="address" class="form-control" 
                  value=""/>
            </div>
            <div class="form-group col-md-6">
                <label>Phone Number</label>
                <input type="number" name="phoneno" class="form-control"/>
                
            </div>


            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>  
    <?php 
    include('footer.php');
    ?>
