
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
    <header>Edit product</header>
  </div>
  <div class='container'>
    <div class='box'>

    <?php
      include('php/config.php');

      //product to change - search by id
      $id = $_GET['Id'];

      // change product
      if (isset($_POST['submit'])){

        // get data from the form
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];

        // query
        $query_id = mysqli_query($con, "SELECT Id FROM products WHERE Id = '$id'");

        $query_all = mysqli_query($con, "SELECT Id,ProductName FROM products WHERE Id= '$id' AND ProductName = '$product_name'");

        $query_name_exists = mysqli_query($con, "SELECT ProductName FROM products WHERE ProductName = '$product_name'");

        // when we have only one "row" with this Id
        if (mysqli_num_rows($query_id) === 1) {

          // when id and product name is the same in form and products table and given name is not exists yet in products table
          if (mysqli_num_rows($query_all) === 1 ||    mysqli_num_rows($query_name_exists) === 0){
            mysqli_query($con, "UPDATE products SET ProductName = '$product_name', ProductPrice = '$product_price', ProductImage = '$product_image' WHERE Id = '$id'") or die ("Error occured");
        
            echo "<div class='success-message'>
            <p><b>$product_name</b> has been changed</p><br>
            </div>";
            echo "<a href='view_products.php' class='btn'>Come back to View Products</a>";
            echo "<a href='shop.php' class='btn'>Go to shop</a>";
          } else
          //situation when name is in the products table
           {
            echo  "<div class='message'>
            <p><b>$product_name</b><br><br> is already in the database.</p>
            <p>Enter another name...</p><br>
            </div>";
             echo "<a href='edit.php?Id=$id' class='btn'>Edit product</a>";
          }
        }
      }else{

      //  add value for input - form products table
      $query = mysqli_query($con, "SELECT * FROM products WHERE Id= '$id'") or die ("Error occured");

      while ($product = mysqli_fetch_assoc($query)){
        $product_name = $product['ProductName'];
        $product_price = $product['ProductPrice'];
        $product_image = $product['ProductImage'];
      }
      
    ?>
      <form action="#" method='POST'>
        <div class='field'>
          <label for='name'>Product Name</label>
          <input type="text" name='product_name' value='<?= $product_name ?>' required>
        </div>
        <div class='field'>
          <label for='price'>Product Price</label>
          <input type='number' step='0.01' min='1' max='1000' name='product_price' value='<?= $product_price ?>'required>
        </div>
        <div class='field'>
          <label for='image'>Product Image</label>
          <input type="file" placeholder='my text'name='product_image' required>
        </div>
          
        <input type="submit" name="submit" class='btn' value='Change product'>
        <a href='view_products.php' class='btn_cancel'>Cancel</a>
      </form>
    <?php } ?>
    </div>
  </div>
  
</body>
</html>