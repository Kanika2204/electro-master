<?php
      include 'header.php';
?> 

<div class="wrapper">
        <h2>User-Login</h2>
        <p style="color:red ; font-weight:700;"></p>
          <form action="userloginaction.php" method="POST">
            <div class="form-group col-md-6">
                <label>Email</label>
                <input type="email"  name="email" class="form-control" value="">
                <span class="invalid-feedback"></span>
            </div>    
            <div class="form-group col-md-6">
                <label>Password</label>
                <input type="password" name="password" class="form-control" 
                  value="">
                <span class="invalid-feedback"></span>
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
            <p>Don't have an account? <a href="reg.php">Signup here</a>.</p>
        </form>
    </div>  
</body>
</html>