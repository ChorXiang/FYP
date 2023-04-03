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
    body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
}

.container {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

.sidebar {
  width: 200px;
  background-color: #333;
  color: white;
  padding: 10px;
  position: fixed;
  height: 100%;
}

.sidebar ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

.sidebar li {
  display: block;
  margin-right: 10px;
}

.sidebar li:last-child {
  margin-right: 0;
}

.sidebar a {
  display: block;
  color: white;
  text-decoration: none;
  padding: 10px;
  transition: background-color 0.3s ease-in-out;
}

.sidebar a:hover {
  background-color: #444;
}

.product-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;
  align-items: flex-start;
  margin-left: 200px;
  padding: 20px;
}

.product-card {
  width: calc((100% / 3) - 20px);
  margin: 20px;
  padding: 20px;
  border: 1px solid #ddd;
  box-shadow: 0 0 5px #ddd;
  text-align: center;
  transition: transform 0.3s ease-in-out;
}

.product-card:hover {
  transform: translateY(-10px);
}

.product-card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  object-position: center;
  margin-bottom: 10px;
}

.product-card h2 {
  font-size: 18px;
  margin-top: 0;
  margin-bottom: 10px;
  text-transform: uppercase;
}

.product-card a {
  color: #333;
  text-decoration: none;
  font-weight: bold;
  transition: color 0.3s ease-in-out;
}

.product-card a:hover {
  color: #c00;
}

.product-card p {
  font-size: 14px;
  margin: 10px 0;
}

.product-card .price {
  font-size: 16px;
  font-weight: bold;
  color: #c00;
  margin-top: 10px;
}

@media (max-width: 992px) {
  .product-card {
    width: calc((100% / 2) - 20px);
  }
}

@media (max-width: 576px) {
  .sidebar {
    width: 100%;
    position: static;
    height: auto;
  }

  .product-list {
    margin-left: 0;
  }

  .product-card {
    width: 100%;
  }
  
}

</style>
<body>
<div class="container">
  <div class="sidebar-wrapper">
    <div class="sidebar">
      <nav>
        <ul>
          <li>Category</a></li>
          <li><a href="#">Sneakers</a></li>
          <li><a href="#">Boots</a></li>
          <li><a href="#">Sandals</a></li>
          <li><a href="#">Slides</a></li>
        </ul>
      </nav>
    </div>
  </div>
  
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