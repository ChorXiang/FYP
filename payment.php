<?php
    include 'header.php';
    include 'conn.php'; 
    $msg = '';
?>


<?php
    $nameErr="";
    $emailErr="";
    $pnErr="";
    $addErr="";
    $codeErr="";
    $cardnumErr="";
    $cardnameErr="";
    $secodeErr="";
    $clickErr="";

  if(isset($_POST['saveas']))
  {	 
    $value = 0; 
    // $mherid = $_POST['herid'];
    $mname = $_POST['Fullname'];
    $memail = $_POST['Email'];
    $mmemail = filter_var($memail, FILTER_SANITIZE_EMAIL);
    $mph = $_POST['Phonenumber'];
    $mmph = filter_var($mph);
    $maddress = $_POST['address'];
    $mstate = $_POST['state'];
    $mpostcode = $_POST['postcode'];
    $mmpostcode = filter_var($mpostcode);
    $mcardnum = $_POST['cardnum'];
    $mmcardnum = filter_var($mcardnum);
    $mcardname = $_POST['cardname'];
    $mmonth = $_POST['month'];
    $myear = $_POST['cardyear'];
    $msecurecode = $_POST['securecode'];
    $mmsecurecode = filter_var($msecurecode);
    $value = $_POST['option'];
    $select = $_POST['ewallet'];
    $shoesname = $_POST['shoesname'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $qty = $_POST['quantity'];

    // $emailErr="Email is required and must use Correct Email Format ";
    // $pnErr="Phone Number is required and must use Correct Phone Number Format";
    // $addErr="Address is required";
    // $codeErr="Postcode is required and must use Correct Post Code Format";
    // $cardnumErr="Card Number is required and must uses Correct Card Number Format";
    // $cardnameErr="Card Name is required";
    // $secodeErr="Secure Code is required and must uses Correct Secure Code Format";
    // $clickErr="Must agree the Terms and Conditions";

    if (empty($mname)) 
    {
        $nameErr = "Name is required";
    }
    else 
    {
        $nameErr ="";
    }

    if (empty($memail)) 
    {
        $emailErr="Email is required and must use Correct Email Format ";
    }
    else if(!filter_var($mmemail, FILTER_VALIDATE_EMAIL) === true)
    {
        $emailErr="Email is required and must use Correct Email Format ";
    }
    else 
    {
        $emailErr ="";
    }

    if (empty($mph)) 
    {
        $pnErr="Phone Number is required and must use Correct Phone Number Format";
    }
    else 
    {
        $pnErr="";
    }

    if (empty($maddress)) 
    {
        $addErr="Address is required";
    }
    else 
    {
        $addErr ="";
    }

    if (empty($mpostcode)) 
    {
        $codeErr="Postcode is required and must use Correct Post Code Format";
    }
    else if (!is_numeric($mmpostcode)) 
    {
     // $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please enter a valid numeric Post Code!</div>";
        $codeErr="Postcode is required and must use Correct Post Code Format";
    } 
    else if(strlen($mmpostcode)<5)
    {
     // $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Correct Post Code Format !</div>";
        $codeErr="Postcode is required and must use Correct Post Code Format";
    }
    else if(strlen($mmpostcode)>5)
    {
     // $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Correct Post Code Format !</div>";
        $codeErr="Postcode is required and must use Correct Post Code Format";
    }
    else 
    {
        $codeErr ="";
    }

    if (empty($mcardnum)) 
    {
        $cardnumErr="Card Number is required and must uses Correct Card Number Format";
    }
    else if(strlen($mmcardnum )<16)
    {
      // $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Correct Card Number Format !</div>";
        $cardnumErr="Card Number is required and must uses Correct Card Number Format";
    }
    else if(strlen($mmcardnum )>16)
    {
     // $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Correct Card Number Format !</div>";
        $cardnumErr="Card Number is required and must uses Correct Card Number Format";
    }
    else 
    {
        $cardnumErr ="";
    }

    if (empty($mcardname)) 
    {   
        $cardnameErr="Card Name is required";
    }
    else 
    {
        $cardnameErr ="";
    }

    if (empty($msecurecode)) 
    {
        $secodeErr="Secure Code is required and must uses Correct Secure Code Format";
    }
    else if(strlen($mmsecurecode)<3)
    {
     // $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Correct Security Code Format !</div>";
        $secodeErr="Secure Code is required and must uses Correct Secure Code Format";
    }
    else if(strlen($mmsecurecode)>3)
    {
     // $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Correct Security Code Format !</div>";
        $secodeErr="Secure Code is required and must uses Correct Secure Code Format";
    }
    else if (!is_numeric($mmsecurecode)) 
    {
     // $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please enter a valid numeric Post Code!</div>";
        $secodeErr="Secure Code is required and must uses Correct Secure Code Format";
    } 
    else 
    {
        $secodeErr="";
    }

    if (!isset($_POST['tick'])) 
    {
        $clickErr="Must agree the Terms and Conditions";
    }
    else 
    {
        $clickErr ="";
    }

    // 

    if($clickErr  == "" &&  $secodeErr=="" &&  $cardnameErr =="" && $codeErr =="" && $addErr =="" && $nameErr =="" &&  $pnErr=="" && $emailErr =="" && $cardnumErr =="")
    {
        
        $k = 0;
        $l = 0;
            
            
        $random = mt_rand(0, 100);
            
        $sql = "SELECT * FROM history WHERE user_id = '2'";
        $result = mysqli_query($conn, $sql);
            
        while ($row = mysqli_fetch_array($result)) 
        {
            $before = $row["order_num"];
            
            if ($random == $before) 
            {
                $l++;
                break;
            }
        }
            
        if ($l > 0) 
        {
            $random = mt_rand(0, 100);
        }
            
        $sql = "SELECT * FROM orders where user_id = '$id'";
        $msg = '';$total= 0; $subtotal=0;
        $result = mysqli_query($conn, $sql);
            
        while($row = mysqli_fetch_array($result))
        {
            $price = $row['price'];
            $qty = $row['quantity'];
            $subtotal=$price*$qty;
            $total =  $total + $subtotal;     
        }
            
            $sql = "SELECT * FROM orders where user_id = '$id'";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result)) 
            {
              $shoesname = $row["shoesname"];
              $price = $row['price'];
              $size = $row['shoessize'];
              $qty = $row['quantity'];
              $idd = $row['order_ID'];
              $datetime = date('Y-m-d H:i:s');
              $proo_id = $row['pro_id'];
              $image = $row['shoe_image'];


            
              if ($size == 8.5 || $size == 10.5 || $size == 12.5) {
                mysqli_query($conn, "UPDATE stock SET size_" . ($size - 0.5) . "_5 = size_" . ($size - 0.5) . "_5 - $qty WHERE shoe_id = '$proo_id'");
              } else if ($size % 2 == 0 || $size == 9 || $size == 11 || $size == 7) {
                mysqli_query($conn, "UPDATE stock SET size_" . $size . " = size_" . $size . " - $qty WHERE shoe_id = '$proo_id'");
              } else {
                mysqli_query($conn, "UPDATE stock SET size_" . ($size - 0.5) . "_5 = size_" . ($size - 0.5) . "_5 - $qty WHERE shoe_id = '$proo_id'");
              }
              
            
              mysqli_query($conn, "UPDATE wishlist SET stock = stock - $qty WHERE pro_id = '$proo_id'");
              mysqli_query($conn, "INSERT INTO history (order_num,her_shoesname,her_size,her_quantity,her_price,her_email,user_id,her_date,shoe_image,his_name,his_email,his_pn,his_address,his_state,his_code,his_cardnum,his_cardname,his_cardmonth,his_cardyear,his_securecode,total) VALUES ('$random ','$shoesname','$size','$qty','$price','$memail','$id','$datetime','$image','$mname','$memail','$mph','$maddress','$mstate','$mpostcode','$mcardnum','$mcardname','$mcardmonth','$mcardyear','$msecurecode','$total')");
              mysqli_query($conn, "DELETE FROM orders WHERE order_ID='$idd' && user_id='$id'");
            
              $msg = "<div style='background-color: green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'> Payment Successfully ! </div>";
            
              echo "<script>alert('Payment successful!');</script>";
            
              echo '<script>window.location.href = "order_his.php?user_id=' . $id . '";</script>';
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
    <title>User Payment</title>
    <style>
        .error 
        {
        color: #FF0000;
        }
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
        .center_payment
        {
            text-align: center;
        }
    </style>
</head>
<body>
    

<div class="center_payment">

    <br>
<h1><b style="font-size: 50px;">Payment Page </b></h1><br>
<?php echo "<div>".$msg."</div>"?>

                    </div>
<div class="middlee">

            <div class="row">
                <div class="box">
                    <fieldset>
                        <form name="from1"  method="post" action=""  >
                            <label for="fname" ><i class="fa fa-user"></i>Full Name : <sup>*</sup></label>
                            <input type="text" name="Fullname" placeholder="Ali Lee">
                            <div class="error"><?php echo $nameErr;?></div><br>

                            <p id="full" style="font-size:0.8em; color:red"></p>
                            <label for="email"><i class="fa fa-envelope"></i>Email : <sup>*</sup></label>
                            <input type="text" name="Email" placeholder="AliLee@example.com">
                            <div class="error"><?php echo $emailErr;?></div><br>

                            <label for="fname"><i class="fa fa-phone"></i>Phone number : <sup>*</sup></label>
                            <input type="text" name="Phonenumber" placeholder="0123456789">
                            <div class="error"><?php echo $pnErr;?></div><br>
                        <!-- </form> -->
                            
                    </fieldset>
                </div>
                        <div class="box2">
                            <fieldset>
                                <h4><i class="fa fa-shopping-cart"></i>Cart <span class="price" style="color:black"> </span>
                                <table>
                                    <hr>
                                <?php
                                $id = $_GET['user_id'];
                                $sql = "SELECT * FROM orders where user_id = '$id' ";
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
                                <td><?php echo $row["shoesname"]; ?> <input type="hidden" name="shoesname" value="<?php echo $row["shoesname"]?>">  </td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo $row["shoessize"]; ?> <input type="hidden" name="size" value="<?php echo $row["shoessize"]?>">   </td></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo $row["quantity"]; ?> <input type="hidden" name="quantity" value="<?php echo $row["quantity"]?>">   </td>
                                <td>&nbsp;&nbsp;&nbsp; </td>

                                <td>RM<?php echo $subtotal; ?> <input type="hidden" name="price" value="<?php echo $row["price"]?>">   </td>
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
                                <!-- <form action="" method="POST">  -->
                                    <label for="address" ><i class="fa fa-address-book"></i>UNIT NO & STREET ADDRESS : <sup>*</sup></label>
                                    <input type="text" name="address" placeholder="12, Jalan Semabok 1/1, Taman Semabok sek 1, 75450 Semabok">
                                    <div class="error"><?php echo $addErr;?></div><br>

                                    <label for="state"  ><i class="fa fa-address-book"></i>STATE : <sup>*</sup></label>
                                        <select id="state" name="state">
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
                                    
                                    <label for="postcode" ><i class="fa fa-address-book"></i>POSTAL CODE : <sup>*</sup></label>
                                    <input type="text" name="postcode" placeholder="75450">
                                    <div class="error"><?php echo $codeErr;?></div>
                                <!-- </form> -->
                            </fieldset>
                        </div>


                        <div class="box">
                         <fieldset>

                         <!-- <form action="" method="POST">  -->
                            <div id="inputDiv" style="display:block;">
                                    <label for="userInput">CARD NUMBER : <sup>*</sup></label>
                                    <input type="text" id="userInput" name="cardnum" placeholder="1111222233334444" maxlength="16">
                                    <div class="error"><?php echo $cardnumErr;?></div><br>

                                    <label for="userInput">NAME ON CARD : <sup>*</sup></label>
                                    <input type="text" id="userInput" name="cardname">
                                    <div class="error"><?php echo $cardnameErr;?></div><br>


                                    <label for="userInput">EXPIRY DATE (Month) : <sup>*</sup></label>
                                        <select id="month" name="month">
                                            <option value="01">01</option>
                                            <option value="01">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>

                                        <label for="userInput">EXPIRY DATE (Year) : <sup>*</sup></label>
                                        <select id="cardyear" name="cardyear">
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                        </select>


                                    <label for="userInput">SECURITY CODE : <sup>*</sup></label>
                                    <input type="text" id="userInput" name="securecode" placeholder="123">
                                    <div class="error"><?php echo $secodeErr;?></div><br>
                            </div>
                       <!-- </form> -->

                       <!-- <form action="" method="POST">  -->
                            <div id="inputDivv" style="display:none;">
                            <label for="userInputt"  >E-WALLET : <sup>*</sup></label>
                                <select id="userInputt" name="ewallet">
                                    <option value="none">Please select the E-Wallet</option>
                                    <option value="Tng">TnG</option>
                                    <option value="Boost">Boost</option>
                                    <option value="GrabPay">GrabPay</option>
                                    <option value="ShopeePay">ShopeePay</option>
                                </select>

                                    <label for="userInputt">ENTER YOUR EMAIL : <sup>*</sup></label>
                                    <input type="text" id="userInputt" name="eemail">
                            </div>
                        <!-- </form> -->



                    <!-- </form> -->

                    <script type="text/javascript">
                        function showInput()
                        {
                            var inputDiv = document.getElementById("inputDiv");
                            var userInput = document.getElementById("userInput");
                            var inputDivv = document.getElementById("inputDivv");
                            var userInputt = document.getElementById("userInputt");


                            if(document.getElementById("option1").checked )
                            {
                                inputDiv.style.display = "block";
                                inputDivv.style.display = "none";
                                userInputt.required = false;
                            }
                            else if (document.getElementById("option2").checked )
                            {
                                inputDivv.style.display = "block";
                                inputDiv.style.display = "none";
                                userInput.required = false;
                            }
                            else
                            {
                                inputDiv.style.display = "none";
                                inputDivv.style.display = "none";
                                userInputt.required = false;
                            }
                        }
                    </script>

   

                        <label><br>
                            <input type="checkbox" name="tick" > By clicking on, you agree to F O O T's <a href="#" class="paymentlink"><u> Terms and Conditions. </u></a><br> <br>
                            <div class="error"><?php echo $clickErr;?></div><br>
                            <input type="checkbox" checked="checked"> Notify me the latest promotion through email.<br>
                        </label>
        
                        <input type="submit" name="saveas" value="Continue to checkout" class="botton" style="float:right;">
                        
                    <!-- </form> -->
                    </fieldset>

                </div>
                
                <div class="box2">
                        <fieldset>
                            <b>Payment Method</b><br><br><hr><br>
                            <!-- <form action="radio_input.php" method="POST"> -->
                            <label for="option1"> Credit Card / Debit Card </label>
                            <input type="radio" checked="checked" id="option1" name="option" value="1" onclick="showInput()" ><br><br>


                        </fieldset>
                </div>
                
            </div>


    </div>

    </form>

</body>
</html>


<?php
    include 'footer.php';
   
?>