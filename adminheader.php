<?php

include 'conn.php';
//$id =$_GET['admin_id']; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title></title>
    <style>
        /* .upper
        {
            padding: 35px 30px;
            font-size: 27px;
            background:black;
        }
        *
        {
            margin:0;
        } */
        i
        {
            size: 20px;
        }
        .center
        {
            color: white;
        }
        /*
        .right
        {
            float:right;
        }
        a
        {
            text-decoration:none;
        }
        
    */
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}


@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

    </style>
</head>
<body>
<!-- <?php
/*$id = $_GET['admin_id'];

if(!isset($id)) {
    echo '<script>alert("Update Successfully !");</script>';
    header("location:adminlogin.php");
}*/
?>

-->
<?php

$sql = "select * from admin";
$result = mysqli_query($conn,$sql);
$h = mysqli_fetch_assoc($result);
$id=$h["admin_id"];
?>


<div class="sidenav">
        <a href="#" class="center" ><img src="image/foot.png" alt="Shop Logo" width="90px"></a><br><br> 
        <a href="admin_category.php?admin_id=<?php echo $id ?>">Manage Category</a>
        <a href="admin_shoes.php?admin_id=<?php echo $id ?>">Manage Product</a>
        <a href="manageorder.php?admin_id=<?php echo $id ?>">Manage Order</a>
        <a href="manageuser.php?admin_id=<?php echo $id ?>">Manage Customer</a>
        <a href="managestaff.php?admin_id=<?php echo $id ?>">Manage Staff </a>
        <a href="managecomment.php?admin_id=<?php echo $id ?>">Manage comment </a>
        <a href="managecontactus.php?admin_id=<?php echo $id ?>">Manage Support </a>
        <br><br><br>
        <a href="adminlogout.php" alt="logout"><i class="fa fa-sign-out"></i>Logout</a>

</div>


</body>
</html>