<?php
    include("conn.php");
    include 'adminheader.php';

    $id =$_GET['admin_id']; 

    if (isset($_GET['shoe_id'])) {
        $shoe = $_GET['shoe_id'];
        
        if (isset($_POST['confirm'])) {
            mysqli_query($conn, "DELETE FROM shoes WHERE shoe_id='$shoe'");
            header("Location: admin_shoes.php?admin_id=$id");
            exit();
        } else if (isset($_POST['cancel'])) {
            header("Location: admin_shoes.php?admin_id=$id");
            exit();
        }
    } 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Shoe</title>
    
     
<style>
    .middle
    {
        max-width: 800px;
        margin: auto; 
        padding:50px;
    }
    *
    {
        font-size: 30px;
    }
    fieldset
    {
        background-color: #f2f2f2;
        margin-left: 180px;
        margin-right: 250px;
    }

</style>

</head>
<body>
<fieldset>
    <h1>Delete Shoe</h1>
    <p>Are you sure you want to delete this shoe?</p>
    <form method="post">
        <input type="submit" name="confirm" value="Yes">
        <input type="submit" name="cancel" value="No">
    </form>
</fieldset>
</body>
</html>
