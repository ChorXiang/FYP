<?php
    include 'header.php';
    include 'conn.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Payment</title>
    <style>

        .middlee
        {
            max-width: 1500px;
            margin: auto; 
            display: flex;
        }
        .fa 
        {
            font-size: 24px;
            width: 50px;
            text-align: center;
            margin: 5px 2px;
        }
        .fa:hover 
        {
            opacity: 0.7;
        }
        * 
        {
            box-sizing: border-box;
        }
        h3
        {
            text-align: center;
        }
        .row
        {
            margin-left:-5px;
            margin-right:-5px;
        }
        a:hover
        {
           color: red;
        }
        .box
        {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 15px;
            float: left;
            width: 70%;
            padding: 5px;
            text-align:left;
            margin: 20px 0px;
        }
        .box2
        {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 15px;
            float: right;
            width: 28%;
            padding: 5px;
            margin: 20px 0px;
        }
        input[type=text] 
        {
            width: 100%;
            margin-top: 20px;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 30px;
        }
        select
        {
            width: 100%;
            margin-top: 20px;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 30px;
        }
        .botton
        {
            margin-top: 20px;
            border-radius: 30px;
        }
        span.price 
        {
            float: right;
            color: grey;
        }
        .selection
        {
            margin-bottom: 20px;
        }
        fieldset
        {
            margin:20px;
        }
        a.paymentlink
        {
            color:black;
        }
        sup
        {
            color:red;
        }
    </style>
</head>
<body>
<div class="middlee">


            <div class="row">
                <div class="box">
                <fieldset>
                    <form name="from1"  method="post" action=""  >
                        <label for="fname" ><i class="fa fa-user"></i>Full Name : <sup>*</sup></label>
                        <input type="text" name="Fullname" placeholder="Ali Lee">

                        <p id="full" style="font-size:0.8em; color:red"></p>
                        <label for="email"><i class="fa fa-envelope"></i>Email : <sup>*</sup></label>
                        <input type="text" name="Email" placeholder="AliLee@example.com">

                        <label for="fname"><i class="fa fa-phone"></i>Phone number : <sup>*</sup></label>
                        <input type="text" name="Phonenumber" placeholder="012-3456789">

                        </div>
                        </fieldset>

                        <div class="box2">
                        <fieldset>
                    <h4><i class="fa fa-shopping-cart"></i>Cart <span class="price" style="color:black"> </span>
                    <table>
                        <hr>
                    <?php
                    $sql = "SELECT * FROM orders";
                    $result = mysqli_query($conn,$sql);
                    $total=0;
                    ?>
                    <tr>
                    <td>Name </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>Size</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>Quantity</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>Price</td>
                    </tr>

                    <?php
                    while($row = mysqli_fetch_array($result))
                    {
                        $p=$row["price"];
                        $q=$row["quantity"];
                        $subtotal=$p*$q;
                        $total =  $total + $subtotal;
                    ?>
                    <tr>
                    <td><?php echo $row["shoesname"]; ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><?php echo $row["shoessize"]; ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><?php echo $row["quantity"]; ?></td>
                    <td>&nbsp;&nbsp;&nbsp;</td>

                    <td>RM<?php echo $subtotal; ?></td>
                    </tr>
                    <?php
                    
                    }
                    ?>
                    </table>
                    <hr>
                    <p>Total :<span class="price" style="color:black"><b>RM <?php echo $total;?></b></span></p>
                    </fieldset>
                </div>


                        <div class="box">
                         <fieldset>

                        <label for="fname" ><i class="fa fa-user"></i>UNIT NO & STREET ADDRESS : <sup>*</sup></label>
                        <input type="text" name="Fullname" placeholder="12, Jalan Semabok 1/1, Taman Semabok sek 1, 75450 Semabok">

                        <label for="fname"  ><i class="fa fa-user"></i>STATE : <sup>*</sup></label>
                        <select id="state">
                            <option value="melaka">Melaka</option>
                            <option value="perak">Perak</option>
                            <option value="johor">Johor</option>
                            <option value="kl">Kuala Lumpur</option>
                            <option value="pp">Pulau Penang</option>
                            <option value="kedah">Kedah</option>
                            <option value="kelantan">Kelantan</option>
                            <option value="terengganu">Terangganu</option>
                            <option value="ns">Negeri Sembilan</option>
                            <option value="selangor">Selangor</option>
                            <option value="sabah">Sabahr</option>
                            <option value="sarawak">Sarawak</option>
                        </select>
                        
                        <label for="fname" ><i class="fa fa-user"></i>POSTAL CODE : <sup>*</sup></label>
                        <input type="text" name="Fullname" placeholder="Enter">

                        </div>
                        </fieldset>

                        <div class="box">
                         <fieldset>

                         
                            <div id="inputDiv" style="display:none;">
                                    <label for="userInput">CARD NUMBER : <sup>*</sup></label>
                                    <input type="text" id="userInput" name="userInput">

                                    <label for="userInput">NAME ON CARD : <sup>*</sup></label>
                                    <input type="text" id="userInput" name="userInput">

                                    <label for="userInput">EXPIRY DATE : <sup>*</sup></label>
                                    <input type="text" id="userInput" name="userInput" placeholder="Month">
                                    <input type="text" id="userInput" name="userInput" placeholder="Year">

                                    <label for="userInput">SECURITY CODE : <sup>*</sup></label>
                                    <input type="text" id="userInput" name="userInput">
                            </div>

                            <div id="inputDivv" style="display:none;">
                            <label for="fname"  >E-WALLET : <sup>*</sup></label>
                                <select id="state">
                                    <option value="Tng">TnG</option>
                                    <option value="Boost">Boost</option>
                                    <option value="GrabPay">GrabPay</option>
                                    <option value="ShopeePay">ShopeePay</option>
                                </select>

                                    <label for="userInput">ENTER YOUR EMAIL : <sup>*</sup></label>
                                    <input type="text" id="userInputt" name="userInput">
                            </div>



                    </form>

                    <script type="text/javascript">
                        function showInput(){
                            var inputDiv = document.getElementById("inputDiv");
                            var userInput = document.getElementById("userInput");

                            if(document.getElementById("option1").checked )
                            {
                                inputDiv.style.display = "block";
                                userInput.required = true;
                                inputDivv.style.display = "none";
                                userInputt.required = false;
                            }
                            else if (document.getElementById("option2").checked )
                            {
                                inputDivv.style.display = "block";
                                userInputt.required = true;
                                inputDiv.style.display = "none";
                                userInput.required = false;
                            }
                            else
                            {
                                inputDiv.style.display = "none";
                                userInput.required = false;
                                inputDivv.style.display = "none";
                                userInputt.required = false;
                            }
                        }
                    </script>

   

                        <label><br>
                            <input type="checkbox" name="tick" > By clicking on, you agree to F O O T's <a href="#" class="paymentlink"><u> Terms and Conditions. </u></a><br> <br>
                            <input type="checkbox" checked="checked"> Notify me the latest promotion through email.<br>
                        </label>
        
                        <input type="submit" name="saveas" value="Continue to checkout" class="botton" style="float:right;">
                        
                    </form>
                    </fieldset>

                </div>
                
                <div class="box2">
                        <fieldset>
                            <b>Payment Method</b><br><br><hr><br>
                            <form action="radio_input.php" method="POST">
                            <label for="option1"> Credit Card / Debit Card </label>
                            <input type="radio" id="option1" name="option" value="1" onclick="showInput()"><br><br>

                            <label for="option2"> TNG eWallet  </label>
                            <input type="radio" id="option2" name="option" value="2" onclick="showInput()"><br>

                        </div>
                        </fieldset>

            </div>


    </div>
