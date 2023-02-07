<?php
 session_start();
 include ('header.php');

 require_once("cart.php");
?>
  <h1>Show cart</h1>
  <?php
   $cart = new cart();
   $products = $cart->getCart();
  ?>
  <table cellpadding="5" cellspacing="0" border="0">
   <tr>
    <td style="width: 200px"><b>Product</b></td>
    <td style="width: 200px"><b>Count</b></td>
    <td style="width: 200px"><b>Total</b></td>
   </tr>
   <?php
    foreach($products as $product){
   ?>
    <tr>
     <td><?php print HtmlSpecialChars($product->product); ?></td>
     <td><?php print $product->count; ?></td>
     <td>$<?php print $product->total; ?></td>
    </tr>
   <?php 
    }
   ?>
  </table>
  <br /><a href="index.php" title="go back to products">Go back to products</a>
 </body>
</html>

