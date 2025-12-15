<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add produckt</title>
  <link rel='stylesheet' href='styles/style.css'>
</head>
<body>
  <?php
    include('nav.php');
  ?>

  <div class='hero'>
    <header>Add product to base</header>
  </div>
  <div class='container'>
    <div class='box'>

    <?php
      include('php/config.php');

      // to add product to products table

      if (isset($_POST['submit'])){
        // to set unique product name
        $product_name = $_POST['product_name'];

        $query = mysqli_query($con, "SELECT ProductName FROM products WHERE ProductName = '$product_name'");

        // when the product name is in the database  
        if (mysqli_num_rows($query) != 0) {
          echo  "<div class='message'>
          <p><b>$product_name</b><br> is already in the database.</p>
          <p>Try add another...</p><br>
          </div>";
           echo "<a href='add_product.php' class='btn'>Add product</a>";
        }else{

        // when product name is unique check is price is number
          if (is_numeric($_POST['product_price'])){
            $product_price = round($_POST['product_price']);
          };
        
          $product_image = $_POST['product_image'];
  
          // add product to base 
          mysqli_query($con, "INSERT INTO products(ProductName,ProductPrice,ProductImage) VALUES ('$product_name','$product_price','$product_image')");

          //message after added to base 
          echo "<div class='success-message'>
                <p><b>$product_name</b> added to base</p>
                </div><br>";
          echo "<a href='add_product.php' class='btn'>Add next product</a>";
          echo "<a href='index.php' class='btn'>Go to shop</a>";
        }
      }else{
    ?>
      <form action="#" method='POST'>
        <div class='field'>
          <label for='name'>Product Name</label>
          <input type="text" name='product_name' required>
        </div>
        <div class='field'>
          <label for='price'>Product Price</label>
          <input type='number' step='0.01' min='1' max='1000' name='product_price'required>
        </div>
        <div class='field'>
          <label for='image'>Product Image</label>
          <input type="file" placeholder='my text'name='product_image' required>
        </div>
          
        <input type="submit" name="submit" class='btn' value='Add product to base'>
      </form>
      <?php } ?>
    </div>
  </div>
  
</body>
</html>