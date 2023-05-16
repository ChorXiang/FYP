<?php
include 'header.php';
include 'conn.php'; 
$msg='';
?>

<?php
if (isset($_GET['link']) && isset($_GET['user_id'] )) {
    $encodedLink = $_GET['link'];
    $decodedLink = base64_decode($encodedLink);
    $userId = $_GET['user_id'];
    echo '<p>User ID: ' . $userId . '</p>';
    echo '<a href="http://localhost/FYP/FYP/123testing.php' . $decodedLink . '">Go to the original link</a>';
} else {
    echo 'Invalid link';
}
?> 

