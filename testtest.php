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
                        <form name="from1"  method="post" action=""  >
                            <label for="fname" ><i class="fa fa-user"></i>Full Name : <sup>*</sup></label>
                            <input type="text" name="Fullname" placeholder="Ali Lee">

                            <p id="full" style="font-size:0.8em; color:red"></p>
                            <label for="email"><i class="fa fa-envelope"></i>Email : <sup>*</sup></label>
                            <input type="text" name="Email" placeholder="AliLee@example.com">

                            <label for="fname"><i class="fa fa-phone"></i>Phone number : <sup>*</sup></label>
                            <input type="text" name="Phonenumber" placeholder="012-3456789">
                        <!-- </form> -->
                            
                    </fieldset>
                </div>
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
                                <td><?php echo $row["shoesname"]; ?> <input type="hidden" name="shoesname" value="<?php echo $row["shoesname"]?>">  </td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo $row["shoessize"]; ?> <input type="hidden" name="size" value="<?php echo $row["shoessize"]?>">  </td>
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