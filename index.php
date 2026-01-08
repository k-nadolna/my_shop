<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My shop</title>
  <link rel="icon" href="images/cart.png" type="image/png">
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>
  <?php
    include "nav.php";
    include "php/config.php";
  ?>
  
  <div class='hero'>
    <header> Welcome in our shop!</header>
    
  </div>


  <?php
  // to add product to cart
        if (isset($_POST['submit'])){
          $id = $_GET['Id'];
         
          $query = mysqli_query($con, "SELECT * FROM products WHERE Id = '$id'") or die("error occured");

          $row = mysqli_fetch_assoc($query);
  
        // creating variables to pass data to cart table
          $product_image = $row['ProductImage'];
          $product_name = $row['ProductName'];
          $product_price = $row['ProductPrice'];
          $id = $row['Id'];

        // checking if the product is in cart
          $in_cart = mysqli_query($con, "SELECT * FROM cart WHERE Id = '$id'");

          // situation when the product is not in cart
          if (mysqli_num_rows($in_cart) === 0){
            $quantity = 1;
            $total_value = $product_price;
         
              mysqli_query($con, "INSERT INTO cart(Id,ProductImage,ProductName,ProductPrice,Quantity, TotalValue) VALUES ('$id','$product_image','$product_name','$product_price','$quantity', '$total_value')");
            }else
            // situation when the product is in cart
             {
              $row = mysqli_fetch_assoc($in_cart);
              $quantity = $row['Quantity']+1;
              $total_value = $product_price * $quantity;

              mysqli_query($con, "UPDATE cart SET Quantity = '$quantity', TotalValue = '$total_value'  WHERE Id = $id");
            }


          }


         
   
    ?>

    <div class='container'>

    <?php

    // create a container with products in shop

     $products = mysqli_query($con, "SELECT * FROM products");

     while ($product = mysqli_fetch_assoc($products)){
       $product_image = $product['ProductImage'];
       $product_name = $product['ProductName'];
       $product_price = $product['ProductPrice'];
       $id = $product['Id'];
  

       echo "<div class='box'>
                <img src='images/products/$product_image'>
                <p class='product_name'>$product_name</p>
                <p>$ $product_price</p>
                <form action='index.php?Id=$id' method='post'>
                <input type='submit' class='btn'  name='submit' value='Add to cart'>
                </form>
            </div>";

     } ?>    
   </div>
 

<script src="app.js"></script>
</body>
</html>