<?php
    include 'adminheader.php'; 
    include 'conn.php'; 
    $msg = '';
    $id =$_GET['admin_id']; 
?>

<?php
    if(isset($_POST['savebtn']))
    {
        // Retrieve form data
        $mname = $_POST["name"];  	
        $memail = $_POST["email"]; 
        $mpass = $_POST["pass"];  	
        $msecure = $_POST["secure"]; 
        
        if (!$mname)
        {
            $msg = "<div style='background-color: red; text-align:center; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Name !</div>";
        }
        else if(!$memail)
        {
            $msg = "<div style='background-color: red; text-align:center; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Email !</div>";
     
        }
        else if(!$mpass)
        {
            $msg = "<div style='background-color: red; text-align:center; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Password !</div>";
     
        }
        else
        {
        // Check if email already exists
        $result = mysqli_query($conn, "SELECT * FROM `admin` WHERE `admin_email`='$memail'");
        if(mysqli_num_rows($result) > 0) {
            // Display error message and stop further processing
            $msg = "<div style='background-color: red; text-align:center; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Email address is already registered. Please choose a different email address.</div>";
        } else {
            // Insert new admin record
            mysqli_query($conn,"INSERT INTO `admin`(`admin_name`, `admin_email`, `admin_password`, `secure`) VALUES ('$mname','$memail','$mpass','$msecure')");  
            
            // Display success message and redirect to managestaff.php
            $msg = "<div style='background-color: green; text-align:center; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Add New staff Successfully !</div>";     
            echo '<script>alert("Add new staff Successfully !");</script>';
            
            echo '<script>
                function confirmRedirect() {
                    if (confirm("Do you want to go to managestaff.php?")) {
                        window.location.href = "managestaff.php?admin_id=' . $id . '";
                    }
                }
                confirmRedirect();
            </script>';
        }
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
    .toright{
        float: right;
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
    
<?php
        if($id==1){  
    ?>
<div class="container">
    
    <h1>Add New Admin</h1>
    <fieldset>
    <form action="" method="POST" >
    <?php echo "<div>".$msg."</div>"?>

        <label for=""><i class="fa fa-user"></i>&nbsp;Admin Name&nbsp;&nbsp;:</label>
        <input name="name" type="text" required>
        <br><br>
        <label for=""><i class="fa fa-envelope"></i>&nbsp;Admin Email :</label>
        <input type="email" name="email" required>
        <br><br>
        <label for=""><i class="fa fa-key"></i> Password&nbsp;&nbsp;&nbsp;&nbsp;:</label>
        <input type="pass" name="pass" required>
        <br><br>
        <label for=""><i class="fa fa-lock"></i> &nbsp;Secure Code&nbsp;:</label>
        <input type="text" name="secure" pattern="[0-9]{6}" title="Please enter a 6-digit number" minlength="6" maxlength="6" required>
        

        <!-- <label for=""><i class="fa fa-cube"></i> Admin ID:</label>
        <input name="id" type="text"> -->
        <br>
        <input type="hidden" name="status" value="active">
                <br><br><br>
                <input type="hidden" name="image" value="profile.jpg">

                <!-- <label for="file"  class="Choose"><i class="fa fa-camera"></i> Choose a Photo</label>
        <input type="file" id="file" name="image" class="form-control" multiple> -->
        
        <div class="toright">
            <input type="submit" name="savebtn" value="Add New Admin">
            <a href="managestaff.php?admin_id=<?php echo $id ?>">Back to Previous Page </a>
        </div>
    </div>
<?php        
        }else{
            ?>
            <div class="container">
            <fieldset>
                <h2>
                    Please contact the super admin.
                </h2>
            </fieldset>
            </div>
            <?php
        }
    ?>
    </form>
    </fieldset>
    </div>
    


</body>
</html>
