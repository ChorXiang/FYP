<?php
    include 'conn.php'; 
    include 'header.php'; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>VIEW ORDER HISTORY</title>
    <style>
        body
        {
            font-size: 25px;
        }

        fieldset
        {
            color: black;      
            text-align: center;    
        }

        .table
        {

            background-color: #f2f2f2;
            width: 100%;
            max-width: 1100px;
            margin: auto; 
            padding:50px;
        }
        sup 
        {
        color: red;
        }
        body
        {
        background: #DDDDDD;

        }
        .box
        {
        background-color: #f2f2f2;
        padding: 5px 20px 15px 20px;
        border: 1px solid lightgrey;
        border-radius: 15px;
        width:50%;
        margin: 20px 460px;
        text-align: left;
        }
        .box3 
        {
        width: 35%;
        height: 100px;
        margin:5px;
        text-align:left;
        }
        .box5
        {
        width: 20%;
        height: 100px;
        text-align:left;
        }
        .box4
        {
        width: 15%;
        height: 100px;
        text-align:left;
        }
        .label
        {
        display: flex;
        flex-wrap: wrap;
        }
        .label {
        display: inline-block;
        width: 150px;
        font-weight: bold;
        margin-bottom: 5px;
        }

        .value {
        display: inline-block;
        margin-bottom: 5px;
        }

        .pbina
{
    float:right;
}



    </style>
</head>
<body>

<div class="middle">
    <div>
    <br><h1>VIEW ORDER DETAIL</h1><br>
    <div class="box">
    <div>
    <table border="1px">
        <?php
                    $id =$_GET['user_id'];
                    $order_num=$_GET['order_num'];
                    // $sql = "SELECT * FROM history where user_id = '$id' && order_num= $order_num"; 
                    // $result = mysqli_query($conn, $sql);
                    $result = mysqli_query($conn, "select * from history where user_id = '$id' && order_num= $order_num"); 
                    $row = mysqli_fetch_assoc($result);

?>

<br><label>Ricipient Name&nbsp;&nbsp;&nbsp; :</label> <?php echo $row["his_name"];?>

<br><label>Ricipient Contact :</label> <?php echo $row["his_pn"];?>

<br><label>Ricipient Address :</label> <?php echo $row["his_address"];?> <?php echo $row["his_state"];?>

<br><label>Ricipient Email&nbsp;&nbsp;&nbsp; :</label> <?php echo $row["her_email"];?>

<br><label>Purchase Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label> <?php echo $row["her_date"];?>



        <tbody>                       
            <?php
            // Select data from the history table
            $id =$_GET['user_id'];
            $sql = "SELECT * FROM history where user_id = '$id' && order_num= $order_num"; 
            $result = mysqli_query($conn, $sql);


            // Display the data in a table
           
                while($row = mysqli_fetch_assoc($result)) 
                {                    
                    $order_num = $row["order_num"];
                    $her_shoesname = $row["her_shoesname"];
                    $her_size = $row["her_size"];
                    $her_quantity = $row["her_quantity"];
                    $her_price = $row["her_price"];
                    $her_email = $row["her_email"];    
                    $total =0;
                    $totalp = $row["total"];   
                    $subtotal=$her_price*$her_quantity;
                    $total =  $total + $subtotal;
                    $status = $row["order_status"];    
                    $her_date = $row["her_date"];             
                    ?>
                    <br><br>
                     <img class='img' src="<?php echo "image/shoesimg/".$row['shoe_image'];?>" >

                    <br><label>Shoes Name&emsp;&emsp; :</label> <?php echo $row["her_shoesname"];	?>

                    <br><label>Shoes Size&emsp;&emsp;&emsp;: UK</label> <?php echo $row["her_size"];	?>

                    <br><label>Shoes Quantity&emsp; :</label> <?php echo $row["her_quantity"];?>

                    <br><label>Price&emsp;&emsp;&emsp;&emsp;&emsp; : RM </label> <?php echo $row["her_price"];?> per item

                    <br><label>Total Price&emsp;&emsp;&emsp;: RM </label> <?php echo $total;?> 

                        </tbody>
    
                        <?php
    

}


?>
 <br> <br>             <br><label>Total Price For This Order &emsp;&emsp;&emsp;: RM </label> <?php echo $totalp;?>
 <div class="pbina">
    <p><a href="order_his.php?user_id=<?php echo $id ?>">Back to previous page</a></p>
                     </div>
</table>
</div></div>

</body>
</html>
<?php
    include 'footer.php';
?>