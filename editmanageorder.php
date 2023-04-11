<?php
    include 'adminheader.php';
    include 'conn.php'; 
    $msg = '';
    $id = $_REQUEST["herid"];
?>

<?php

if (isset($_POST["savebtn"])) 	
{

    $mstatus = $_POST['status'];

	if (!$mstatus)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Order Status !</div>";
    }
    else
    {
        mysqli_query($conn,"UPDATE history set order_status='" . $_POST['status'] . "' where her_id = '$id'");            
       
        $msg = "<div style='background-color: green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Update Successfully !</div>";
 
    }
    
    //         
    //         if (mysqli_query($conn, $sql)) {
    //             echo "Updated successfully !";
    //           } 
    //     else
    //     {
    //         echo "Please Key the Correct Role and Status follow the two selection !";
    //     }
    
    // else
    // {
    //     echo "Please Key the Correct Role and Status follow the two selection !";
    // }



	
	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | edit manage order</title>

    
<style>
    .middle
    {
        max-width: 1100px;
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
    }
    a:hover
    {
      color: red;
    }
    sup
    {
      color: red;
    }
</style>

</head>
<body>
    


<div class="middle">

<fieldset>
    <?php
        // $name=$_GET['name'];



        $result = mysqli_query($conn, "select * from history where her_id = '$id'"); 
        $row = mysqli_fetch_assoc($result);
        $subtotal=0;
        $total=0;
        $p=$row["her_price"];
        $q=$row["her_quantity"];
        $subtotal=$p*$q;
        $total =  $total + $subtotal;
    //     $id = $_GET['name'];
    // $host = "SELECT * FROM `admin` where username = '$id'";
    // $query = mysqli_query($conn,$host);
    // $host_image = mysqli_fetch_assoc($query);             // ?name=<?php echo $host_image['username']

    ?>
    
    <h1><b style="font-size: 50px;"><i class="fa fa-pencil" style="font-size:50px"></i>Edit Order</b></h1>

    <form name="addfrm" method="post" action="">

        <label>Shoes Iamge :</label> <img class='img' src="<?php echo "image/shoesimg/".$row['shoe_image'];?>" >

        <br><label>Order ID :</label> <?php echo $row["her_id"]; ?>
     
        <br><label>Shoes Name :</label> <?php echo $row["her_shoesname"];	?>

        <br><label>Shoes Size : UK</label> <?php echo $row["her_size"];	?>

        <br><label>Quantity :</label> <?php echo $row["her_quantity"];?>
        
        <br><label>Price : RM </label> <?php echo $row["her_price"];?>
        
        <br><label>Total Price : RM </label> <?php echo $total;?>
        
        <br><label>Email :</label> <?php echo $row["her_email"];?>
        
        <br><label>Date :</label> <?php echo $row["her_date"];?>

        <br><label>Customer name :</label> <?php echo $row["his_name"];?>

        <br><label>Customer phone number :</label> <?php echo $row["his_pn"];?>

        <br><label>Customer address :</label> <?php echo $row["his_address"];?> <?php echo $row["his_state"];?>


        <br><label for="status"  >Order Status<sup>*</sup> : </label>
                <select id="status" name="status">
                    <option value="Pending">Pending</option>
                    <option value="In Process">In Process</option>
                    <option value="Shipping">Shipping</option>
                    <option value="Delivered">Delivered</option>
                </select>
        
        <br><input type="submit" name="savebtn" value="UPDATE">

    </form>
    <div style=text-align:center;>
    <?php echo "<div>".$msg."</div>"?></dev>
</fieldset>
</div>


</body>
</html>