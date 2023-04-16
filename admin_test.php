<?php
    
    include 'conn.php'; 

?>


<?php

// Define a function for generating a unique 6-digit admin ID
function generate_admin_id() {
    $admin_id = rand(100000, 999999);
    // Check if the generated admin ID already exists in the database
    // (replace this with your own code to check if the ID exists)
    
    /*while () {
        $admin_id = rand(100000, 999999);
    }*/
    return $admin_id;
}


// Start a session
session_start();

// Check if the admin is already logged in
if (isset($_SESSION['admin_id'])) {
    // Redirect to the admin dashboard if already logged in
    header('Location: adminlogin.php');
    exit();
}

// Check if the registration form was submitted
if (isset($_POST['register'])) {
    // Retrieve the form data
$admin_name = $_POST['admin_name'];
$admin_email = $_POST['admin_email'];
$admin_password = $_POST['admin_password'];

// Generate a unique 6-digit admin ID
$admin_id = generate_admin_id();

// Hash and salt the password
$hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);

// Store the admin details in the database
// (replace this with your own code to store the data in the admin table)
$sql = "INSERT INTO test (admin_id, admin_name, admin_email, admin_password) VALUES ('$admin_id', '$admin_name', '$admin_email', '$hashed_password')";
// ...
mysqli_query($conn,$sql);  

// Send email with admin_id to admin
$to = $admin_email;
$subject = 'Your admin ID';
$message = 'Your admin ID is: '.$admin_id;
$headers = 'From: yourname@example.com';

mail($to, $subject, $message, $headers);

// Redirect to the admin dashboard after successful registration
header('Location: adminlogin.php');
exit();

}

?>

<!-- HTML registration form -->
<form method="POST" action="">
    <input type="text" name="admin_name" placeholder="Admin Name" required>
    <input type="email" name="admin_email" placeholder="Email Address" required>
    <input type="password" name="admin_password" placeholder="Password" required>
    <input type="submit" name="register" value="Register">
</form>
