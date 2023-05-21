<?php
    include 'adminheader.php'; 
    include 'conn.php'; 
    $msg=''; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
  .error {
  color: #FF0000;
  }

  .left{
    float:left;
    padding-left:80px ;
  }

  .right{
    float:right;
    padding-right:80px ;
  }

  .floatright{
    float:right;   
  }

  /* .container
  {
  display: flex;
  justify-content: space-between;
  width: 100%;
  margin: 0 auto;
  border: 1px solid #ccc;
  padding: 20px;
  } */

  fieldset
  {
    background-color: #f2f2f2;
    margin-left: 160px;
    text-align: left;
  }

  th,td
  {
    padding: 20px;
    text-align: center;
  }

  .imgcenter {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 200px;
      padding-left: 20px;
      text-align:"center";  
    }

  .wordcenter {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
  }
</style>
</head>
<body>  

<div class="container">

<div>

  <fieldset>
  <form method="get">
          <input type="text" name="search" placeholder="Search products..." required pattern="[A-Za-z0-9]+">
        <button type="submit">Search</button>

        <h1><i class="fa fa-address-book-o" style="font-size:45px"><b style="font-size: 50px;"> Manage Shoes </b></i></h1>
        
        <div class="right">
          <span class="left" ><a href="addmanageshoes.php" alt="insert"> <i class='fas fa-plus' style='font-size:24px'></i><input type="button" value="Add New Shoes" style="margin-left: 10px;"></a></span><br><br>
        </div>
        <table border="0px">
        <thead>
          <tr>
          <th>Shoe ID</th>
          <th>Shoe Name</th>
          <th>Category</th>
          <th>Shoe Image</th>
          <th>Shoe Price(RM)</th>
          <th>Edit</th>
          <th>Delete</th>
          </tr>
      </thead>
          <?php
          if (isset($_GET['search'])) {
            $search = mysqli_real_escape_string($conn, $_GET['search']);
            $sql = "SELECT * FROM shoes WHERE shoe_name LIKE '%$search%'";
            $result = mysqli_query($conn,$sql);
          } else {
            $sql = "SELECT * FROM shoes";
            $result = mysqli_query($conn,$sql);
            //$query = "SELECT * FROM shoes where status='active' ";
          }
          while($row = mysqli_fetch_array($result))
          {
              ?>
        <tbody>
        <tr>
          <th><?php echo $row['shoe_id']; ?></th>
          <th><?php echo $row['shoe_name']; ?></th>
          <th><?php echo $row['category']; ?></th>
          <th><img src="image/shoesimg/<?php echo $row["shoe_image"]; ?>" alt="<?php echo $row["shoe_name"]; ?>" class="imgcenter" height="190px" width="200px"></th>
          <th><?php echo $row['shoe_price']; ?></th>
          <th><a href="admin_product.php?shoe_id=<?php echo $row['shoe_id'];?>" alt="edit"><i class="fa fa-cog" style="font-size:36px"></i></a></th>
          <th><a href="deleteprod.php?shoe_id=<?php echo $row['shoe_id'];?>" alt="edit" style="color:red;"><i class="fa fa-close" style="font-size:36px"></i></a></th>        
        </tr>
      </tbody>
              <?php

          }

      ?>
        
        </table>
        <span class="floatright" ><a href="reportshoes.php" alt="insert"><i class='fas fa-print' style='font-size:24px'></i><input type="button" value="View and Print Report" style="margin-left: 10px;"></span></p>

  </fieldset>

  </div>
  </div>

  </body>
  </html>
