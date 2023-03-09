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

<!-- HTML表单 -->
<h2>Contact Us</h2>
<p>请在下面填写您的联系信息并向我们发送您的消息：</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
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
  <input type="submit" name="submit" value="发送">  
</form>



<?php/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Modify these with your own email address and desired subject line
  $to = "your-email@example.com";
  $subject = "New Contact Form Submission";

  $headers = "From: " . $name . " <" . $email . ">\r\n";
  $headers .= "Reply-To: " . $email . "\r\n";
  $headers .= "Content-type: text/html\r\n";

  $email_body = "<p>You have received a new message from the contact form on your website.</p>";
  $email_body .= "<p><strong>Name:</strong> " . $name . "</p>";
  $email_body .= "<p><strong>Email:</strong> " . $email . "</p>";
  $email_body .= "<p><strong>Message:</strong> " . $message . "</p>";

  if (mail($to, $subject, $email_body, $headers)) {
    // If the mail function returns true, the email was sent successfully
    echo "Thank you for contacting us! We will get back to you shortly.";
  } else {
    echo "Oops! Something went wrong and we couldn't send your message.";
  }
}
?>
