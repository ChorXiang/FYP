<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>footer</title>
    <style>
        *
        {
            color:white;
        }
        .footer
        {
            padding: 30px 30px 60px 30px ;
            font-size: 27px;
            background:black;
            display:flex;
        }
        ul
        {
            list-style-type: none;
            margin: 0;
            overflow: hidden;
        }
        a:hover
        {
            color: yellow;
        }
        a
        {
            text-decoration:none;
        }
        li
        {
            padding: 10px 30px 10px 0px ;
            float:left;
        }
        .left
        {
            width: 300px;
            flex-grow: 3;
        }
        p
        {
            padding: 10px 0px 0px 30px ;
        }
        .right
        {
            width: 600px;
            flex-grow: 3;
        }
    </style>
</head>
<body>
<div class="footer">

    <div class="left" >
        <p><a href="#">About Us</a></p>
        <p><a href="#">Contact Us</a></p>
        <p><a href="#">Comment</a></p>
    </div>

    <div class="right" >
        <p><b><u>N I C E</u></b></p>

        <ul>
            <li><a href="#"><i class='fab fa-twitter' style='color:white'></i> Twitter</a></li>
            <li><a href="#"><i class='fab fa-youtube' style='color:white'></i> Youtube</a></li>
            <li><a href="#"><i class='fab fa-facebook' style='color:white'></i> Facebook</a></li>
            <li><a href="#"><i class='fab fa-instagram' style='color:white'></i> Instagram</a></li>
            <li><a href="#"><i class='fab fa-whatsapp' style='color:white'></i> Whatsapp</a></li>
        </ul>

        <p style="color:#3d3d5c; text-align:right; padding-right:25px;">Copyright NICE 2023</p>


    </div>

</div>


</body>
</html>