<?php
     include ('header.php');
     include ('dbcon.php');
     $sql="SELECT * FROM products ";
     $result = $conn->query($sql);
     $row = $result->fetch_assoc();
     
     
?>

<section>
    <table border= 4>
          <thead>PRODUCT-LIST</thead>
            <tr>
               <td>Name</td>
               <td>Quantity</td>
               <td>Price</td>
               <td>Published</td>
               <td>Image</td>
               <td>Description</td>
               <td>Edit/Update products</td>

            </tr>
               <?php
                   foreach( $result as $key=>$val)
                    {
                ?>
              <tr> 
                  <td><?php echo $val['name'];?></td>
                  <td><?php echo $val['quantity'];?></td>
                  <td><?php echo $val['price'];?></td>
                  <td><?php echo $val['published'];?></td>
                  <td><?php echo $val['image'];?></td>
                  <td><?php echo $val['description'];?></td>
                  <td><?php echo $val['product_code'];?></td>
                  <td><a href=updateform.php?id=<?php echo $val['id']?>>Update</td>     
              </tr>
              <?php
              
                    }
                    
                ?>
    </table>
</section>
