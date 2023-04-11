<?php
    include 'conn.php'; 
    $msg='';
?>
<?php

//   if(isset($_POST["submit"])){
    
//       if (empty($_POST["shoe_name"])) {
//         $shoe_name = "* Shoe Name is required";
//       } else {
//         $shoe_name = test_input($_POST["shoe_name"]);
//     }

//         if (empty($_POST["quantity"])) {
//           $quantityErr = "* Quantity is required";
//         } else {
//           $quantity = test_input($_POST["quantity"]);
//       }

//       if (empty($_POST["quantity"])) {
//           $quantityErr = "* Quantity is required";
//         } else {
//           $quantity = test_input($_POST["quantity"]);
//       }

//       if (empty($_POST["quantity"])) {
//           $quantityErr = "* Quantity is required";
//         } else {
//           $quantity = test_input($_POST["quantity"]);
//       }
//   }




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <title>Admin Manage Order</title>

    <style>


    .sidenav {
      height: 100%;
      flex: 30%;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      padding-top: 20px;
    }

    .main {
      flex: 0 0 70%;
      background-color: white;
      padding: 20px;
      height: 100%;
      float: right;
      text-align: center;
      position: absolute;
      top: 0;
      right: 0;
      font-size: 25px;
    }

    form input
    {
        font-size: 15px;
    }

    .sidenav a {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
    }

    .sidenav a:hover {
      color: #f1f1f1;
    }

    .sidenav img
    {
      height: 50px;
      width: 90px;
    }


    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
    }

    select
    {
        font-size: 15px;
    }

    th
    {
      padding: 5px;
    }

    fieldset
    {
      background-color: lightgrey;
    }

    .left{
      float:left;
      padding-left:160px ;
    }

    .right{
      float:right;
      padding-right:60px ;
    }
    .container
    {
      display: flex;
      justify-content: space-between;
      width: 100%;
      margin: 0 auto;
      padding: 20px;
    }

    .imgcenter {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 40%;
    }
    
</style>

</head>
<body>

<div class="side">
<div class="sidenav">
        <a href="admindashboard.php"><img src="image/foot.png" alt="Shop Logo" width="10px" height="10px"></a><br><br> 
        <a href="#">Manage Category</a>
        <a href="#">Manage Product</a>
        <a href="admin_history.php">Manage Order</a>
        <a href="manageuser.php">Manage Customer</a>
        <a href="#">Manage Staff </a>
        <a href="managecomment.php">Manage comment </a>
</div>
</div>

<?php
    

    
    $sql = "SELECT * FROM history ";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found";
    }

    $conn->close();


?>

<div class="main">

<fieldset>




<div class="container">
  <div class="left">
  <fieldset>
  <div class="wordcenter">
  <b>Order Product Image</b><br>
  <h3><?php echo $row["her_shoesname"]; ?></h3>
  </div>
    <img class='img' src="<?php echo "image/shoesimg/".$row['shoe_image'];?>" >
  </fieldset>
</div>

<div class='right'>
  <form method="post" action="">
    
  Order ID : <?php echo $row["her_id"]; ?></td>         <br>
  Shoes Name  : <?php echo $row["her_shoesname"];	?><br>
          Shoes Size : <?php echo $row["her_size"];	?><br>
          Quantity :  <?php echo $row["her_quantity"];?><br>
          Price : <?php echo $row["her_price"];?><br>
          Total Price : <?php echo $row["her_price"];?><br>
          Email : <?php echo $row["her_email"];?><br>
          Date : <?php echo $row["her_date"];?><br>
          Order Status : <?php echo $row["order_status"];?><br>
    
<!-- HTML code -->
<form>
  <input type="radio" id="option1" name="option" value="1" onclick="showInput()"> Option 1
  <input type="radio" id="option2" name="option" value="2" onclick="showInput()"> Option 2
  <br><br>
  <div id="inputDiv" style="display:none;">

  <?php

    $sql = "SELECT * FROM payment where her_id = 0 ";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result))
    {
    ?>
    <label for="userInput">test : <?php echo $row["his_pn"]; ?>  <sup>*</sup></label>
    <?php

    }
?>
  </div>
</form>

<script>
// JavaScript code
function showInput() {
  var inputDiv = document.getElementById("inputDiv");
  var userInput = document.getElementById("userInput");
  var inputDivv = document.getElementById("inputDivv");
  var userInputt = document.getElementById("userInputt");

  if (document.getElementById("option1").checked) {
    inputDiv.style.display = "block";
    inputDivv.style.display = "none";
    userInputt.required = false;
  } else if (document.getElementById("option2").checked) {
    inputDivv.style.display = "block";
    inputDiv.style.display = "none";
    userInput.required = false;
  } else {
    inputDiv.style.display = "none";
    inputDivv.style.display = "none";
    userInputt.required = false;
  }
}
</script>



          
          
          
          

    <input type="submit" name="submit" value="Update">
  </form>
  <?php echo "<div>".$msg."</div>";     ?>

</fieldset>
</div>

</div>
</div>
</body>
</html>