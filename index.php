<?php
   session_start();
   include ('header.php');
   include ('dbcon.php');
   $sql= "SELECT * FROM products";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
 
?>

   <div class="container-fluid">
      <div class="row justify-content-center">
            <?php foreach ($result as $key=>$val){ ?> 
              <div class="col-3 border m-2 py-4" style="height:10cm;">
                    <img width="50%" height="60%" src="uploads/<?php echo $val['image'];?>" />
                    <ul class="list-group " style="font-size:initial">
                        <li class="list-group-item border-0 "><b><?php echo $val['name']?></b></li>
                        <li class="list-group-item border-0">$<?php echo $val['price']?></li>
                        <li class="list-group-item border-0">Description:<?php echo $val['description']?></li>
                    </ul>
                    <button class="btn btn-success addtocart"  onclick="addtocart(<?php echo $val['id']; ?>)" >Add to cart </button>
			              
              </div> 
              
            <?php 
             }
             
            ?>  
              
      </div> 
   </div>

  <script type="text/javascript">
    // Send product details in the server
    function addtocart(id){
        var id = id;
        console.log(id);
        $.ajax({
           type: 'post',
           url: 'http://localhost/electro-master/action.php',
          
           data:  {
            
            id: id
            },
           success:function(result) {
             alert(result);
           }

      });
    }
  </script>
<?php
    include ('footer.php');
?>