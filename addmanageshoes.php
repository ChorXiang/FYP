<?php
    include 'adminheader.php'; 
    include 'conn.php'; 
    $msg = '';
    $id =$_GET['admin_id']; 
?>


<?php
    if (isset($_POST['savebtn'])) {
        $shoe_name = $_POST["shoe_name"];
        $shoe_type = $_POST["shoe_type"];
        $shoe_brand = $_POST["shoe_brand"];
        $category = $_POST["category"];
        $shoe_image = $_POST["shoe_image"];
        $shoe_price = $_POST["shoe_price"];
        $yn = $_POST["yn"];
    
        if (!$shoe_name) {
            $msg = "<div style='text-align:center; background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text-align: center; margin-bottom: 20px;'>Please Key In Shoe Name</div>";
        } else if (!$shoe_price) {
            $msg = "<div style='text-align:center; background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text-align: center; margin-bottom: 20px;'>Please Key In Shoe Price Again(Minimum Is 1)</div>";
        } else if (!$shoe_image) {
            $msg = "<div style='text-align:center; background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text-align: center; margin-bottom: 20px;'>Please Insert Shoe Image</div>";
        } else {
            mysqli_query($conn, "INSERT INTO shoes (shoe_name, shoe_type, shoe_brand, category, shoe_image, shoe_price,yn) VALUES ('$shoe_name', '$shoe_type', '$shoe_brand', '$category', '$shoe_image', '$shoe_price','$yn')");
    
            // Get the newly inserted shoe_id
            $newShoeId = mysqli_insert_id($conn);
    
            // Insert the new shoe_id with all shoe sizes set to 0 into the stock table
            $sizeColumns = ['size_7', 'size_7_5', 'size_8', 'size_8_5', 'size_9', 'size_9_5', 'size_10', 'size_10_5', 'size_11', 'size_11_5', 'size_12', 'size_12_5'];
            $sizeColumnsString = implode(', ', $sizeColumns);
            $sizeValuesString = '0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0';
    
            mysqli_query($conn, "INSERT INTO stock (shoe_id, $sizeColumnsString) VALUES ($newShoeId, $sizeValuesString)");
    
            $msg = "<div style='text-align:center; background-color:green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text-align: center; margin-bottom: 20px;'>Add New Shoes Successfully!</div>";
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
    }
    
    
    


    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Add New Shoe</title>



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
    <h1>Add New Shoe</h1>
    <fieldset>
    <form action="" method="POST" >
    <?php echo "<div>".$msg."</div>"?>

        <label for="shoe_name">Shoe Name&nbsp;&nbsp;&nbsp;:</label>
        <input type="text" name="shoe_name" required>
        <br>
        <label for="shoe_type">Shoe Type&nbsp;&nbsp;&nbsp;:</label>
        <select id="shoe_type" name="shoe_type">
            <option value="Running Shoes">Running Shoes</option>
            <option value="Casual Shoes">Casual Shoes</option>
            <option value="Sneakers">Sneakers</option>
            <option value="Lifestyle">Lifestyle</option>
        </select>
        <br>
        <br><label for="state">Shoe Brand : </label>
<select id="state" name="brand">
    <?php
     $sql = "SELECT * FROM shoes ";
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_assoc($result);
    $result = mysqli_query($conn, "SELECT DISTINCT shoe_brand FROM shoes");

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['shoe_brand'] . '">' . $row['shoe_brand'] . '</option>';
    }
    ?>
</select>

<?php
$result = mysqli_query($conn, "SELECT DISTINCT shoe_brand FROM shoes");

while ($row = mysqli_fetch_assoc($result)) {
    echo '<a href="productlist.php?shoe_brand=' . $row['shoe_brand'] . '">' . $row['shoe_brand'] . '</a>';
}
?><br>
        <br>
        <label for="category">Category &nbsp;&nbsp;&nbsp;:</label>
        <select id="category" name="category">
            <option value="men">Men</option>
            <option value="women">Women</option>
        </select><br>
        <label for="shoe_price">Shoe Price&nbsp;  : RM</label>
        <input type="text" name="shoe_price" min="1" required>
        <br>
        <label for="file"  class="Choose" style="color: black;"><i class="fa fa-camera"></i> Shoe Image</label>
        <br><input type="file" id="file" name="shoe_image" class="form-control" >
        <br>
        <input type="hidden" name="status" value="active">
        <input type="hidden" name="yn" value="y">
        
        
        <div class="toright">
        <br>
        <input type="submit" name="savebtn" value="Add New Shoes">
        
        <a href="admin_shoes.php?admin_id=<?php echo $id ?>">Back to Previous Page </a>
        </div>

    </form>
    </fieldset>
    </div>
    


</body>
</html>
