<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete product</title>
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>
  <?php
      include "nav.php";
  ?>

  <br>
  <div class='container'>
    <div class='box'>
        <?php
          include "php/config.php";
         
        // to get Id
          if (!isset($_SESSION['id'])){
          $_SESSION['id'] = $_GET['Id'];
          };

        // delete product from products table
          if (isset($_POST['submit'])){
            $id =  $_SESSION['id'];
            $query = mysqli_query($con, "DELETE FROM products WHERE Id = '$id'");
  
        // message after deleted
            echo  "<div class='message'>
            <p>Product is deleted.</p>
            </div><br>";
             echo "<a href='view_products.php' class='btn'>Come back to View Products</a>";

             session_destroy();
          } else {

            // to add "product name in question "Are you sure..."
            $id = $_SESSION['id'];

            $query = mysqli_query($con, "SELECT ProductName FROM products WHERE Id = '$id'");

            $row = mysqli_fetch_assoc($query);
            $product_name = $row['ProductName'];

            ?>

            <div class='message'>
            <p>Are you sure you want to delete 
              <br><br><b><?= $product_name ?>?</b></p>
            </div><br>
            <form action="#" method="POST">
              <input type="submit" name="submit" class='btn' value='Delete product'>
              <a href='view_products.php' class='btn_cancel'>Cancel</a>
            </form>
        <?php } ?>

    </div>
  </div>
</body>
</html>