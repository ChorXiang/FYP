<?php
    include 'config.php'; 
?>

<?php
//设置变量并初始化为空
$nameErr = $emailErr = $subjectErr = $messageErr = "";
$name = $email = $subject = $message = "";

//表单验证
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "名字是必填的";
  } else {
    $name = test_input($_POST["name"]);
    // 检查名字是否包含字母和空格
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "只允许字母和空格"; 
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "电子邮件是必填的";
  } else {
    $email = test_input($_POST["email"]);
    // 检查电子邮件地址是否合法
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "无效的电子邮件格式"; 
    }
  }
  
  if (empty($_POST["subject"])) {
    $subjectErr = "主题是必填的";
  } else {
    $subject = test_input($_POST["subject"]);
  }

  if (empty($_POST["message"])) {
    $messageErr = "消息是必填的";
  } else {
    $message = test_input($_POST["message"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<style>
  fieldset{
    background-color: lightcoral;
  }

  .center{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 100%;
    background: white;
    border-radius: 10px;
  }

  .center h1{
    text-align: center;
    padding: 0 0 20px 0;
    border-bottom: 1px solid silver;
  }

  .center form{
    padding: 0 40px;
    box-sizing: border-box;
  }



  input[type="submit"]{
    width: 100%;
    height: 50px;
    border: 1px solid;
    background: #2691d9;
    border-radius: 25px;
    font-size: 18px;
    color: #e9f4fb;
    font-weight: 700;
    cursor: pointer;
    outline: none;
  }

  input[type="submit"]:hover{
    border-color: #2691d9;
    transition: .5s;
  }
</style>

<!-- HTML表单 -->
<div class="center">
<fieldset>
<h1>Contact Us</h1>
<p>请在下面填写您的联系信息并向我们发送您的消息：</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 <div class="txt_field">
  姓名：<input type="text" name="name">
  <span class="error"><?php echo $nameErr;?></span>
  <br><br>
  电子邮件：<input type="email" name="email">
  <span class="error"><?php echo $emailErr;?></span>
  <br><br>
  主题：<input type="text" name="subject">
  <span class="error"><?php echo $subjectErr;?></span>
  <br><br>
  消息：<br>
  <textarea name="message" rows="5" cols="40"></textarea>
  <span class="error"><?php echo $messageErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="SEND">  
</div>
</form>
</fieldset>
</div>

<?php

?>

