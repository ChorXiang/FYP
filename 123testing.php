<?php
include 'header.php';
include 'conn.php'; 
$msg='';
?>

<?php
$userId = 123;
$link = '123test.php'; // Replace with your actual link

$encodedLink = base64_encode(base64_encode($link));
?>

<a href="123test.php?link=<?php echo $encodedLink; ?>&user_id=<?php echo $userId; ?>">Click here</a>
