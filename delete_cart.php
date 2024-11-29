<!-- delete all products from cart -->

<?php
   include('php/config.php');
   
  mysqli_query($con, "DELETE FROM cart");

  header("Location: cart.php");

?>