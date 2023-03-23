<?php
    include 'header.php';
    include 'conn.php'; 
    $msg = '';
?>


<?php

  if(isset($_POST['saveas']))
  {	 
    $mname = $_POST['Fullname'];
    $memail = $_POST['Email'];
    $mph = $_POST['Phonenumber'];
    $maddress = $_POST['address'];
    $mstate = $_POST['state'];
    $mpostcode = $_POST['postcode'];
    $mcardnum = $_POST['cardnum'];
    $mcardname = $_POST['cardname'];
    $mcardmonth = $_POST['cardmonth'];
    $mcardyear = $_POST['cardyear'];
    $msecurecode = $_POST['securecode'];
    $mewallet = $_POST['ewallet'];
    $meemail = $_POST['eemail'];


    
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
    else if(!$maddress)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Address !</div>";
        // $msg= "Please select the payment method";
    }
    else if(!$mstate)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in State !</div>";
        // $msg= "Please select the payment method";
    }
    else if(!$mpostcode)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Post Code !</div>";
        // $msg= "Please select the payment method";
    }
    else if(isset($_POST['option1']))
    {
        if(!$mcardnum)
        {
            $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Card Number !</div>";
            // $msg= "Please select the payment method";
        }
        else if(!$mcardname)
        {
            $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Name of Card !</div>";
            // $msg= "Please select the payment method";
        }
        else if(!$mcardmonth)
        {
            $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Expiry Date ( Month ) !</div>";
            // $msg= "Please select the payment method";
        }
        else if(!$mcardyear)
        {
            $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Expiry Date ( Year ) !</div>";
            // $msg= "Please select the payment method";
        }
        else if(!$msecurecode )
        {
            $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Security Code !</div>";
            // $msg= "Please select the payment method";
        }
        else if(!isset($_POST['tick']))
        {
            $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Must agree the Terms and Conditions</div>";
            // $msg= "Must agree the Terms and Conditions";
        }
        else
        {
            mysqli_query($conn,"INSERT INTO history (his_name,his_email,his_pn,his_address,his_state,his_code,his_cardnum,his_cardname,his_cardmonth,his_cardyear,his_securecode,his_ewallet,his_eemail) VALUES ('$mname','$memail','$mph','$maddress','$mstate','$mpostcode','$mcardnum','$mcardname','$mcardmonth','$mcardyear','$msecurecode','$mewallet','$meemail ' )");
            
            // $sql = "INSERT INTO history (his_name,his_email,his_pn,his_address,his_state,his_state,his_code,his_cardnum,his_cardname,his_cardmonth,his_cardyear,his_securecode,his_ewallet,his_eemail) VALUES ('$mname','$memail','$mph','$maddress','$mstate','$mpostcode','$mcardnum','$mcardname','$mcardmonth','$mcardyear','$msecurecode','$mewallet','$meemail ' )";
            $msg = "<div style='background-color: green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>payment successfully !</div>";
        
            // if (mysqli_query($conn, $sql)) {
                
            //     // $msg = "<p>payment successfully !<br><a href='Homepage.php?email=$email'>Return Home page</p></a>";
            //   } else {
            //     $msg= "Error: " . $sql . "" . mysqli_error($conn);
            //   }
            //   mysqli_close($conn);
        }
        
    }

    else if(isset($_POST['option2']))
    {
        if(!$mewallet)
        {
            $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Select the E-Wallet !</div>";
            // $msg= "Please select the payment method";
        }
        else if(!$meemail)
        {
            $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Email for E-Wallet !</div>";
            // $msg= "Please select the payment method";
        }
        else if(!isset($_POST['tick']))
        {
            $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Must agree the Terms and Conditions</div>";
            // $msg= "Must agree the Terms and Conditions";
        }
        else
        {
           
            mysqli_query($conn,"INSERT INTO history (his_name,his_email,his_pn,his_address,his_state,his_code,his_cardnum,his_cardname,his_cardmonth,his_cardyear,his_securecode,his_ewallet,his_eemail) VALUES ('$mname','$memail','$mph','$maddress','$mstate','$mpostcode','$mcardnum','$mcardname','$mcardmonth','$mcardyear','$msecurecode','$mewallet','$meemail ' )");
            // $sql = "INSERT INTO history (his_name,his_email,his_pn,his_address,his_state,his_state,his_code,his_cardnum,his_cardname,his_cardmonth,his_cardyear,his_securecode,his_ewallet,his_eemail) VALUES ('$mname','$memail','$mph','$maddress','$mstate','$mpostcode','$mcardnum','$mcardname','$mcardmonth','$mcardyear','$msecurecode','$mewallet','$meemail ' )";
            $msg = "<div style='background-color: green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>payment successfully !</div>";
        
            // if (mysqli_query($conn, $sql)) {
                
            //     // $msg = "<p>payment successfully !<br><a href='Homepage.php?email=$email'>Return Home page</p></a>";
            //   } else {
            //     $msg= "Error: " . $sql . "" . mysqli_error($conn);
            //   }
            //   mysqli_close($conn);
        }
    }

    else if(!isset($_POST['tick']))
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Must agree the Terms and Conditions</div>";
        // $msg= "Must agree the Terms and Conditions";
    }
    else
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Select the Payment Method</div>";
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
<div class="middlee">


            <div class="row">
                

                        <div class="box">
                         <fieldset>

                         <!-- <form action="" method="POST">  -->
                            <div id="inputDiv" style="display:none;">
                                    <label for="userInput">CARD NUMBER : <sup>*</sup></label>
                                    <input type="text" id="userInput" name="cardnum">

                                    <label for="userInput">NAME ON CARD : <sup>*</sup></label>
                                    <input type="text" id="userInput" name="cardname">

                                    <label for="userInput">EXPIRY DATE : <sup>*</sup></label>
                                    <input type="text" id="cuserInput" name="cardmonth" placeholder="Month">
                                    <input type="text" id="userInput" name="cardyear" placeholder="Year">

                                    <label for="userInput">SECURITY CODE : <sup>*</sup></label>
                                    <input type="text" id="userInput" name="securecode">
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
                        
                    <!-- </form> -->
                    </fieldset>

                </div>
                
                <div class="box2">
                        <fieldset>
                            <b>Payment Method</b><br><br><hr><br>
                            <!-- <form action="radio_input.php" method="POST"> -->
                            <label for="option1"> Credit Card / Debit Card </label>
                            <input type="radio" id="option1" name="option1" value="1" onclick="showInput()"><br><br>

                            <label for="option2"> TNG eWallet  </label>
                            <input type="radio" id="option2" name="option2" value="2" onclick="showInput()"><br>


                            <label for="option1"> Credit Card / Debit Card </label>
                            <input type="radio" id="option1" name="option1" value="1" onclick="showInput()"><br><br>

                            <label for="option2"> TNG eWallet  </label>
                            <input type="radio" id="option2" name="option1" value="1" onclick="showInput()"><br>
                            
                        </div>
                        </fieldset>

            </div>


    </div>

    </form>
                    <div class="center_payment">
    <?php echo "<div>".$msg."</div>"?>
                    </div>
</body>
</html>


<?php
    include 'footer.php';
   
?>