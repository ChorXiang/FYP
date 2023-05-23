<?php
    
    require_once 'conn.php';

    $err=null;
    if(isset($_GET["error"]))
        {
            if($_GET["error"]=="emptyinput")
            {
                $err="Please fill in your email!";
            }
            if($_GET["error"]=="emaildoesnotexist")
            {
                $err="Email does not exist please enter again!";
            }
            if($_GET["error"]=="none")
            {
                
                $err="success!";
            }
        }
?>
<!DOCTYPE html>
<html>
    <head>

        <title></title>
        <style>
            body{
                margin:0;
            }
            
            div.border-cc{
                border:1px solid silver;
                
                width:35%;
                height: 40px;
                padding-top:10px;
                padding-bottom: 0;
                text-align:center;
                border-radius: 5px;
                
            }
            select{
                width: 20%;
                height: 50px;
                border:3px solid silver;
                
                text-align: center;
                
                border: 3px solid silver;
                -webkit-transition: 0.5s;
                transition: 0.5s;
                outline: none;
                color: grey;

            }
            select#earthimg{
                background-image: url("img/earth.png");
                background-size: 20px;
                background-repeat: no-repeat;
                
                border-radius: 5px;
               
                background-position-x: 20px;
                background-position-y: 12px;
            }
            select:focus{
                border:3px solid lightskyblue;
               
                box-shadow: 2px 2px 5px blueviolet;
            }
            .phonenum{
                width: 20%;
                height: 50px;
                text-align: center;
                
                border: 3px solid silver;
                -webkit-transition: 0.5s;
                transition: 0.5s;
                outline: none;
                

                
            }
            .phonenum:focus{
                border:3px solid lightskyblue;
                box-shadow: 2px 2px 5px blueviolet;
            }
            #phoneimg{
                background-image: url("img/phone.png");
                background-size: 20px;
                background-repeat: no-repeat;
                
                border-radius: 5px;
               
                background-position-x: 20px;
                background-position-y: 15px;
                
                
            }
           
            div.center2{
                margin-top: 0%;
            }
            div.phonealign{
                margin-left: 0px;
            }
            .verifybtn{
                border-radius:30px;
                outline:none;
                border:0;
                padding:10px 30px;
                background: linear-gradient(to right, lightblue, skyblue);
                width:350px;
            }

            .verifybtn:hover{      
            background:linear-gradient(to right, #1F709E, #34A2E1);
            transition:0.5s;
            opacity:0.7;
            }

            .box{
            border-radius: 5px;
            width:420px;
            height:420px;
            position: absolute;
            top:0;
            right:0;
            bottom:0;
            left:0;
            margin:auto;
            background-color: white;
            padding: 5px;
            overflow:hidden;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
            
            
            }


            .input-field{
            width: 85%;
            padding:10px;
            margin: 5px;
            border-left:0;
            border-right:0;
            border-top:0;
            border-bottom: 2px solid #999;
            outline: none;
            background: transparent;
            -webkit-transition: 0.5s;
            transition: 0.5s;
            
            
    
            }

            .input-field:focus{
            border-bottom:2px solid lightskyblue;    
            box-shadow: 0px 2px 2px lightskyblue;
   
            }

            input:focus::placeholder{
            color:transparent;
            -webkit-transition: 0.5s;
            transition: 0.5s;
    
            }
            #ins{
                font-size:13px; 
                color:grey;
                text-align:left;
                padding-left:33px;

            }
            #title{
                font-size:24px;
                font-weight:550;
                padding-left:32px;
            }
            .coninput{
                padding-left:29px;
            }

            .btn{

                text-align:center;
                
            }
            .backbtn{
                text-align:center; color:#777; font-size:12px;
            }
            .backbtn:hover{
                color:lightblue;
            }
        </style>
    </head>
    <body>
        <div class="box">
            <div class="center2">
            
            
                <br>
                <form action="forgot.func.php" name="forgotpwfrm" method="POST" autocomplete="off">
                <p id="title">Forgot your password?</p><br>
                <p id="ins">Please enter your email address to get verification code.</p><br><br>
                <div class="coninput">
                <input placeholder="Email address" name="inputemail" type="email" class="input-field">
                </div>
           
                <br><br>
                <div class="btn">
                    <input class="verifybtn" type="submit" name="sendbtn" value="SEND"><br><br>
                    <span style="color:red; font-size:12px;"> <?php echo $err; ?> </span>
                    <br>
                    <p><a href="login.php" class="backbtn">back to login</a></p>
                </div>
                </form>
            </div>
        </div>
    </body>
</html>

