<?php
    include 'adminheader.php';
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
    fieldset
    {
        background-color: #f2f2f2;
    }
    .middle
    {
        max-width: 1680px;
        margin: auto; 
        padding:50px;
        padding-left: 160px;
    }
    *
    {
      font-size: 30px;
    }
    .left
    {
      float: right;
      margin-bottom: 50px;
    }
    td, th 
    {
      text-align: left;
      padding: 30px;
    }
    a:hover
    {
      color: red;
    }
    .img
    {
      width: 80px;
    }
  </style>

</head>
<body>
    
<div id="wrapper">

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
          <td>ID</td>
          <td>Image</td>
          <td>Name</td>
          <td>Contact No</td>
          <td>Email</td>
          <td>Username</td>
          <td>Status</td>
          <td>Manage</td>
        </tr>
        <?php

        while($row = mysqli_fetch_array($result))
        {
            ?>
      
        <tr>
          <td><?php echo $row["user_id"]; ?></td>
          <td><img class='img' src="<?php echo "image/".$row['image'];?>" ></td>
          <td><?php echo $row["full_name"];	?></td>
          <td><?php echo $row["contact_no"];?></td>
          <td><?php echo $row["email_address"];?></td>
          <td><?php echo $row["username"];?></td>
          <td><?php echo $row["status"];?></td>
          <td>       
            <a href="editmanageuser.php?email=<?php echo $row['email_address'];?>" alt="update"><i class="fa fa-cog" style="font-size:36px"></i></a>
                                                                       <!--  &&name=<?php echo $name?> -->
            </td>
        </tr>
            <?php

        }

		?>
			
      </table>
<p>
        
    
      <span class="left" ><a href="reportuser.php" alt="insert"> <i class='fas fa-print' style='font-size:24px'></i> <input type="button" value="View n Print Report"></span></p>
                                                     <!-- ?name=<?php echo $name?> -->

      <!-- <span class="left"><br><button onclick="window.print()" header="">Generate User List</button></span> -->

    </fieldset>
  </div>

	<div>

	</div>
	
</div>
</body>
</html>