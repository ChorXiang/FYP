<?php
    include 'adminheader.php'; 
    include 'conn.php'; 
    $msg=''; 
    $id =$_GET['admin_id']; 
    

    // if(!$_SESSION['admin_id'])
// {
//     header("Location:adminLogin.php");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    main {
      flex: 0 0 70%;
      background-color: white;
      padding-left: 160px;
      height: 100%;
      float: right;
      position: absolute;
      font-size: 25px;
    }

    b
    {
      font-size: 20px;
    }

    form input
    {
        font-size: 16px;
    }

    select
    {
        font-size: 16px;
    }

    th
    {
      padding: 20px;
    }

    fieldset
    {
      background-color: lightgrey;
      width: 100%;
    }

    .right{
      float:right;
      padding-right:160px ;
      margin-left: auto;
      margin-right: auto;
      width: 20%;
    }

    .butttonright{
      float:right;
    }

    .container
    {
      display: flex;
      justify-content: center;
      align-items: flex-start;   
      gap: 20px;   
      width: 100%;
      border: 1px solid #ccc;
      padding: 10px;
      padding-right:10px ;
    }

    .imgcenter {
      display: block;
      margin-left: auto;
      margin-right: auto;
      padding-left: 20px;
      text-align:"center";  
    }

    .wordcenter
    {
      text-align: center;
    }

    .nopadding
    {
      padding: 10px;
    }

</style>

</head>
<body>


</body>
</html>