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
            padding:15px ;
            font-size: 27px;
            background:blue;
        }
        .center
        {
            margin: 0 30px;
            color: white;
        }
        .right
        {
            float:right;
        }
        a:hover
        {
            color: yellow;
        }
        a
        {
            text-decoration:none;
        }
        .middle
        {
            text-align: center;
        }
    </style>
<title></title>
</head>
<body>
    <div class="upper">

        <a href="#" class="center" ><img src="img/logo.png" alt="Shop Logo"></a>
        <span class="right">
        <a href="#" class="center">Login</a>
        <a href="#" class="center"><i class="fa fa-shopping-cart">Shopping cart</i></a>
        </span>
        <hr>
        <div class="middle">
        <a href="#" class="center">Brands</a>
        <a href="#" class="center">Category</a>
        <a href="#" class="center">Sales</a>
        </div>
    </div>    

    
</body>

</html>