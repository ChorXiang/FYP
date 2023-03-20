<?php
    include 'header.php';
    include 'conn.php'; 
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
      padding: 10px 120px 10px 120px;
    }
    .container
    {
      border: 1px solid #ccc;
      padding: 20px;
    }
  </style>
</head>
<body>
<div class="middle">


<div class="container">
<fieldset>
    <?php
    $sql = "SELECT * FROM orders";
    $result = mysqli_query($conn,$sql);
    // $id = $_GET['email'];
    // $host = "SELECT * FROM `user` where Email = '$id'";
    // $query = mysqli_query($conn,$host);
    // $host_image = mysqli_fetch_assoc($query);
    ?>
  <h1><i class="fa fa-shopping-cart" style="font-size:50px"></i><b style="font-size: 50px;"> Order</b></h1>
  <table >
    <tr>
      <td>Shoes Name </td>
      <td>Shoes Quantity</td>
      <td>Shoes Price</td>
      <td>Total per Item</td>
    </tr>

    <?php

    while($row = mysqli_fetch_array($result))
    {
        ?>
        
    <tr>
        
      <td><?php echo $row["shoesname"]; ?></td>
      <td><?php echo $row["quantity"];	?></td>
      <td>RM<?php echo $row["price"];?></td>
      <?php
        $total=0;
        $p=$row["price"];
        $q=$row["quantity"];
        $subtotal=$p*$q;
        $total =  $total + $subtotal;
        ?>
      <td>RM<?php echo $subtotal; ?></td>
      <td><a href="deleteorder.php?order_ID=<?php echo $row['order_ID']; ?>&&email=<?php echo $id?>"><i class="fa fa-close" style="font-size:36px;color:#dc3545;"></i></a>
      </td>
    </tr>
        <?php
    
    }

    ?>
        </div>
  </table>

  <div class="rightway">
  <p>Total :<span style="color:black"><b>RM <?php echo $total;?></b></span>
  <span style="padding: 0px 50px 0px 120px;"><a href="payment.php?email=<?php echo $id?>" alt="payment"><i class="fa fa-plus-square"></i> <input type="button" value="Checkout"></a></span></p>

</div>

</fieldset>

</div>
</body>
</html>


<?php
    include 'footer.php';
   
?>