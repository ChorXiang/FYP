


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Header</title>
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
        .center
        {
            color: white;
        }
        
        img
        {
            width: 90px;
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
        .middle
        {
            text-align: center;
        }
        ul
        {
            list-style-type: none;
            margin: 0;
            overflow: hidden;
        }
        li a 
        {
            display: inline-block;
            color: white;
            text-align: center;
            text-decoration: none;
        }
        .dropdown
        {
            margin: 0 50px;
        }
        li.dropdown 
        {
            display: inline-block;
        }
        .dropdown-content 
        {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown-content a 
        {
            color: black;
            padding: 16px 30px;
            text-decoration: none;
            display: block;
            text-align: left;
        }
        .dropdown-content a:hover 
        {
            color: red;
        }
        .dropdown:hover .dropdown-content 
        {
            display: block;
        } */
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
  font-size: 25px;
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
    
<!-- <div class="upper">
    <div class="center" style="float:left;">
        <a href="admindashboard.php"  ><img src="image/foot.png" alt="Shop Logo"></a>
    </div>
    
    <ul >
        <li  style="float: right;"><a href="#"  class="center" > Login</a></li>
        <li class="dropdown" style="float: right;"><a href="#" class="dropbtn">Menu</a>
            <div class="dropdown-content">
                <a href="#">Manage Category</a>
                <a href="#">Manage Product</a>
                <a href="#">Manage Order</a>
                <a href="manageuser.php">Manage Customer</a>
                <a href="#">Manage Staff </a>
                <a href="#">Manage comment </a>
            </div>
            </li>
    </ul>




        </div> -->

        
<div class="sidenav">
        <a href="#" class="center" ><img src="image/foot.png" alt="Shop Logo"></a><br><br> 
        <a href="#">Manage Category</a>
        <a href="admin_product.php">Manage Product</a>
        <a href="admin_history.php">Manage Order</a>
        <a href="manageuser.php">Manage Customer</a>
        <a href="managestaff.php">Manage Staff </a>
        <a href="managecomment.php">Manage comment </a>
        <a href="managecontactus.php">Manage Support </a>
        <a href="adminlogout.php">Logout </a>
</div>


</body>
</html>