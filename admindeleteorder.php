<?php
    include("conn.php");
    include 'adminheader.php';

    if (isset($_GET['her_id'])) {
        $id = $_GET['her_id'];
        
        if (isset($_POST['confirm'])) {
            mysqli_query($conn, "DELETE FROM history WHERE her_id='$id'");
            header("Location: manageorder.php");
            exit();
        } else if (isset($_POST['cancel'])) {
            header("Location: manageorder.php");
            exit();
        }
    } 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Order</title>
    
     
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
    <h1>Delete Order</h1>
    <p>Are you sure you want to delete this order?</p>
    <form method="post">
        <input type="submit" name="confirm" value="Yes">
        <input type="submit" name="cancel" value="No">
    </form>
</fieldset>
</body>
</html>
