<?php
    session_start();

?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .upper
        {
            padding: 16px 30px;
            font-size: 27px;
            background:black;
        }
        *
        {
            margin:0;
        }
        .center
        {
            margin: 0 50px;
            color: white;
        }
        img
        {
            width: 90px;
        }
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
        }
    </style>
<title></title>
</head>
<body>
<div class="upper">

    <?php  if (isset($_SESSION['user_id'])) {  $id =$_GET['user_id'];   ?> 

        <div class="center" style="float:left;">
            <a href="homepage.php?user_id=<?php echo $id ?>"  ><img src="image/foot.png" alt="Shop Logo"></a>
        </div>

        <ul >
                <li  style="float: right;"><a href="order.php?user_id=<?php echo $id ?>"  class="center" ><i class="fa fa-shopping-cart"> </i> Shopping cart</a></li>
                <li class="dropdown" style="float: right;"><a href="#" class="dropbtn">Login</a>
                    <div class="dropdown-content">
                        <a href="userprofile.php?user_id=<?php echo $id ?>">My Account</a>
                        <a href="wishlist.php?user_id=<?php echo $id ?>">My Wish List</a>
                        <a href="order_his.php?user_id=<?php echo $id ?>">My Order History</a>
                    </div>
                    </li>
        </ul>

        <hr>
        <div class="middle">
        <ul >
            <li class="dropdown"><a href="#" class="dropbtn">Brands</a>
                <div class="dropdown-content">
                    <a href="productpage.php?user_id=<?php echo $id ?>">Nike</a>
                    <a href="#">Puma</a>
                    <a href="#">Adidas</a>
                    <a href="#">Vans</a>
                </div>
            </li>

            <li class="dropdown"><a href="#" class="dropbtn">Support</a>
                <div class="dropdown-content">
                    <a href="aboutus.php?user_id=<?php echo $id ?>">About Us</a>
                    <a href="contact2.php?user_id=<?php echo $id ?>">Contact Us</a>
                    <a href="commentpage.php?user_id=<?php echo $id ?>">Comment</a>
                </div>
            </li>

            <li class="dropdown"><a href="#">All Product</a>
            </li>
        </ul>

        </div>


        </div>

    <?php   } else { ?>

        <div class="center" style="float:left;">
            <a href="homepage.php"  ><img src="image/foot.png" alt="Shop Logo"></a>
        </div>

        <ul >
            <li class="dropdown" style="float: right;"><a href="#" class="dropbtn">Login</a>
                <div class="dropdown-content">
                    <a href="register.php">Create An Account</a>
                    <a href="login.php">Login</a>
                </div>
            </li>
        </ul>

        
    <hr>
        <div class="middle">
        <ul >
            <li class="dropdown"><a href="#" class="dropbtn">Brands</a>
                <div class="dropdown-content">
                    <a href="#">Nike</a>
                    <a href="#">Puma</a>
                    <a href="#">Adidas</a>
                    <a href="#">Vans</a>
                </div>
            </li>

            <li class="dropdown"><a href="#" class="dropbtn">Support</a>
                <div class="dropdown-content">
                    <a href="aboutus.php">About Us</a>
                    <a href="contact2.php">Contact Us</a>
                    <a href="commentpage.php">Comment</a>
                </div>
            </li>

            <li class="dropdown"><a href="#">All Product</a>
            </li>
        </ul>

        </div>


        </div>

    <?php } ?>


    
</body>

</html>