</body>
</html>

<?php
    $msg = '';
  if(isset($_POST['saveas']))
  {	 
    $mname = $_POST['Fullname'];
    $memail = $_POST['Email'];
    $mph = $_POST['Phonenumber'];
    $tabletable = $_POST['tableno'];
    $selected = $_POST['choice'];
    
    if (!$mname)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Name !</div>";
        // $msg= "Please Key in Name !";
        
    }
    else if(!$memail)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Email !</div>";
        // $msg= "Please Key in Email !";
        
    }
    else if(!$mph)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Phone Number !</div>";
        // $msg= "Please Key in Phone Number !";
        
    }
    else if(!isset($_POST['tick']))
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Must agree the Terms and Conditions</div>";
        // $msg= "Must agree the Terms and Conditions";
        
    }
    else if($selected==0)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please select the payment method</div>";
        // $msg= "Please select the payment method";
    }
    else if($tabletable==0)
    {
        $msg= "Please select the table of your seet";        
    }
    else
    {
        $sql = "INSERT INTO checkout (Name,Email,Phonenumber,payment_method,table_number,total) VALUES ('$mname','$memail','$mph','$tabletable','$selected','$total')";
        if (mysqli_query($conn, $sql)) {
            $msg = "<p>payment successfully !<br><a href='Homepage.php?email=$email'>Return Home page</p></a>";
          } else {
            $msg= "Error: " . $sql . "" . mysqli_error($conn);
          }
          mysqli_close($conn);
    }

    
  }
?>
<?php echo $msg?>

<?php
    include 'footer.php';
   
?>