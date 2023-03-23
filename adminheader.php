


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Header</title>
    <style>
        .upper
        {
            padding: 35px 30px;
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
</head>
<body>
    
<div class="upper">
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
                <a href="#">Manage Customer</a>
                <a href="#">Manage Staff </a>
                <a href="#">View n Print Report </a>
            </div>
            </li>
    </ul>




        </div>

    
</body>
</html>