<?php
    include 'header.php';
    include 'config.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aboutus</title>
    <style>
        h2.aboutus
        {
            background-color: rgb(204, 204, 204);
            padding: 20px 0px ;
            color:black;
        }
        body
        {
            color:black; 
        }
        .box
        {
            background-color: lightgrey;
            border-style: solid;
            border-color: lightgrey;
            box-shadow: 3px 3px 5px gray;
            text-align: center;
            font-size: 25px;
            margin: 60px 15px 100px 15px;
        }
        .bullet
        {
            text-align: left;
            font-size: 20px;
        }
    </style>
</head>
<body>
<div class="box" >
       <h2 class="aboutus"><strong>About Us</strong></h2>
       <hr>
       <div class="bullet">
        <ol>
            <li>  Summary </li>
            <p> Our company already have 10 years history in Malaysia. Our team to try open more physical shop at all around the world.</p>

            <li>  Latest News </li>
            <p> Our team are added a new brand shoes Vans to our store. You can enjoy shopping at our website.</p>

            <li>  Customer Service </li>
            <p>We are provided the best custoemr service about 24 hours to help you when you are facing any problum. You can get the  contact number or email at the contact us page. </P>
         </ol>

        </div>
</div>
</body>
</html>

<?php
    include 'footer.php';
   
?>