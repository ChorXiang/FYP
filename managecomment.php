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

    <title>Admin | Manage Comment</title>

    <style>
    fieldset
    {
        margin-left: 160px;
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .wrapper
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
      text-align: center;
      padding: 10px;
      padding-right: 50px;
    }
    a:hover
    {
      color: red;
    }
  </style>

</head>
<body>
    

<div id="wrapper">

    <fieldset>
    <?php
    //   $name = $_GET['name'];
        $sql = "select * from messages";
        $result = mysqli_query($conn,$sql);

        // $host = "SELECT * FROM `admin`";
        // $query = mysqli_query($conn,$host);
        // $host_image = mysqli_fetch_assoc($query);
        ?>
      <h1><i class="fa fa-address-book-o" style="font-size:50px"></i><b style="font-size: 50px;"> View Customer Comment </b></h1>
      <table border="0px">
        <tr>
          <td>Customer Name</td>
          <td>Customer Email</td>
          <td>Subject</td>
          <td>Message</td>
        

        </tr>
        <?php

        while($row = mysqli_fetch_array($result))
        {


            ?>
      
        <tr>

          <td><?php echo $row["name"]; ?></td>         
          <td><?php echo $row["email"];	?></td>
          <td style="max-width: 300px, text-overflow: ellipsis;"><?php echo $row["subject"];	?></td>
          <td style="max-width: 300px, text-overflow: ellipsis;"><?php echo $row["message"];?></td>

          

        </tr>
            <?php

        }

		?>

			
      </table>
<p>
        
    
      <span class="left" ><a href="reportcomment.php?admin_id=<?php echo $id ?>" alt="insert"> <i class='fa fa-print' style='font-size:24px'></i> <input type="button" value="View and Print Report" style="margin-left: 10px;"></span></p>

      <!-- <span class="left"><br><button onclick="window.print()" header="">Generate User List</button></span> -->

    </fieldset>
      </div>
	<div>
</div>

</body>
</html>