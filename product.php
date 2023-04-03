<?php
    include 'header.php';
    include 'conn.php'; 

?>

<!DOCTYPE html>
<html>
  <head>
<html>
<head>
  <title>Shoes Product List</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
  .product-list {
  display: flex;
  flex-wrap: wrap;
}

.product-card {
  width: 300px;
  margin: 10px;
  padding: 10px;
  border: 1px solid #ddd;
  box-shadow: 0 0 5px #ddd;
  text-align: center;
}

.product-card img {
  width: 100%;
}

.product-card h2 {
  font-size: 18px;
  margin-top: 10px;
}

.product-card p {
  font-size: 14px;
  margin: 10px 0;
}

.product-card .price {
  font-size: 16px;
  font-weight: bold;
  color: #c00;
}
nav {
  background-color: #333;
  color: white;
  padding: 10px;
}

nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

nav li {
  display: inline-block;
  margin-right: 10px;
}

nav li:last-child {
  margin-right: 0;
}

nav a {
  color: white;
  text-decoration: none;
  padding: 5px;
}

nav a:hover {
  background-color: white;
  color: black;
}
.imgcenter {
  display: block;
  margin-left: auto;
  margin-right: auto;
  height: 300px;
  width: 50%;
  background-color: powderblue;
  }

</style>
<body>
<nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Men's Shoes</a></li>
        <li><a href="#">Women's Shoes</a></li>
        <li><a href="#">Kids' Shoes</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </nav>
  <h1>Shoes Product List</h1>
  <div class="product-list">
    <?php
                  $id =$_GET['user_id'];
      // include_once 'shoe.php';

      // Retrieve the product data
      $result = mysqli_query($conn, "SELECT * FROM shoes");

      // Loop through the product data and generate HTML code for each product
      while ($row = mysqli_fetch_assoc($result)) 
      {
        $sid = $row['shoe_id'];
        echo '<div class="product-card">';     ?>
        <img src="image/shoesimg/<?php echo $row["shoe_image"]; ?>" alt="<?php echo $row["shoe_name"]; ?>" class="imgcenter">
        <?php
        echo '<h2>' . $row['category'] . '</h2>';
        ?>
        <p><a href="productpage.php?user_id=<?php echo $id ?>&&shoe_id=<?php echo $sid ?>"><?php echo $row["shoe_name"]; ?></a></p>
        <?php
        echo '<p class="price">RM' . $row['shoe_price'] . '</p>';
        echo '</div>';
      }

      // Close the database connection
      mysqli_close($conn);
    ?>
  </div>
</body>




  </body>
</html>



<?php
    include 'footer.php';
   
?>
