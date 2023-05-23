<?php
session_start();
require_once 'conn.php';

if (isset($_POST["resetbtn"])) {
    $pw = $_POST['pw'];
    $conpw = $_POST['cpw'];

    if (empty($pw) || empty($conpw)) {
        header("Location: resetpw.php?error=emptyinput");
        exit();
    }

    if (!preg_match("#[A-Z]+#", $pw) || !preg_match("#[a-z]+#", $pw) || !preg_match("#[0-9]+#", $pw) || !preg_match("#[^\w]+#", $pw) || strlen($pw) < 6) {
        header("Location: resetpw.php?error=invalidpassword");
        exit();
    }

    if ($conpw != $pw) {
        header("Location: resetpw.php?error=pwnotmatch");
        exit();
    }

    if ($conpw == $pw) {
        $sql = "SELECT * FROM user WHERE email_address='" . $_SESSION["input_email"] . "'";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            if ($_SESSION["input_email"] == $row['email_address']) {
                $sqlupdate = "UPDATE user SET userpassword='" . $pw . "', confirm_password='" . $conpw . "' WHERE email_address='" . $_SESSION["input_email"] . "'";
                $conn->query($sqlupdate);
                session_unset();
                session_destroy();
                header("Location: login.php?resetpw=success");
                exit();
            }
        }
    }
}
?>
