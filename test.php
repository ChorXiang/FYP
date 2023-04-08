<?php
    include 'conn.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <title>Admin Manage Customer / User Page</title>

    <style>

    /* Main column */
    .container {
      display: flex;
      height: 100%;
    }

    .sidenav {
      height: 100%;
      flex: 30%;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      padding-top: 20px;
    }

    .main {
      flex: 0 0 70%;
      background-color: white;
      padding: 20px;
      height: 100%;
      float: right;
      text-align: center;
      position: absolute;
      top: 0;
      right: 0;
      font-size: 2em;
    }


    .sidenav a {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
    }

    .sidenav a:hover {
      color: #f1f1f1;
    }

    .sidenav img
    {
      height: 50px;
      width: 90px;
    }


    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
    }

    .img
    {
      width: 80px;
    }

    th
    {
      padding: 5px;
    }

    fieldset
    {
      background-color: lightgrey;
    }
    
</style>

</head>
<body>

<div class="side">
<div class="sidenav">
        <a href="admindashboard.php"><img src="image/foot.png" alt="Shop Logo" width="10px" height="10px"></a><br><br> 
        <a href="#">Manage Category</a>
        <a href="#">Manage Product</a>
        <a href="#">Manage Order</a>
        <a href="manageuser.php">Manage Customer</a>
        <a href="#">Manage Staff </a>
        <a href="#">Manage comment </a>
</div>
</div>

<div class="main">

<div class="middle">
    <fieldset>
    <?php
    //   $name = $_GET['name'];
        $sql = "select * from user";
        $result = mysqli_query($conn,$sql);

        // $host = "SELECT * FROM `admin`";
        // $query = mysqli_query($conn,$host);
        // $host_image = mysqli_fetch_assoc($query);
        ?>
      <h1><i class="fa fa-address-book-o" style="font-size:50px"></i><b style="font-size: 50px;"> Manage Customer</b></h1>
      <table border="0px">
        <tr>
          <th>ID</th>
          <th>Image</th>
          <th>Name</th>
          <th>Contact No</th>
          <th>Email</th>
          <th>Username</th>
          <th>Password</th>
          <th>Status</th>
          <th>Manage</th>
        </tr>
        <?php

        while($row = mysqli_fetch_array($result))
        {
            ?>
      
        <tr>
          <th><?php echo $row["user_id"]; ?></th>
          <th><img class='img' src="<?php echo "image/".$row['image'];?>" ></th>
          <th><?php echo $row["full_name"];	?></th>
          <th><?php echo $row["contact_no"];?></th>
          <th><?php echo $row["email_address"];?></th>
          <th><?php echo $row["username"];?></th>
          <th><?php echo $row["userpassword"];?></th>
          <th><?php echo $row["status"];?></th>
          <th><a href="deletemanageuser.php?user_id=<?php echo $row['user_id']; ?>"><i class="fa fa-close" style="font-size:36px"></i></a>
                                                   <!-- ?No=<?php echo $row['No']; ?> -->
            <a href="editmanageuser.php?email=<?php echo $row['email_address'];?>" alt="update"><i class="fa fa-cog" style="font-size:36px"></i></a>
                                                                       <!--  &&name=<?php echo $name?> -->
            </th>
        </tr>
            <?php

        }

		?>
			
      </table>
<p>
        
      <span class="left"><a href="insertmanageuser.php" alt="insert"><i class="fa fa-plus-square"></i> <input type="button" value="ADD New User"></span>
    
      <span class="left" ><a href="reportuser.php" alt="insert"> <i class='fas fa-print' style='font-size:24px'></i> <input type="button" value="View n Print Report"></span></p>
                                                     <!-- ?name=<?php echo $name?> -->

      <!-- <span class="left"><br><button onclick="window.print()" header="">Generate User List</button></span> -->

    </fieldset>
  </div>

</div>
</div>
</body>
</html>