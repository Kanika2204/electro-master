<?php
session_start();
include 'header.php';
include 'dbcon.php';
    $user_id = $_SESSION['id'];
    $sql= "SELECT * FROM cart where user_id=$user_id";
    $result = $conn->query($sql);
    
?>
<div class="container">
<table class="table table-striped ">
<tr>
    <th colspan="6">Products in your Cart</th>
</tr>
<tr>
    <td scope="col">Product Name</td>
    <td scope="col">Quantity</td>
    <td scope="col">Price</td>
    <td scope="col">Total Price</td>
    <td scope="col">Update</td>
    <td scope="col">Delete</td>
</tr>

<?php

foreach($result as $key=>$value){
?>
<tr>
   <td><?php echo $value['name'];?></td>
   <td><input type="number" id='qty_<?php echo $value['prod_id'];?>' value="<?php echo $value['quantity'];?>" min="1"/></td>
   <td><?php echo $value['price'];?></td>
   <td><?php echo $value['total_price'];?></td>
   <td><input type="button" class="btn btn-success" onclick="qtupdate(<?php echo $value['prod_id'];?>)" value="Update"/></td>
   <td><input type="button" class="btn btn-danger" onclick="qtdelete(<?php echo $value['prod_id'];?>)" value="Delete"/></td>
</tr>
<?php
}   


?>
<tr>
    <td>Total Quantities</td>
    <td colspan="1"><input type="text" value="<?php 
              $sql= "SELECT SUM(quantity) FROM cart where user_id=$user_id";
              $result = $conn->query($sql);
              $row = $result->fetch_assoc();    
              echo implode($row);

              ?>
    "/></td>
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


</table>
</div>

<script type="text/javascript">    
    // Send product details in the server
    function qtupdate(id){
        var qt =$(`#qty_${id}`).val();
        if(qt<=0){
            alert("Quantity should be greater than 0");
            window.location.reload();
        }else{
            var prodid=id;
            
            $.ajax({
               type: 'post',
               url: 'http://localhost/electro-master/action.php',
              
               data:  {
                
                qt: qt,
                id:prodid
    
                },
               success:function(result) {
                   alert("Product is updated");
                window.location.reload();
               }
    
          });

        }
    }
    function qtdelete(id){
        var prodid=id;
         console.log(prodid);
         $.ajax({
           type: 'post',
           url: 'http://localhost/electro-master/delete.php',
          
            data:  {
                action: 'delete',
                id:prodid
            },
           success:function(result) {
                alert("Product is deleted");
                window.location.reload();
           }

      });
  }

    </script>
  
  <?php
  
    include ('footer.php');
?>