<?php
    include 'adminheader.php'; 
    include 'conn.php'; 
    $msg = '';
    $id =$_GET['admin_id']; 
?>


<?php
    if (isset($_POST['savebtn'])) {
        $shoe_brand = $_POST["shoe_brand"];
        $status = $_POST["status"];
        $yn = $_POST["yn"];
            mysqli_query($conn, "INSERT INTO shoes (shoe_brand, status,yn) VALUES ( '$shoe_brand', '$status','$yn')");
    
            $msg = "<div style='text-align:center; background-color:green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text-align: center; margin-bottom: 20px;'>Add New Brand Successfully!</div>";
            echo '<script>alert("Add Successfully !");</script>';
    
            echo '<script>
                function confirmRedirect() {
                    if (confirm("Do you want to go to admin_shoes.php?")) {
                        window.location.href = "admin_shoes.php?admin_id=' . $id . '";
                    }
                }
                confirmRedirect();
            </script>';
        }
    
    
    
    


    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Add shoes brand</title>



<style>

    *
    {
        margin: 0;
        padding: 0;
    }
    .container
    {
        margin: 20%;
        margin-top: 30px;
        height: auto;
    }

    .toright{
        float: right;
    }

    h1
    {
        text-align: center;
        background-color: #f2f2f2;
        border: 2px solid gray;
        border-bottom: 0px;
        padding: 20px;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        font-size: 3em;
        font-family: 'Courier New', Courier, monospace;
    }
    fieldset
    {
        background-color: #f2f2f2;
        padding: 10px;
        height: 110%;
    }
    form
    {
        /* text-align: center; */
        padding-left: 20px;
        font-family: 'Courier New', Courier, monospace;
    }
    input
    {
        border: none;
        border-bottom: 1px solid black;
        margin-top: 20px;
        margin-bottom: 20px;
        font-size: 15px;
        padding-right: 20px;
    }
    input[type='file']
    {
        display: none;
    }
    .Choose
    {
        /* border: 1px solid ; */
        padding: 10px;
        border-radius: 20px;
        background: lightgray;
        color: white;
    }
    .Choose:hover
    {
        cursor: pointer;
        background: linear-gradient(to left,#ffaa00,#ffea00);
        color: black;
    }
    input[type='submit']
    {
        padding: 10px;
        border-radius: 20px;
        background: lightgray;
        color: black;
        border: none;
    }

    input[type='submit']:hover
    {
        cursor: pointer;
        background: linear-gradient(to left,#ffaa00,#ffea00);
        color: black;
    }
    
</style>
</head>
<body>
    

<div class="container">
    <h1>Add New Brand</h1>
    <fieldset>
    <form action="" method="POST" >
    <?php echo "<div>".$msg."</div>"?>

        <label for="shoe_name">Brand Name&nbsp;&nbsp;&nbsp;:</label>
        <input type="text" name="shoe_brand" required>
        <br>
        
        <br>
        <input type="hidden" name="status" value="active">
        <input type="hidden" name="yn" value="n">
        
        
        <div class="toright">
        <br>
        <input type="submit" name="savebtn" value="Add New Brand">
        
        <a href="admin_shoes.php?admin_id=<?php echo $id ?>">Back to Previous Page </a>
        </div>

    </form>
    </fieldset>
    </div>
    


</body>
</html>
