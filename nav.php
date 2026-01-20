<?php
include('php/config.php');

$count = mysqli_query($con, "SELECT SUM(Quantity) AS total FROM cart");
$row = mysqli_fetch_assoc($count);
$cartCount = $row['total'] ?? 0;

echo  
"<nav>
    <div class='logo'>
      <p><a href='index.php'>My Shop</a></p>
    </div>
    <div class='menu'>
      <a href='add_product.php'>Add product</a>
      <a href='view_products.php'>View produckts</a>
      <a href='index.php'>Shop</a>
      <a href='cart.php'>
      <span class='cart-count'>Cart ($cartCount)</span>
      </a>
    </div>
    <div class='mobile_button'>
      <img src='images/menu.png'>
    </div> 
    <div class='mobile_menu'>
      <a href='add_product.php'>Add product</a>
      <a href='view_products.php'>View produckts</a>
      <a href='index.php'>Shop</a>
      <a href='cart.php'>
     <span class='cart-count'>Cart ($cartCount)</span>
      </a>
    </div> 
  </nav>";
  ?>
