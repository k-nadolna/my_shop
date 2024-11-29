<!-- remove product from cart -->
        <?php
          include "php/config.php";
         
          $id = $_GET['Id'];

          mysqli_query($con, "DELETE FROM cart WHERE Id = '$id'");

       
          header("Location: cart.php");

        ?>

   