<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>side bar header</title>
    
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
            margin: 15px;
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

</head>
<body>
    
<div class="upper">

    <?php  if (isset($_SESSION['user_id'])) {  $id =$_GET['user_id'];   ?> 



        <hr>
        <div class="middle">
        <ul >
       
            </li>
            <li class="dropdown"><a href="#" class="dropbtn">Shoes Type</a>
                <div class="dropdown-content">
                <a href="productlist.php?shoe_type=Casual Shoes&&user_id=<?php echo $id ?>">Casual Shoes</a>
                    <a href="productlist.php?shoe_type=Running Shoes&&user_id=<?php echo $id ?>">Running Shoes</a>
                    <a href="productlist.php?shoe_type=Sneakers&&user_id=<?php echo $id ?>">Sneakers</a>
                    <a href="productlist.php?shoe_type=lifestyle&&user_id=<?php echo $id ?>">Lifestyle</a>
                </div>
            </li>

            </li>

            <li class="dropdown"><a href="#" class="dropbtn">Shoes Brand</a>
                <div class="dropdown-content">
                <?php

$result = mysqli_query($conn, "SELECT DISTINCT shoe_brand FROM shoes");

while ($row = mysqli_fetch_assoc($result)) {
    echo '<a href="productlist.php?shoe_brand=' . $row['shoe_brand'] . '&user_id=' . $id . '">' . $row['shoe_brand'] . '</a>';
}

            ?>
                </div>
            </li>
        </ul>

        </div>


        </div>

    <?php   } else { ?>


        
    <hr >
        <div class="middle">
        <ul >
      
            </li>
            <li class="dropdown"><a href="#" class="dropbtn">Shoe Type</a>
                <div class="dropdown-content">
                    <a href="productlist.php?shoe_type=Casual Shoes">Casual Shoes</a>
                    <a href="productlist.php?shoe_type=Running Shoes">Running Shoes</a>
                    <a href="productlist.php?shoe_type=Sneakers">Sneakers</a>
                    <a href="productlist.php?shoe_type=lifestyle">Lifestyle</a>
                    <!-- <a href="productlist.php?shoe_brand=Adidas">Adidas</a> -->
                    <!-- <a href="productlist.php?shoe_brand=Converse">Converse</a> -->
                </div>
            </li>

 



            </li>

            
            <li class="dropdown"><a href="#" class="dropbtn">Shoes Brand</a>
                <div class="dropdown-content">
                <?php

$result = mysqli_query($conn, "SELECT DISTINCT shoe_brand FROM shoes");

while ($row = mysqli_fetch_assoc($result)) {
                echo '<a href="productlist.php?shoe_brand=' . $row['shoe_brand'] . '">' . $row['shoe_brand'] . '</a>';
            }

            ?>
                </div>
            </li>
        </ul>

        </div>


        </div>

    <?php } ?>


    
</body>
</html>