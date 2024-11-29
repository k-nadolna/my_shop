<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View products</title>
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
          <th>Id</th>
          <th>Product Image</th>
          <th>Product Name</th>
          <th>Product Price</th>
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
            <td>$id</td>
            <td><img class='thumbnail' src='images/products/$product_image'></td>
            <td>$product_name</td>
            <td>$product_price</td>
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
</body>
</html>