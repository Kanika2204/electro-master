<?php
include ('header.php');
include( 'dbcon.php');

$id= $_GET["id"];
$sql="SELECT * FROM products where id=".$id;
$result = $conn->query($sql);
$row=$result->fetch_assoc();


?>

<div class="wrapper">
        <h2>Update-Form</h2>
          <form action="updated_product.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group col-md-6">
                <label>Name</label>
                <input type="text"  name="name" class="form-control" value="<?php echo $row['name'];?>">
                <span class="invalid-feedback"></span>
            </div> 

            <div class="form-group col-md-6">
                <label>Quantity</label>
                <input type="number" name="quantity" class="form-control" 
                  value="<?php echo $row["quantity"]; ?>">
                <span class="invalid-feedback"></span>
            </div>

            <div class="form-group col-md-6">
                <label>Price</label>
                <input type="text" name="price" class="form-control" 
                  value="<?php echo $row["price"]; ?>">
                <span class="invalid-feedback"></span>
            </div>

            
          
            <div class="form-group col-md-6">
                <label>Published</label>
                <select class="form-control" name="published">
            <option selected><?php echo $row["published"] ? "true" : "false" ; ?></option>
            <option>True</option>
            <option>False</option>

          </select>
                <span class="invalid-feedback"></span>
            </div>

            <div class="form-group col-md-6">
                <label>Image</label>
                <input type="file" name="image" class="form-control" value="<?php echo $row["image"]; ?>" />
                <img src="uploads/<?php echo $row["image"];?>" style="height:70px;width:70px;border:1px solid black;margin-top:10px;"/>

            </div>
            
            <div class="form-group col-md-6">
                <label>Description</label>
                <textarea class="form-control" name="description" rows="1" ><?php echo $row["description"] ? $row["description"] : '';?></textarea>
            </div>


            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Update">
            </div>
        </form>
    </div>  
 

