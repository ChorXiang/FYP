<?php
    include 'conn.php'; 
    include 'adminheader.php';
    $id =$_GET['admin_id']; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Admin | Manage Staff </title>

        
    <style>
    fieldset
    {
        background-color: #f2f2f2;
        font-weight: bold;
    }
    .floatright{
      float:right;   
    }
    .middle
    {
        margin: auto; 
        padding-left: 160px;
    }
    *
    {
      font-size: 16px;
    }
    .left
    {
      float: left;
      margin-bottom: 50px;
    }
    td, th 
    {
      text-align: left;
      padding: 10px;
      padding-right: 50px;
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
        $sql = "select * from admin";
        $result = mysqli_query($conn,$sql);

        // $host = "SELECT * FROM `admin`";
        // $query = mysqli_query($conn,$host);
        // $host_image = mysqli_fetch_assoc($query);
        ?>
      <h1><i class="fa fa-address-book-o" style="font-size:50px"></i><b style="font-size: 50px;"> Manage Admin </b></h1>
      <span class="floatright" ><a href="addmanagestaff.php?admin_id=<?php echo $id ?>" alt="insert"> <i class='fa fa-plus' style="margin-left: 10px; 'font-size:24px'"> </i><input type="button" value="Add New Admin"></a></span></p>

      <table border="0px">
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email Address</td>

        </tr>
        <?php

        while($row = mysqli_fetch_array($result))
        {
            ?>
      
        <tr>
          <!-- <td><img class='img' src="<?php echo "image/".$row['image'];?>" ></td> -->
          <td><?php echo $row["admin_id"]; ?></td>             
          <td><?php echo $row["admin_name"]; ?></td>       
          <td><?php echo $row["admin_email"]; ?></td>               
          <!-- <td>       
            <a href="editmanagestaff.php?admin_id=<?php echo $row['admin_id']?>&&admin_id=<?php echo $id ?>" alt="update"><i class="fa fa-cog" style="font-size:36px"></i></a>
            </td> -->
            
        </tr>
            <?php

        }

		?>
			
      </table>
<p>
        
    <div class="floatright">
      <span><a href="reportstaff.php?admin_id=<?php echo $id ?>" alt="insert"> <i class='fa fa-print' style='font-size:24px'></i> <input type="button" value="View and Print Report"></span></p>
      </div>
      <!-- <span class="left"><br><button onclick="window.print()" header="">Generate User List</button></span> -->

    </fieldset>
  </div>

	<div>

	</div>
	
</div>


</body>
</html>