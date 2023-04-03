<!DOCTYPE html>
<html>
  <head>
<!-- HTML code for the product list page -->
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
              
      include_once 'shoe.php';

      // Retrieve the product data
      $result = mysqli_query($conn, "SELECT * FROM shoes");

      // Loop through the product data and generate HTML code for each product
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="product-card">';
        echo '<img src="shoesimg/' . $row['shoe_image'] . '">';
        echo '<h2>' . $row['category'] . '</h2>';
        echo '<p>' . $row['shoe_name'] . '</p>';
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
