<?php

    include 'conn.php'; 
    $msg = '';

?>


<?php
    if(isset($_POST['savebtn']))
    {

    // $id= $_POST['id'];
    $mname= $_POST["name"];  	
    $mid = $_POST["id"]; 
    $mpass = $_POST["pass"];  	
    $mstatus = $_POST["status"]; 
    $mimage = $_FILES['image']['name'];

        if (!$mname)
        {
            $msg = "<div style='background-color: red; text-align:center; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Name !</div>";
        }
        else if(!$mpass)
        {
            $msg = "<div style='background-color: red; text-align:center; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Password !</div>";
     
        }
        else if(!$mid)
        {
            $msg = "<div style='background-color: red; text-align:center; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in ID !</div>";
     
        }
        else if(!$mstatus)
        {
            $msg = "<div style='background-color: red; text-align:center; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Select the Status !</div>";
        }
        else if(!$mimage)
        {
            $msg = "<div style='background-color: red; text-align:center; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Select the Status !</div>";
        }
        else
        {
            // mysqli_query($conn,"UPDATE admin set admin_id='" . $_POST['id'] . "', admin_name='" . $_POST['name'] . "', status='" . $_POST['status'] . "' , admin_password='" . $_POST['pass'] . "' where a_id = '$id'");            
            // $sql = "update user set Image='" . $_POST['image'] . "' where Email='$id'";
            mysqli_query($conn,"INSERT INTO `admin`(admin_id,admin_name,status,admin_password,image) VALUES ('$mid','$mname','$mstatus','$mpass','$mimage')");  
            $msg = "<div style='background-color: green; text-align:center; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Add New staff Successfully !</div>";
     

        // $msg = "<div style='background-color: green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Add to Cart Successfully !</div>";
     
        }
    
            
    }
    


    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Add Manage Staff</title>



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
    h1
    {
        text-align: center;
        background: linear-gradient(#ff7b00,#ffb700);
        border-bottom: 2px solid gray;
        padding: 20px;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        margin-bottom: 20px;
        font-size: 3em;
        font-family: 'Courier New', Courier, monospace;
    }
    fieldset
    {
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
        background: linear-gradient(#ff7b00,#ffb700);
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
        background: linear-gradient(#ff7b00,#ffb700);
        color: white;
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
    <h1>Add New Staff / Admin</h1>
    <?php echo "<div>".$msg."</div>"?>
    <fieldset>
    <form action="" method="POST" >
        <input type="hidden" name="id">
        <label for=""><i class="fa fa-cube"></i> Admin Name:</label>
        <input name="name" type="text">
        <br>
        <label for=""><i class="fa fa-usd"></i> Password:</label>
        <input type="pass" name="pass" >
        <br>
        <label for=""><i class="fa fa-cube"></i> Admin ID:</label>
        <input name="id" type="text">
        <br>
        <label for="status"  >Status : </label>
                <select id="status" name="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                <br><br><br>
                <label for="file"  class="Choose"><i class="fa fa-camera"></i> Choose a Photo</label>
        <input type="file" id="file" name="image" class="form-control" multiple>
        <br>
        <input type="submit" name="savebtn" value="Add New Admin">
        <br>

    </form>
    </fieldset>
    </div>
    


</body>
</html>
