<?php
    include 'header.php';
    include 'conn.php'; 
    $msg='';
    if(isset($_POST['submit']))
    {

      $shoesname = $_POST['shoesname'];
      $price = $_POST['price'];
      $size = $_POST['size'];
      $stock = $_POST['inventory'];
      $value = $_POST['range'];
      $proo_id = $_POST['pro_id'];

      if($stock==0)
      {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>This item is sold out</div>";
      }
      else if($stock<$value)
      {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>This item left $stock only</div>";
      }
      else
      {

      $product = mysqli_query($conn, "SELECT * FROM wishlist WHERE pro_id = $proo_id");
      $product = mysqli_fetch_assoc($product);
      $cart_product = mysqli_query($conn, "SELECT * FROM orders WHERE pro_id = $proo_id");

      if(mysqli_num_rows($cart_product) > 0) 
      {
        $cart_product = mysqli_fetch_assoc($cart_product);
        $quantity = $cart_product['quantity'] + $value;
        mysqli_query($conn, "UPDATE orders SET quantity = $quantity WHERE pro_id = $proo_id");
        $msg = "<div style='background-color: green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Add to Cart Successfully !</div>";
      } 
      else 
      {
        mysqli_query($conn,"INSERT INTO `orders`(shoesname,quantity,price,shoessize,pro_id,stock) VALUES ('$shoesname','$value','$price','$size','$proo_id','$stock')");  
        $msg = "<div style='background-color: green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Add to Cart Successfully !</div>";
      }


        // mysqli_query($conn,"INSERT INTO `orders`(shoesname,quantity,price,shoessize) VALUES ('$shoesname','$value','$price','$size')");  

          // $newstock = 0;
          // $newstock = $stock - $value;
          // $wishid = $_POST['id'];
          // mysqli_query($conn,"UPDATE wishlist SET stock = $newstock where wish_id='$wishid'");
        
        
      }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Wishlist Page</title>

    <style>
    *
    {
      font-size: 29px;
    }
    td, tr
    {
      padding: 10px 100px 10px 100px;
    }
    .container
    {
      border: 1px solid #ccc;
      padding: 20px 20px;
    }
    fieldset
    {
      background-color: #f2f2f2;
    }
    </style>

</head>
<body>
    

<div class="middle">

<div class="container">

<h1><b style="font-size: 50px;"><i class="fa fa-shopping-cart" style="font-size:50px;"> </i> My Wishlist</b></h1><br>

<fieldset>

    <?php
    $sql = "SELECT * FROM wishlist";
    $result = mysqli_query($conn,$sql);

    // $id = $_GET['email'];
    // $host = "SELECT * FROM `user` where Email = '$id'";
    // $query = mysqli_query($conn,$host);
    // $host_image = mysqli_fetch_assoc($query);
    ?>
  <table >
    <tr>
      <td><strong>Shoes Name </strong></td>
      <td><strong>Shoes Size</strong></td>
      <td><strong>Shoes Price</strong></td>
    </tr>

    <?php
        $total=0;
    while($row = mysqli_fetch_array($result))
    {

        ?>
        
    <tr>
    <form action="" method="POST"> 
    <input type="hidden" name="id" value="<?php echo $row["wish_id"]?>">
      <td><?php echo $row["shoesname"]; ?>     <input type="hidden" name="shoesname" value="<?php echo $row["shoesname"]?>">   </td>
      <td><?php echo $row["size"];	?>   <input type="hidden" name="size" value="<?php echo $row["size"];?>">  <input type="hidden" name="inventory" value="<?php echo $row["stock"];?>"> </td>
      <td>RM<?php echo $row["price"];?>     <input type="hidden" name="price" value="<?php echo $row["price"];?>"> <input type="hidden" name="pro_id" value="<?php echo $row["pro_id"];?>"> </td>
      <td>  <input id="range" name="range" type="number" min="1" max="5" value="1">   <input type="hidden" name="stock" value="<?php echo $row["stock"];?>">   <button type="submit" name="submit">Add to cart</button></td>
      <td><a href="deletewishlist.php?wish_id=<?php echo $row['wish_id']; ?>"><i class="fa fa-close" style="font-size:36px;color:#dc3545;"></i></a>
                                                                  <!-- &&email=<?php echo $id?> -->
      </td>
    </form>
    </tr>



        <?php
    
    }



    ?>
        </div>
  </table>


</fieldset>
<?php echo "<div>".$msg."</div>"?>


</div>
</body>
</html>

<?php
    include 'footer.php';
   
?>