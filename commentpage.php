<?php

if (isset($_POST['submit'])) {

  $shoe_id = $_POST['shoe_id'];
  $rating = $_POST['rating'];
  $review = $_POST['review'];

  if (empty($shoe_id) || empty($rating) || empty($review)) {
    $error_message = 'Please fill in all fields';
  } elseif (!is_numeric($rating) || $rating < 1 || $rating > 5) {
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

    $query = "INSERT INTO comment (shoe_id, rating, review) VALUES ('$shoe_id', '$rating', '$review')";
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
<body>

<?php if (isset($error_message)) { ?>
  <div style="color: red;"><?php echo $error_message; ?></div>
<?php } ?>

<?php if (isset($success_message)) { ?>
  <div style="color: green;"><?php echo $success_message; ?></div>
<?php } ?>

<form method="POST">
  <label for="shoe_id">Shoe ID:</label>
  <input type="text" name="shoe_id" id="shoe_id" required><br>
  <label for="rating">Rating (1-5):</label>
  <input type="number" name="rating" id="rating" min="1" max="5" required><br>
  <label for="review">Review:</label><br>
  <textarea name="review" id="review" required></textarea><br>
  <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
