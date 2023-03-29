<?php
    include 'header.php';
    include 'conn.php'; 
    $msg='';
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
      padding: 10px 70px 10px 70px;
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
    ?>
  <table >
    <tr>
      <td><strong>Shoes Name </strong></td>
      <td><strong>Shoes Size (UK) </strong></td>
      <td><strong>Shoes Quantity</strong></td>
      <td><strong>Shoes Price</strong></td>
      <td><strong>Total per Item</strong></td>
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
  <!-- <form action="" method="post">  -->
  <p>Total :<span style="color:black"><b>RM <?php echo $total;?></b></span>

  <span style="padding: 0px 0px 0px 50px;"><a href="payment.php?user_id=<?php echo $id ?>" alt="payment">      <i class="fa fa-plus-square"></i> <input type="button" name="saveas" value="Checkout"></a></span></p>
                                     <!--                  ?email=<?php echo $id?>        </form> -->
                            
</div>

</fieldset>


</div>
 <?php echo "<div>".$msg."</div>"?>
</body>

<?php



  if(isset($_POST['saveas']))
  {

    $sql = "SELECT * FROM orders where user_id = '$id' ";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result))
    {
      $qty = $row['quantity'];
      $stock = $row['stocks'];
      $shoesname = $row['shoesname'];

      if($stock==0)
      {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>This item $shoesname is sold out. Please Remove this item to proceed checkout</div>";
        // header("Location: order.php");
      }
      else if($stock<$qty)
      {
         $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>This item $shoesname left $stock only. Please Remove this item to proceed checkout</div>";
        //  header("Location: order.php");
      }
      else
      { 
         $msg = "<div style='background-color: green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Add to Cart Successfully !</div>";
         header("Location: payment.php");
      }

    }

  }

?> 
</html>


<?php
    include 'footer.php';
   
?>