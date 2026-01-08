<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Cart</title>
  <link rel="icon" href="images/cart.png" type="image/png">
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>
  <?php
    include('nav.php');
  ?>
  <div class='hero'>
    <header> My Cart</header>
  </div>

  <div class='container'>
    <div class='box'>
        <?php
          include('php/config.php');

          // update product quantity
          if (isset($_POST['submit'])){
            $update_quantity = $_POST['update_quantity'];
            $id = $_POST['id'];

            $query = mysqli_query($con, "SELECT ProductPrice FROM cart WHERE Id ='$id'");

            // update total value
            while($row = mysqli_fetch_assoc($query)){
                $product_price = $row['ProductPrice'];
                $total_value = $product_price * $update_quantity;
            }

            // upadate quantity and total value in cart table
            mysqli_query($con, "UPDATE cart SET Quantity = '$update_quantity', TotalValue = '$total_value' WHERE Id = $id");
          }
          
          // create cart table on website
          $query = mysqli_query($con, "SELECT * FROM cart");

          if (mysqli_num_rows($query) != 0){
        echo "  <table>
                  <thead>
                  
                  </thead>
                <tbody>";


          while($row = mysqli_fetch_assoc($query)){
            $id = $row['Id'];
            $product_image = $row['ProductImage'];
            $product_name = $row['ProductName'];
            $product_price = $row['ProductPrice'];
            $quantity = $row['Quantity'];
            $total_value = $row['TotalValue'];

            echo "
                <tr>
                 <form action='cart.php' method='POST'>
                  <td class='cart_image_column'><img class='thumbnail' src='images/products/$product_image'></td>
                  <td class='cart_info_column'><span class='cart_name'>$product_name</span>
                  <div class='td_quantity'>
                    <input type=hidden name='id' value ='$id'>
                    <input type='number' min='1' max='10' value='$quantity' class='cart_quantity' name='update_quantity'>
                    <input type='submit' name='submit' class='cart_btn_update' value='Update'>
                    <a href='remove_from_cart.php?Id=$id' class='cart_remove'>
                    <img class='icon cart_remove_icon' src='images/remove.png'>
                    </a>
                  </form>
                  </div>
                <p class='cart_total'>$total_value</p>
                   
                  </td>
              </tr>";

};
      // total sum
        $query_sum = mysqli_query($con, "SELECT TotalValue FROM cart");
        
        $total_sum = 0;
        while($row = mysqli_fetch_assoc($query_sum)){
          $sum = $row['TotalValue'];

          $total_sum += $sum;
        }

    
        echo "</tbody>
              </table>
                 </div>

            <div class='box box_cart'>
              <p>Grand total: $total_sum </p>
              <a href='index.php' class='btn'>Continue Shopping</a>
              <a href='delete_cart.php' class='btn_cancel'>Delete all</a>
            </div>";

          }else{
?>
          

      <p> Sorry, your cart is empty</p>
      <br>  
      <a href='index.php' class='btn'>Go Shopping!</a>
      <?php  } ?>    
    </div>   
  </div>

  <script src="app.js"></script>
</body>
</html>