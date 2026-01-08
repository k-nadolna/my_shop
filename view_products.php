<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View products</title>
  <link rel="icon" href="images/cart.png" type="image/png">
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>
  <?php
    include('nav.php');
  ?>
  <div class='hero'>
    <header> Products Base</header>
  </div>


  <div class='container'>
    <div class='box'>
      <table>
        <thead>
          <th class='base_name_id'>Id</th>
          <th>Product Image</th>
          <th class='base_name_column'>Product Name</th>
          <th class='base_price_column'>Product Price</th>
          <th>Action</th>
        </thead>
        <tbody>

        <?php
          include('php/config.php');

          // table with all products
          $products = mysqli_query($con, "SELECT * FROM products");

          //creating a table with products on the website
          while ($product = mysqli_fetch_assoc($products)){
            $product_name = $product['ProductName'];
            $product_price = $product['ProductPrice'];
            $product_image = $product['ProductImage'];
            $id = $product['Id'];

            echo "<tr>
            <td class='base_name_id'>$id</td>
            <td><img class='thumbnail' src='images/products/$product_image'>
            <span class='base_mobile_info'>$product_name ($id)</span></td>
            <td class='base_name_column'>$product_name</td>
            <td class='base_price_column'>$product_price</td>
            <td>
            <a href='edit.php?Id=$id'><img class='icon 'src='images/edit.png'></a>
            <a href='delete_product.php?Id=$id'><img class='icon' src='images/remove.png'></a>
            </td>
          </tr>";
          }


        ?>

          
        </tbody>
      </table>
    </div>
  </div>

  <script src="app.js"></script>
</body>
</html>