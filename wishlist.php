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
    <title>User Wishlist Page</title>

    <style>
    *
    {
      font-size: 29px;
    }
    td, tr
    {
      padding: 10px 160px 10px 160px;
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
        
      <td><?php echo $row["shoesname"]; ?></td>
      <td><?php echo $row["size"];	?></td>
      <td>RM<?php echo $row["price"];?></td>
      <td><a href="deletewishlist.php?wish_id=<?php echo $row['wish_id']; ?>"><i class="fa fa-close" style="font-size:36px;color:#dc3545;"></i></a>
                                                                  <!-- &&email=<?php echo $id?> -->
      </td>
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