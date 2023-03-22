<?php
    include 'header.php';
    include 'conn.php'; 

    if(isset($_POST['submit']))
    {

      // $shoesname = mysqli_real_escape_string($conn,$_POST['shoesname']);
      // $price = mysqli_real_escape_string($conn,$_POST['price']);
      // $size = mysqli_real_escape_string($conn,$_POST['size']);
      // $value = mysqli_real_escape_string($conn,$_POST['range']);

      $shoesname = $_POST['shoesname'];
      $price = $_POST['price'];
      $size = $_POST['size'];
      $value = $_POST['range'];
      mysqli_query($conn,"INSERT INTO `orders`(shoesname,quantity,price,shoessize) VALUES ('$shoesname','$value','$price','$size')");   


      // $sql = "INSERT INTO `orders`(shoesname,quantity,price,shoessize) VALUES ('$foodname','$value','$price',$size)";

      echo "Add to Cart Successfully !";
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
      <td><?php echo $row["shoesname"]; ?>     <input type="hidden" name="shoesname" value="<?php echo $row["shoesname"]?>">   </td>
      <td><?php echo $row["size"];	?>   <input type="hidden" name="size" value="<?php echo $row["size"];?>">   </td>
      <td>RM<?php echo $row["price"];?>     <input type="hidden" name="price" value="<?php echo $row["price"];?>"> </td>
      <td>  <input id="range" name="range" type="number" min="1" max="5" value="1">    <button type="submit" name="submit">Add to cart</button></td>
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


</div>
</body>
</html>

<?php
    include 'footer.php';
   
?>