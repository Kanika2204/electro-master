<?php
	session_start();
	  require 'dbcon.php';
    if(isset($_POST['id'])) {
        $prod_id = $_POST['id'];
        $user_id = $_SESSION['id'];
        $quantity = isset($_POST['qt']) ? (int)$_POST['qt'] : null;
        var_dump($quantity);
        
        $sql= "SELECT * FROM cart where user_id=$user_id and prod_id=$prod_id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
       
        if($row){
                if($quantity == null){
                  $quantity = (int)$row['quantity'] + 1;
                }
                $totalprice =(int)$row['price'] * $quantity;
                $update= "UPDATE cart SET total_price='$totalprice', quantity='$quantity' where user_id=$user_id and prod_id=$prod_id";
                $result = $conn->query($update);
                if($result){
                 return true;
                }
                else{
                  return false;
                }
          
        }

        else {
              $sql= "SELECT * FROM products where id=".$prod_id;
              $result = $conn->query($sql);
              $row = $result->fetch_assoc();
              
              if($row){
                $name=$row['name'];
                $quantity=1;
                $price=$row['price'];

                 $insert = "INSERT  INTO cart VALUES('','$user_id','$prod_id','$name','$quantity','$price','$price')";
                 $result = $conn->query($insert);
                 if($result){
                  return true;
                 }
                 else{
                  return false;
                 }
                }
        }
        
      }
      else{
        return "something went wrong";
      }


	// Add products into the cart table
// 	if (isset($_POST['pid'])) {
// 	  $pid = $_POST['pid'];
// 	  $pname = $_POST['pname'];
// 	  $pprice = $_POST['pprice'];
// 	  $pimage = $_POST['pimage'];
// 	  $pcode = $_POST['pcode'];
// 	  $pqty = $_POST['pqty'];
// 	  $total_price = $pprice * $pqty;

// 	  $sql = $conn->prepare('SELECT product_code FROM products WHERE product_code=?');
// 	  $sql->bind_param('s',$pcode);
// 	  $sql->execute();
// 	  $res = $sql->get_result();
//       $r = $res->fetch_assoc();
// 	  $code = $r['product_code'] ?? '';

// 	  if (!$code) {
// 	    $query = $conn->prepare('INSERT INTO cart (product_name,product_price,product_image,qty,total_price,product_code) VALUES (?,?,?,?,?,?)');
// 	    $query->bind_param('ssssss',$pname,$pprice,$pimage,$pqty,$total_price,$pcode);
// 	    $query->execute();

// 	    echo '<div class="alert alert-success alert-dismissible mt-2">
// 						  <button type="button" class="close" data-dismiss="alert">&times;</button>
// 						  <strong>Item added to your cart!</strong>
// 						</div>';
// 	  } else {
// 	    echo '<div class="alert alert-danger alert-dismissible mt-2">
// 						  <button type="button" class="close" data-dismiss="alert">&times;</button>
// 						  <strong>Item already added to your cart!</strong>
// 						</div>';
// 	  }
// 	}

//     // Get no.of items available in the cart table
// 	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
//         $sql = $conn->prepare('SELECT * FROM cart');
//         $sql->execute();
//         $sql->store_result();
//         $rows = $sql->num_rows;
  
//         echo $rows;
//       }

//       // Remove single items from cart
// 	if (isset($_GET['remove'])) {
//         $id = $_GET['remove'];
  
//         $sql = $conn->prepare('DELETE FROM cart WHERE id=?');
//         $sql->bind_param('i',$id);
//         $sql->execute();
  
//         $_SESSION['showAlert'] = 'block';
//         $_SESSION['message'] = 'Item removed from the cart!';
//         header('location:cart.php');
//       }
// // Remove all items at once from cart
// if (isset($_GET['clear'])) {
//     $sql = $conn->prepare('DELETE FROM cart');
//     $sql->execute();
//     $_SESSION['showAlert'] = 'block';
//     $_SESSION['message'] = 'All Item removed from the cart!';
//     header('location:cart.php');
//   }

//   // Set total price of the product in the cart table
//   if (isset($_POST['qty'])) {
//     $qty = $_POST['qty'];
//     $pid = $_POST['pid'];
//     $pprice = $_POST['pprice'];

//     $tprice = $qty * $pprice;

//     $sql = $conn->prepare('UPDATE cart SET qty=?, total_price=? WHERE id=?');
//     $sql->bind_param('isi',$qty,$tprice,$pid);
//     $sql->execute();
//   }
//   // Checkout and save customer info in the orders table
// 	if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
//         $name = $_POST['name'];
//         $email = $_POST['email'];
//         $phone = $_POST['phone'];
//         $products = $_POST['products'];
//         $grand_total = $_POST['grand_total'];
//         $address = $_POST['address'];
//         $pmode = $_POST['pmode'];
  
//         $data = '';
  
//         $sql = $conn->prepare('INSERT INTO orders (name,email,phone,address,pmode,products,amount_paid)VALUES(?,?,?,?,?,?,?)');
//         $sql->bind_param('sssssss',$name,$email,$phone,$address,$pmode,$products,$grand_total);
//         $sql->execute();
//         $stmt2 = $conn->prepare('DELETE FROM cart');
//         $stmt2->execute();
//         $data .= '<div class="text-center">
//                                   <h1 class="display-4 mt-2 text-danger">Thank You!</h1>
//                                   <h2 class="text-success">Your Order Placed Successfully!</h2>
//                                   <h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $products . '</h4>
//                                   <h4>Your Name : ' . $name . '</h4>
//                                   <h4>Your E-mail : ' . $email . '</h4>
//                                   <h4>Your Phone : ' . $phone . '</h4>
//                                   <h4>Total Amount Paid : ' . number_format($grand_total,2) . '</h4>
//                                   <h4>Payment Mode : ' . $pmode . '</h4>
//                             </div>';
//         echo $data;
//     }
    ?>  