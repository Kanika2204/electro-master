<?php
include 'header.php';
?> 
<div class="container">
      <h2>Login</h2>
    <form action="loginadmin.php" method="post">
        <div class="row">
                    <div class="form-group col-md-6">
                            <label>Name</label>
                            <input type="text"  name="username" class="form-control" value="">
                            <span class="invalid-feedback"></span>
                    </div>
        </div>
        <div class="row">
                    <div class="form-group col-md-6">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" 
                            value="">
                            <span class="invalid-feedback"></span>
                    </div>
        </div>
        <div class="row">
                    <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
        </div>
        <p>Don't have an account? <a href="reg.php">Signup here</a>.</p>
  </form>
</div>

</body>
</html>