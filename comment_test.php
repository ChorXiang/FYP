<?php
include 'header.php'; 
?>
<?php

if (isset($_POST['submit'])) {

    $shoe_id = $_POST['shoe_id'];
    $shoe_rating = $_POST['shoe_rating'];
    $shoe_review = $_POST['shoe_review'];
    $user_email = $_POST['user_email'];
  
    if (empty($shoe_id) || empty($shoe_rating) || empty($shoe_review) || empty($user_email)) {
      $error_message = 'Please fill in all fields';
    } elseif (!is_numeric($shoe_rating) || $shoe_rating < 1 || $shoe_rating > 5) {
      $error_message = 'Please enter a valid rating between 1 and 5';
    } else {
  
      $db_host = 'localhost';
      $db_user = 'root';
      $db_pass = '';
      $db_name = 'fyp';
      $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
  
      if (!$conn) {
        die('Could not connect to the database: ' . mysqli_connect_error());
      }
  
      $query = "INSERT INTO comment (shoe_id, shoe_rating, shoe_review, user_email) VALUES ('$shoe_id', '$shoe_rating', '$shoe_review', '$user_email')";
      if (mysqli_query($conn, $query)) {
        $success_message = 'Thank you for your comment!';
      } else {
        $error_message = 'Error: ' . mysqli_error($conn);
      }
  
      mysqli_close($conn);
  
    }
  }

?>
<!DOCTYPE html>
<html>
<head>
  <title>Rate a Shoe</title>
</head>
<style>
  fieldset
        {
            height: 250px;
            width: 75%; /* or a percentage, or whatever */
            margin-bottom: auto;
            margin-left: auto;
            margin-right: auto;
        }
fieldset{
background-color: lightblue;
color: overscroll-behavior-block: ;;
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
<body>
<?php if (isset($error_message)) { ?>
  <div style="color: red;"><?php echo $error_message; ?></div>
<?php } ?>
<?php if (isset($success_message)) { ?>
  <div style="color: green;"><?php echo $success_message; ?></div>
<?php } ?>
<div class="center">
<fieldset>
<h1>Rate a Shoe</h1>
<br>Please fill in your shoe rating information below:<br>
<form method="POST">
<label for="user_email">Your Email:</label>
  <input type="email" name="user_email" id="user_email" required><br>
  <label for="shoe_id">Shoe ID:</label>
  <input type="text" name="shoe_id" id="shoe_id" required><br>
  <label for="shoe_rating">Shoe Rating (1-5):</label>
  <input type="number" name="shoe_rating" id="shoe_rating" min="1" max="5" required><br>
  <label for="shoe_review">Shoe Review:</label><br>
  <textarea name="shoe_review" id="shoe_review" required></textarea><br>
  <input type="submit" name="submit" value="Submit">
</form>
</fieldset> 
</div>
</body>
</html>

<?php
include 'footer.php'; 
?>