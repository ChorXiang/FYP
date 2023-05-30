<?php
include 'header.php';
include 'conn.php'; 
$msg='';
?>

<?php


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the user input and store it in a session variable
    $_SESSION['userInput'] = $_POST['inputField'];
    // ... other processing of form data
} else {
    // Check if the session variable exists and populate the input field with its value
    if (isset($_SESSION['userInput'])) {
        $userInput = $_SESSION['userInput'];
    } else {
        $userInput = ''; // Set a default value if the session variable doesn't exist
    }
}

?> 

<body>
<form method="POST" action="">
    <input type="text" name="inputField" value="<?php echo $userInput; ?>">
    <button type="submit">Submit</button>
</form>

</body>

