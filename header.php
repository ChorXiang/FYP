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
            padding:20px ;
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
        ul
        {
            list-style-type: none;
            margin: 0;
            overflow: hidden;
        }
        li
        {
            float: right;
        }


        li a, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}
    </style>
<title></title>
</head>
<body>
<div class="upper">
    <div class="center" style="float:left;">
        <a href="#" ><img src="img/logo.png" alt="Shop Logo"></a>
    </div>
    
    <ul >
        <li class="center"><a href="#"  class="center" ><i class="fa fa-shopping-cart">Shopping cart</i></a></li>
        <li class="dropdown"><a href="#"class="javascript:void(0)" class="dropbtn">Login</a></li>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div>
    </ul>

    <hr>
        <div class="middle">
        <a href="#" class="center">Brands</a>
        <a href="#" class="center">Category</a>
        <a href="#" class="center">Sales</a>
        </div>

</div>




    <!-- <div class="upper">

        <a href="#" class="center" ><img src="img/logo.png" alt="Shop Logo"></a>
        <span class="right">

            Login

            <a href="#" class="center"><i class="fa fa-shopping-cart">Shopping cart</i></a>
        </span>
        <hr>
        <div class="middle">
        <a href="#" class="center">Brands</a>
        <a href="#" class="center">Category</a>
        <a href="#" class="center">Sales</a>
        </div>
    </div>     -->

    
</body>

</html>