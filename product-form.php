<?php
include ('header.php');
include( 'dbcon.php');
?> 

<div class="wrapper">
        <h2>Product</h2>
          <form action="pro-insert.php" method="POST" enctype="multipart/form-data">
          
            <div class="form-group col-md-6">
                <label>Name</label>
                <input type="text"  name="name" class="form-control" value="">
                <span class="invalid-feedback"></span>
            </div> 

            <div class="form-group col-md-6">
                <label>Quantity</label>
                <input type="number" name="quantity" class="form-control" 
                  value="">
                <span class="invalid-feedback"></span>
            </div>

            <div class="form-group col-md-6">
                <label>Price</label>
                <input type="text" name="price" class="form-control" 
                  value="">
                <span class="invalid-feedback"></span>
            </div>

            
          
            <div class="form-group col-md-6">
                <label>Published</label>
                <select class="form-control" name="published">
            <option>True</option>
            <option>False</option>

          </select>
                <span class="invalid-feedback"></span>
            </div>

            <div class="form-group col-md-6">
                <label>Image</label>
                <input type="file" name="image" class="form-control" />
            </div>
            
            <div class="form-group col-md-6">
                <label>Description</label>
                <textarea class="form-control" name="description" rows="1"></textarea>
            </div>


            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>  
 

