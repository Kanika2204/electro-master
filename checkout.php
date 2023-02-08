<?php
include 'header.php';
?>

 <div class="wrapper">
        
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2>Checkout-Page</h2>
                    
                            <form action="ordersave.php" method="POST" enctype="multipart/form-data">
                                
                                <div class="row">
                                            <div class="form-group col-md-4 mt-5">
                                                <label>First Name</label>
                                                <input type="text"  name="firstname" class="form-control" value="" required />
                                                <span class="invalid-feedback"></span>
                                            </div>
                                            <div class="form-group col-md-4 mt-5">
                                                <label>Last Name</label>
                                                <input type="text"  name="lastname" class="form-control"  value="" required />
                                                <span class="invalid-feedback"></span>
                                            </div>   
                                </div>

                                <div class="row">
                                            <div class="form-group col-md-4">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" 
                                                     value="" required />                                           
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Country</label>
                                                <input type="text"  name="country" class="form-control"  value="" required />
                                                <span class="invalid-feedback"></span>
                                            </div>   
                                </div>
                                
                                <div class="row">
                                
                                            <div class="form-group col-md-4">
                                                <label>Phone Number</label>
                                                <input type="number" name="phone" class="form-control" required />                                                
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>City</label>
                                                <input type="text" name="city" class="form-control" required />              
                                            </div>
                                </div>

                                <div class="row">
                                
                                            <div class="form-group col-md-4">
                                                <label>State</label>
                                                <input type="text" name="state" class="form-control" required/>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Pin-Code</label>
                                                <input type="text" name="pin" class="form-control" required/>             
                                            </div>
                                </div>

                                <div class="row">
                                            <div class="form-group col-md-8">
                                                <label>Address</label>
                                                <input type="text" name="address" class="form-control" required/>               
                                            </div>
                                </div>
                                <div class="row">
                                   <div class="form-group col-md-4">
                                      <input type="submit" name="submit" class="btn btn-primary" value="Place Order" />
                                  </div>
                                  <div class="form-group col-md-4">
                                      <a href="login.php">Click here to login</a>
                                  </div>
                                </div>
                                
                        </form>
                </div>
                <div class="col-4">
                       <!-- for order section -->
                       
                     <div class="container mt-5">
                          <table class="table table-striped ">
                                <tr>
                                    <th colspan="6">Products in your Cart</th>
                                </tr>
                                <tr>
                                    <td scope="col"><strong>Product Name</strong></td>
                                    <td scope="col"><strong>Quantity</strong></td>
                                    <td scope="col"><strong>Price</strong></td>
                                    <td scope="col"><strong>Total Price</strong></td>
                                </tr>

                                <?php
                                   $user_id = $_SESSION['id'];
                                   $sql="SELECT * FROM CART where user_id=$user_id";
                                   $result = $conn->query($sql);

                                foreach($result as $key=>$value){
                                ?>
                                <tr>
                                <td><?php echo $value['name'];?></td>
                                <td><?php echo $value['quantity'];?></td>
                                <td><?php echo $value['price'];?></td>
                                <td><?php echo $value['total_price'];?></td>
                                </tr>
                                <?php
                                }   
                                ?>
                                    <tr>
                                        <td>Total Quantities</td>
                                        <td colspan="1"><?php 
                                                $sql= "SELECT SUM(quantity) FROM cart where user_id=$user_id";
                                                $result = $conn->query($sql);
                                                $row = $result->fetch_assoc();    
                                                echo implode($row);

                                                ?>
                                        </td>
                                        <td colspan="1"><strong>Grand Total :</strong>
                                            <?php
                                            $sql= "SELECT SUM(total_price) FROM cart where user_id=$user_id";
                                            $result = $conn->query($sql);
                                            $row = $result->fetch_assoc();
                                            $total_sum=$row;
                                            ?>
                                            <td><strong><?php echo implode($total_sum);?></strong></td>
                                        </td>
                                        
                                    </tr>
                                        <a href="checkout.php">Checkout Page</a >
                          </table>
                     </div>
              </div>
          </div>
       </div>
    </div>  

    

<?php
include 'footer.php';
?>