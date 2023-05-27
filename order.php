<?php
    include 'header.php';
    include 'conn.php'; 
    $msg='';
?>



<?php



  if(isset($_POST['saveas']))
  {
    $id = $_GET["user_id"];
    $found_unavailable_item="false";
    $sql = "SELECT * FROM orders where user_id = '$id' ";
    $result = mysqli_query($conn,$sql);
    $status="";
    
    while($row = mysqli_fetch_array($result))
    {
      $qty = $row['quantity'];
      $stock = $row['stock'];
      $shoesname = $row['shoesname'];
      $size = $row['shoessize'];
      $status = $row['status'];
      
      // echo $status;

      if($stock===0)
      {
         $found_unavailable_item = 1;
        break;
      }
      else if($stock<$qty)
      {
        $found_unavailable_item = 2;
        break;
      }
      else if($status=="inactive")
      {
        $found_unavailable_item = 4;
        break;
      }
      else 
      { 
        $found_unavailable_item = 3;
         
      }
    }
 
      if ($found_unavailable_item==1) 
      {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>This item $shoesname UK $size is sold out. Please Remove this item to proceed checkout</div>";
      }
      else if ($found_unavailable_item==2) 
      {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>This item $shoesname UK $size left $stock only. Please change the Quantity to proceed checkout</div>";
      }
      else if( $found_unavailable_item == 3)
      {
        echo '<script>window.location.href = "payment.php?user_id=' . $id . '";</script>';
      }
      else if( $found_unavailable_item == 4)
      {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>This item $shoesname UK $size has been removed by admin. Please remove this item to proceed checkout</div>";
     }


  }
  

?>
<?php
if (isset($_POST["update_cart"])) {
  $order_ID = $_POST["order_ID"];
  $quantity = $_POST["quantity"];

  $sql = "UPDATE orders SET quantity='$quantity' WHERE order_ID='$order_ID'";
  if (mysqli_query($conn, $sql)) {
    $msg = "<div style='background-color: green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Update Successfully</div>";
} else {
    echo "Error updating order: " . mysqli_error($conn);
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Order Page</title>
    <style>
    fieldset
    {
        background-color: #f2f2f2;
    }
    *
    {
      font-size: 29px;
    }
    .rightway
    {
      float: right;
    }
    td, tr
    {
      padding: 10px 70px 10px 16px;
    }
    .container
    {
      border: 1px solid #ccc;
      padding: 20px 20px;
    }

  </style>
</head>
<body>
<div class="middle">

<?php echo "<div>".$msg."</div>"?>

<div class="container">
<h1><b style="font-size: 50px;"><i class="fa fa-shopping-cart" style="font-size:50px;"> </i> Shopping Cart </b></h1><br>

<fieldset>

    <?php
    $id =$_GET['user_id'];
    $sql = "SELECT * FROM orders where user_id = '$id' ";
    $result = mysqli_query($conn,$sql);
    // $id = $_GET['email'];
    // $host = "SELECT * FROM `user` where Email = '$id'";
    // $query = mysqli_query($conn,$host);
    // $host_image = mysqli_fetch_assoc($query);

    if (mysqli_num_rows($result) == 0) {

      echo '<img src="image/emptycart.png" style="width: 600px; height: auto;" alt="No product selected">';     
  } 
  else 
  {

    ?>
  <table >
    <tr>
      <td><strong>Shoes Name </strong></td>
      <td><strong>Shoes Size (UK) </strong></td>
      <td><strong>Shoes Quantity</strong></td>
      <td><strong>Change QTY</strong></td>
      <td><strong>Shoes Price</strong></td>
      <td><strong>Total Price</strong></td>
    </tr>

    <?php
        $total=0;
    while($row = mysqli_fetch_array($result))
    {
        ?>
        
    <tr>
        
      <td><?php echo $row["shoesname"]; ?></td>
      <td><?php echo $row["shoessize"]; ?></td>
      <td><?php echo $row["quantity"];	?></td>
      <td>
  <form action="" method="post">
    <input type="hidden" name="order_ID" value="<?php echo $row["order_ID"]; ?>">
    <input type="hidden" name="status" value="<?php echo $row["status"]; ?>">
    <input id="quantity" name="quantity" type="number" min="1" max="5" value="<?php echo $q; ?>" required>
    <button type="submit" name="update_cart">Update QTY</button>
  </form>
</td>

      <td>RM<?php echo $row["price"];?></td>
      <?php

        $p=$row["price"];
        $q=$row["quantity"];
        $subtotal=$p*$q;
        $total =  $total + $subtotal;
        ?>
      <td>RM<?php echo $subtotal; ?></td>
      <td><a href="deleteorder.php?order_ID=<?php echo $row['order_ID']; ?>&&user_id=<?php echo $id ?>"><i class="fa fa-close" style="font-size:36px;color:#dc3545;"></i></a>
                                                                  <!-- &&email=<?php echo $id?> -->
      </td>
    </tr>

        <?php
    
    }
  
    ?>
        </div>
  </table>

  

  <div class="rightway">
 <form action="" method="post"> 
  <p>Total :<span style="color:black"><b>RM <?php echo $total;?></b></span>
   
  <span style="padding: 0px 0px 0px 50px;">    <button type="submit" name="saveas" ><i class="fa fa-plus-square"></i> Checkout</button></span></p> </form>
                                  <!--         <a href="payment.php?user_id=<?php echo $id ?>" alt="payment">       </a>    ?email=<?php echo $id?>        -->
   
                            
</div>
<?php
    
  }

  ?>

</fieldset>


</div>

</body>


 
</html>


<?php
    include 'footer.php';
   
?>